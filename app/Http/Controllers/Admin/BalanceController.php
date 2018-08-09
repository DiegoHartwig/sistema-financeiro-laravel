<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationMoneyFormRequest;
use App\Models\Balance;
use App\User;
use Illuminate\Http\Request;
use App\Models\Historic;

class BalanceController extends Controller
{

    private $totalPagesPaginate = 5;

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

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
        if (!$sender = $user->getSender($request->sender)) {
            return redirect()
                ->back()
                ->with('error', 'Usuário não encontrado!');
        }
        if ($sender->id === auth()->user()->id) {
            return redirect()
                ->back()
                ->with('error', 'Não é possivel transferir para você mesmo!');
        }

        $balance = auth()->user()->balance;

        return view('admin.balance.transfer-confirm', compact('sender', 'balance'));

    }

    public function transferStore(ValidationMoneyFormRequest $request, User $user)
    {
        if (!$sender = $user->find($request->sender_id))
            return redirect()
                ->route('balance.transfer')
                ->with('success', 'Recebedor não encontrado!');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->valor, $sender);

        if ($response['success']) {
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        }

        return redirect()
            ->route('balance.transfer')
            ->with('error', $response['message']);
    }

    public function historic(Historic $historic)
    {
        $historics = auth()->user()
                    ->historics()->with(['userSender'])
                    ->paginate($this->totalPagesPaginate);   
                    
        $types = $historic->type();            

        return view('admin.balance.historics', compact('historics', 'types'));
    }

    public function searchHistoric(Request $request, Historic $historic)
    {
        $dataForm = $request->except('_token');

        $historics =  $historic->search($dataForm, $this->totalPagesPaginate);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types', 'dataForm'));
    }

}
