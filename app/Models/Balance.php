<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public $timestamps = false;
    
    public function deposit($valor) : Array
    {

        DB::beginTransaction();
        //dd($valor);
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($valor, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'              => 'I',
            'amount'            => $valor,
            'total_before'      => $totalBefore,
            'total_after'       => $this->amount,            
            'date'              => date('Ymd'),   
        ]);

        if ($deposit && $historic) {

            DB::commit();
        
            return [
                'success' => true,
                'message' => 'Depositado com sucesso!'
            ];

        } else {

            DB::rollback();

        return [
            'success' => false,
            'message' => 'Ocorreu um erro!'
        ];  
        
        }
    }
}
