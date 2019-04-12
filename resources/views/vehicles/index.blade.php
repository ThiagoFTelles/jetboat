@extends('layout')

@section('content')
    @include ('flash')
    <h1 class="title">Embarcações</h1>
    <div class="box">
        <ul>
            @foreach ($vehicles->sortBy('name') as $vehicle)
            <li style="padding: 5px 0 5px 0;text-transform: uppercase;">
                <a href="/vehicles/{{ $vehicle->uuid }}">
                   <h1 class="title is-6" style="color:#363636"> {{$vehicle->owner_name}} - {{$vehicle->model}} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif</h1>@include('vehicleStatus')
                </a>
            </li>
            @endforeach
        </ul>
    </div>
        <div class="field">
            <div class="control">
                <a class="button is-link" href="/vehicles/create">Adicionar Embarcação</a>
            </div>    
        </div>
        
@endsection