@extends('layout')

@section('content')
    @include ('flash')  
    <h1 class="title"> {{ $vehicle->name }} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif</h1>
    <h2 class="label">@include('vehicleStatus')</h2>
    
    <div id="qrcodegenerator">
        <qrcodegenerator></qrcodegenerator>
    </div>
    
    @include ('errors')



@endsection