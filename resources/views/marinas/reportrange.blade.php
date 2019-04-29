@extends('layout')

@section('content')
@include ('flash')
@include ('errors')
@include ('date-range')

    <div id="report">
        
        @foreach ($marinaActions->groupby('subject_id') as $action)
            @if  ($action[0]['created_at'] <= $df)
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
            @endif
        @endforeach
        

    </div>

@endsection