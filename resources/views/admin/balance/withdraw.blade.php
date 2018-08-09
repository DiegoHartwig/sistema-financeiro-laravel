@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Efetuar Saque</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Saque</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3></h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')     

            <form action="{{ route('withdraw.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="valor" class="form-control" placeholder="Valor do saque">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@stop