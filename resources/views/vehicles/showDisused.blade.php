@extends('layout')

@section('content')
    @include ('flash')

    <h1 class="title">Embarcações em desuso</h1>
    <div class="box">
        <ul>
            @foreach ($vehicles->sortBy('owner_name') as $vehicle)
            @if($vehicle->isDisused())
            <li style="padding: 5px 0 5px 0;">
                <a href="/vehicles/{{ $vehicle->uuid }}">
                    {{$vehicle->name}}
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
        
@endsection