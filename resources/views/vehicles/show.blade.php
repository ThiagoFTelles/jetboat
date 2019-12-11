@extends('layout')

@section('content')
@include ('flash')
<h1 class="title" style="margin: 0;"> {{ $vehicle->name }} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif</h1>
<h2 class="label" style="color: white;">@include('vehicleStatus')</h2>
<div style="margin-bottom: 20px;">
    <p style="color: white;margin: 0;">Combustível: {{ $vehicle->gas_percentage }}%</p>
    <p style="color: white;margin: 0;">Horas: {{ $vehicle->navigation_hours }}</p>
</div>

<div class="content">
    <a class="button is-link" href="/vehicles/{{$vehicle->uuid}}/action">Ação</a>
    <a class="button is-link" href="/vehicles/{{ $vehicle->uuid }}/edit">Editar</a>
    <!-- <a class="button is-link" href="/vehicles/{{ $vehicle->uuid }}/datasheets">Registros</a> -->
    <!-- Assim que terminar o sistema de Registros ("datasheets") coloco este link online  -->
    <a class="button is-link" target="_blank" href="/vehicles/{{ $vehicle->uuid }}/generate-pdf">QrCode</a>
    <a class="button is-link" target="_blank" href="/vehicles/{{ $vehicle->uuid }}/generate-mini-pdf">Mini QrCode</a>


</div>

<div class="box">
    <div class="field">
        <label class="label" for="owner_name">Proprietários</label>
        <div class="label">
            <h2>{{ $vehicle->owner_name }}</h2>
        </div>
    </div>

    <div class="field">
        <label class="label" for="brand">Marca</label>
        <div class="label">
            <h2>{{ $vehicle->brand }}</h2>
        </div>
    </div>

    <div class="field">
        <label class="label" for="model">Modelo</label>
        <div class="label">
            <h2>{{ $vehicle->model }}</h2>
        </div>
    </div>

    <div class="field">
        <label class="label" for="year">Ano</label>
        <div class="label">
            <h2>{{ $vehicle->year }}</h2>
        </div>
    </div>

    <div class="field">
        <label class="label" for="register_number">Registro</label>
        <div class="label">
            <h2>{{ $vehicle->register_number }}</h2>
        </div>
    </div>

    <div class="field">
        <label class="label" for="register_number">Pertences</label>
        <div class="label">
            <p style="font-weight: 500;">{{ $vehicle->belongings }}</p>
        </div>
    </div>
</div>
@include ('errors')



@endsection