@extends('layout')

@section('content')
    @include ('flash')
    <h1 class="title" >Cadastrar nova embarcação</h1>
     
     <form method="POST" action="/vehicles">
        {{ csrf_field() }}
    <div class="box">
        <div class="field" >
            <label class="label" for="name">Nome da Embarcação</label>
            <div class="control">
                <input type="text" class="input {{ $errors -> has('name') ? 'is-danger' : '' }} " name="name" placeholder="Nome da Embarcação"  value="{{ old('name') }}" required>
            </div>        
        </div>

        <div class="field">

            <label class="label" for="owner_name">Proprietários</label>

            <div class="control" >
                <input type="text" class="input {{ $errors -> has('owner_name') ? 'is-danger' : '' }}" name="owner_name" placeholder="Dono ou donos" value="{{ old('owner_name') }}" required>
            </div>
        </div>

        <div class="field">

            <label class="label" for="brand">Marca</label>

            <div class="control" >
                <input type="text" class="input {{ $errors -> has('brand') ? 'is-danger' : '' }}" name="brand" placeholder="marca" value="{{ old('brand') }}" required>
            </div>
        </div>

        <div class="field">

            <label class="label" for="model">Modelo</label>

            <div class="control" >
                <input type="text" class="input {{ $errors -> has('model') ? 'is-danger' : '' }}" name="model" placeholder="modelo" value="{{ old('model') }}" required>
            </div>
        </div>

        <div class="field">

            <label class="label" for="year">Ano</label>

            <div class="control" >
                <input type="text" class="input {{ $errors -> has('year') ? 'is-danger' : '' }}" name="year" placeholder="ano" value="{{ old('year') }}" required>
            </div>
        </div>

        <div class="field">

            <label class="label" for="register_number">Registro</label>

            <div class="control" >
                <input type="text" class="input {{ $errors -> has('register_number') ? 'is-danger' : '' }}" name="register_number" placeholder="código de registro da embarcação" value="{{ old('register_number') }}" required>
            </div>
        </div>
    
                <button class="button is-link" type="submit">Salvar</button>
    </div>
    @include ('errors')
    <p>
    
     </form>
     
@endsection