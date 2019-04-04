@extends('layout')

@section('content')
    @include ('flash')

    <h1 class="title">Embarcações Navegando</h1>
    <div class="box">
        <ul>
            @foreach ($vehicles as $vehicle)
            @if($vehicle->status === 'navigating')
            <li>
                <a href="/vehicles/{{ $vehicle->uuid }}">
                    {{$vehicle->name}} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
        
@endsection