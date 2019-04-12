@extends('layout')

@section('content')
    @include ('flash')

    <h1 class="title">Embarcações Estacionadas</h1>
    <div class="box">
        <ul>
            @foreach ($vehicles as $vehicle)
            @if($vehicle->status === 'parked')
            <li style="padding: 5px 0 5px 0;text-transform: uppercase;">
                <a href="/vehicles/{{ $vehicle->uuid }}">
                    {{$vehicle->owner_name}} - {{$vehicle->model}} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
        
@endsection