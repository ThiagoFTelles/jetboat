@extends('layout')

@section('content')
@include ('flash')
@include ('errors')

<div id="report">
    <datepicker></datepicker>
    <!-- TENHO QUE CRIAR UM MODEL, ADICIONAR OS CAMPOS QUE QUERO SALVAR, CRIAR UM CONTROLLER E UMA VIEW -->
    @foreach ($marinaActions->groupby('subject_id') as $action)
        <h4 style="padding: 5px 0 5px 0;text-transform: uppercase;">
            <a href="/vehicles/{{ $action[0]['properties']['attributes']['uuid'] }}">
                <h1 class="title is-6" style="color:#363636"> 
                    {{ $action[0]['properties']['attributes']['owner_name'] }}
                </h1>
            </a>
                @foreach ($action as $a)
                    <ul>
                        <li>{{ $a->created_at->format('d/m/Y H:i') }} - 
                        @switch($a->properties['attributes']['status'])
                            @case('parked')
                                estacionou
                                @break
                            @case('navigating')
                                navegou
                                @break
                            @case('out')
                                saiu
                                @break
                            @default
                                movimentou
                        @endswitch
                        </li>
                    </ul>                
                @endforeach
        </h4>
    @endforeach
    

</div>
@endsection