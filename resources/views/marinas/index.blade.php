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
        Total: {{ $totalVehiclesAmount }}
</a>
<a class="button box marina-home-link" href="/vehicles/parked">
        Estacionados: {{ $parkedVehiclesAmount }}
</a>
<a class="button box marina-home-link" href="/vehicles/navigating">
        Navegando: {{ $navigatingVehiclesAmount }}
</a>
<a class="button box marina-home-link" href="/vehicles/out">
        Fora da Marina: {{ $outingsVehiclesAmount }}
</a>
@endsection