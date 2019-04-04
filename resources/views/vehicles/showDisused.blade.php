@extends('layout')

@section('content')
    @include ('flash')

    <h1 class="title">Embarcações em desuso</h1>
    <div class="box">
        <ul>
            @foreach ($vehicles as $vehicle)
            @if($vehicle->isDisused())
            <li>
                <a href="/vehicles/{{ $vehicle->uuid }}">
                    {{$vehicle->name}}
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
        
@endsection