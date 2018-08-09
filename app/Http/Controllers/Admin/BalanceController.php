<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationMoneyFormRequest;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = number_format($balance ? $balance->amount : 0, '2', ',', '.');

        //dd(auth()->user());
        //dd(auth()->user()->name);
        //dd(auth()->user()->balance);

        return view('admin.balance.index', compact('amount'));
    }

    public function depositar()
    {
        return view('admin.balance.depositar');
    }

    public function depositStore(ValidationMoneyFormRequest $request)
    {
        //dd($request->all());
        //dd(auth()->user()->balance()->firstOrCreate([]));
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->valor);

        if ($response['success']) {
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        }

        return redirect()
            ->back()
            ->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(ValidationMoneyFormRequest $request)
    {
        //dd($request->all());
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->valor);

        if ($response['success']) {
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        }

        return redirect()
            ->back()
            ->with('error', $response['message']);
    }

}
