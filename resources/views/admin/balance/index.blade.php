@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('balance.depositar') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true">Depósito</i></a>
            <a href="" class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true">Saque</i></a>
        </div>
        <div class="box-body">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>R$ {{ number_format($amount, 2, ',', '') }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Histórico<i class ="fa fa-arrow-up"></i></a>
            </div>
        </div>
    </div>
@stop