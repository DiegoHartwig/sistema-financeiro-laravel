@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Efetuar Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Informe o recebedor</h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')     

            <form action="{{ route('confirm.transfer') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="sender" class="form-control" placeholder="Informe o nome ou e-mail">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Próxima etapa</button>
                </div>
            </form>
        </div>
    </div>
@stop