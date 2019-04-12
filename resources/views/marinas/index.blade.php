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

<a class="button box marina-home-link" href="/vehicles">
        <h1 class="subtitle is-5" style="color: maroon;font-size: 1.094rem;">Total: {{ $totalVehiclesAmount }}</h1>
</a>
<a class="button box marina-home-link" href="/vehicles/parked">
        <h1 class="subtitle is-5" style="color: maroon;font-size: 1.094rem;">Estacionados: {{ $parkedVehiclesAmount }}</h1>
</a>
<a class="button box marina-home-link" href="/vehicles/navigating">
        <h1 class="subtitle is-5" style="color: maroon;font-size: 1.094rem;">Navegando: {{ $navigatingVehiclesAmount }}</h1>
</a>
<a class="button box marina-home-link" href="/vehicles/out">
        <h1 class="subtitle is-5" style="color: maroon;font-size: 1.094rem;">Fora da Marina: {{ $outingsVehiclesAmount }}</h1>
</a>
@endsection