<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function depositStore(Request $request)    
    {        
        //dd($request->all());
        //dd(auth()->user()->balance()->firstOrCreate([]));
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $balance->deposit($request->valor);
    }
   
}
