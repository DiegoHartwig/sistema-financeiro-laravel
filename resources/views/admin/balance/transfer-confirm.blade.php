@extends('adminlte::page')

@section('title', 'Confirmação de Transferência')

@section('content_header')
    <h1>Confirmação de Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</a></li>
        <li><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Informe o recebedor</h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')   

            <p><strong>Saldo atual: R$ </strong>{{ number_format($balance->amount, 2, ',','.') }}</p>

            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>               

            <form action="{{ route('transfer.store') }}" method="post">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{ $sender->id }}">

                <div class="form-group">
                    <input type="text" name="valor" class="form-control" placeholder="Valor:">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Transferir</button>
                </div>
            </form>
        </div>
    </div>
@stop