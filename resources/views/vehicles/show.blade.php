@extends('layout')

@section('content')
    @include ('flash')  
    <h1 class="title"> {{ $vehicle->name }} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif</h1>
    <h2 class="label">@include('vehicleStatus')</h2>
    
    <a class="button is-link" href="/vehicles/{{$vehicle->uuid}}/action">Ação</a>

    <div class="box">
        <div class="field">
            <label class="label" for="owner_name">Proprietários</label>
            <div class="control" >
                <h2>{{ $vehicle->owner_name }}</h2>
            </div>
        </div>

        <div class="field">
            <label class="label" for="brand">Marca</label>
            <div class="control" >
                <h2>{{ $vehicle->brand }}</h2>
            </div>
        </div>

        <div class="field">
            <label class="label" for="model">Modelo</label>
            <div class="control" >
                <h2>{{ $vehicle->model }}</h2>
            </div>
        </div>

        <div class="field">
            <label class="label" for="year">Ano</label>
            <div class="control" >
                <h2>{{ $vehicle->year }}</h2>
            </div>
        </div>

        <div class="field">
            <label class="label" for="register_number">Registro</label>
            <div class="control" >
                <h2>{{ $vehicle->register_number }}</h2>
            </div>
        </div>
    </div>
    
    <div class="content"> 
        <a class="button is-link" href="/vehicles/{{ $vehicle->uuid }}/edit">Editar</a>

    </div>
    @include ('errors')



@endsection