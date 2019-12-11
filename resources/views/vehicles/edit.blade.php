@extends('layout')

@section('content')
@include ('flash')
<h1 class="title">Editar Embarcação</h1>
<form action="/vehicles/{{$vehicle->uuid}}" method="POST" style="margin-bottom:1em">
    @method('PATCH')
    @csrf

    <div class="box">

        <div class="field">
            <label class="label" for="name">Nome da Embarcação</label>
            <div class="control">
                <input value="{{ $vehicle->name }}" type="text" class="input {{ $errors -> has('name') ? 'is-danger' : '' }} " name="name" placeholder="Nome da Embarcação" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="owner_name">Proprietários</label>
            <div class="control">
                <input value="{{ $vehicle->owner_name }}" type="text" class="input {{ $errors -> has('owner_name') ? 'is-danger' : '' }}" name="owner_name" placeholder="Dono ou donos" value="{{ old('owner_name') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="brand">Marca</label>
            <div class="control">
                <input value="{{ $vehicle->brand }}" type="text" class="input {{ $errors -> has('brand') ? 'is-danger' : '' }}" name="brand" placeholder="marca" value="{{ old('brand') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="model">Modelo</label>
            <div class="control">
                <input value="{{ $vehicle->model }}" type="text" class="input {{ $errors -> has('model') ? 'is-danger' : '' }}" name="model" placeholder="modelo" value="{{ old('model') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="year">Ano</label>
            <div class="control">
                <input value="{{ $vehicle->year }}" type="text" class="input {{ $errors -> has('year') ? 'is-danger' : '' }}" name="year" placeholder="ano" value="{{ old('year') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="register_number">Registro</label>
            <div class="control">
                <input value="{{ $vehicle->register_number }}" type="text" class="input {{ $errors -> has('register_number') ? 'is-danger' : '' }}" name="register_number" placeholder="código de registro da embarcação" value="{{ old('register_number') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="gas_percentage">Combustível</label>
            <div class="control">
                <input value="{{ $vehicle->gas_percentage }}" type="number" min="0" max="100" step="5" class="input {{ $errors -> has('gas_percentage') ? 'is-danger' : '' }}" name="gas_percentage" value="{{ old('gas_percentage') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="navigation_hours">Horas</label>
            <div class="control">
                <input value="{{ $vehicle->navigation_hours }}" type="number" min="0" max="9999" class="input {{ $errors -> has('navigation_hours') ? 'is-danger' : '' }}" name="navigation_hours" value="{{ old('navigation_hours') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="belongings">Pertences</label>
            <div class="control">
                <input value="{{ $vehicle->belongings }}" type="text" class="input {{ $errors -> has('belongings') ? 'is-danger' : '' }}" name="belongings" value="{{ old('belongings') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Salvar</button>
            </div>
        </div>
</form>

@include ('errors')

@endsection