@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Efetuar Depósito</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Efetuar Depósito</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('deposit.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="valor" class="form-control" placeholder="Valor do depósito">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Depositar</button>
                </div>
            </form>
        </div>
    </div>
@stop