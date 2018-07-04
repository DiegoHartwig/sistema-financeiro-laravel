<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;
    
    public function deposit($valor) : Array
    {
        //dd($valor);
        $this->amount += number_format($valor, 2, '.', '');
        $deposit = $this->save();

        if ($deposit)
            return [
                'success' => true,
                'message' => 'Depositado com sucesso!'
            ];

        return [
            'success' => false,
            'message' => 'Ocorreu um erro!'
        ];    
    }
}
