@extends('site.layout.template')

@section('title','Perfil')

@section('content')
    <h2>Perfil</h2>

    @include('admin.includes.alerts')

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" value="{{ auth()->user()->name }}" name="name" placeholder="Nome" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" value="{{ auth()->user()->email }}" name="email" placeholder="E-mail" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Senha" class="form-control"/>
        </div>
        
            @if (auth()->user()->image != null)
                <img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->name }}" style="max-width: 100px;">
            @endif
        <div class="form-group">
            <label for="image">Foto</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Atualizar Perfil" />
        </div>    
    </form>
@endsection