@extends('layout')

@section('content')
    @include ('flash')
    <h1 class="title">Embarcações</h1>
    <div class="box">
        <ul>
            @foreach ($vehicles as $vehicle)
            <li>
                <a href="/vehicles/{{ $vehicle->uuid }}">
                    {{$vehicle->name}} - @include('vehicleStatus') @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif
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