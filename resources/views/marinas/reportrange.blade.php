@extends('layout')

@section('content')
@include ('flash')
@include ('errors')
@include ('date-range')

<div id="report">
    <script type="text/javascript">
        $(document).on('change', '.date', function hideReport(){
    $("#report").fadeOut();
        return false;
        });
    </script>

    @if ($di)
        <form id="export-report" method="POST" action="/export-report/?di={{$di}} 00:00:00&df={{$df}} 59:59:99">
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <button style="width: auto;margin: 5px 0;"  class="button is-primary" type="submit">Baixar</button>
        </form>
    @endif

        @foreach ($marinaActions->groupby('subject_id') as $action)
            @if  ($action[0]['created_at'] <= $df)
                <h4 style="padding: 5px 0 5px 0;text-transform: uppercase;">
                    <a href="/vehicles/{{ $action[0]['properties']['attributes']['uuid'] }}">
                        <h1 class="title is-6" style="color:#363636"> 
                            {{ $action[0]['properties']['attributes']['owner_name'] }}
                        </h1>
                        @foreach ($vehicles->where('owner_name', $action[0]['properties']['attributes']['owner_name']) as $vehicle)
                            @include('vehicleStatus')
                        @endforeach
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