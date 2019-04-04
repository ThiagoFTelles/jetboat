@extends('layout')

@section('content')

@include ('flash')
<h1 class="title">{{ $marina_name }}</h1>
@if ($disusedVehiclesAmount > 0)

    <div class="notification is-danger">
        <a style="text-decoration:none;" href="/vehicles/disused">
            ATENÇÃO! {{ $disusedVehiclesAmount }}     
    
    @switch($disusedVehiclesAmount)
        @case(1)
            embarcação
            @break
        @default
            embarcações
    @endswitch 
    
    paradas a mais de {{  $DISUSED_DAYS  }} dias. 
        </a>
    </div>

@endif

<div class="box">
    <br>
    <a href="/vehicles"> 
        Total: {{ $totalVehiclesAmount }}
    </a>
    <br><br>
    <a href="/vehicles/parked"> 
        Estacionados: {{ $parkedVehiclesAmount }}
    </a>
    <br>
    <a href="/vehicles/navigating"> 
        Navegando: {{ $navigatingVehiclesAmount }}
    </a>
    <br>
    <a href="/vehicles/out"> 
        Fora da Marina: {{ $outingsVehiclesAmount }}
    </a>
</div>
@endsection