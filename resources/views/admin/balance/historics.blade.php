@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Remetente</th>                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ number_format($historic->amount),2, '.',','}}</td>
                        <td>{{ $historic->type($historic->type) }}</td>
                        <td>{{ $historic->date }}</td>
                        <td>
                            @if ( $historic->user_id_transaction )
                                {{ $historic->userSender->name }}
                            @else
                                - - -
                            @endif
                        </td>                        
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop