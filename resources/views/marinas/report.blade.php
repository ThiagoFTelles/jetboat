@extends('layout')

@section('content')
@include ('flash')
@include ('errors')

<div id="report">
    <datepicker></datepicker>
    
    @foreach ($activities->sortBy('created_at') as $activity)
        <li style="padding: 5px 0 5px 0;text-transform: uppercase;">
            <a href="/vehicles/{{ $vehicle->uuid }}">
                <h1 class="title is-6" style="color:#363636"> {{$vehicle->owner_name}} - {{$vehicle->model}} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif</h1>@include('vehicleStatus')
            </a>
            <td>{{ $activity->subject->name }}</td>
        </li>
    @endforeach
    

</div>
@endsection