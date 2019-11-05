@extends('layout')

@section('content')
    @include ('flash')  
    <h1 class="title is-3">FICHA TÉCNICA {{ $vehicle->name }} @if ($vehicle->isDisused()) <span style="color:red"> ! </span> @endif</h1>
    <h2 class="label" style="color: white;">@include('vehicleStatus')</h2>
    
    <div class="content">
        <div class="field" >
            <label class="label" for="last_oil">Última troca de óleo</label>
            <input style="width: auto;margin: 5px 0;" class="input is-rounded date" type="date" id="last_oil" name="last_oil" data-date="" data-date-format="DD MMMM YYYY"/>
            <label class="label" for="next_oil">Próxima troca de óleo</label>
            <input style="width: auto;margin: 5px 0;" class="input is-rounded date" type="date" id="next_oil" name="next_oil" data-date="" data-date-format="DD MMMM YYYY"/>
            <label class="label" for="warranty">Garantia</label>
            <input style="width: auto;margin: 5px 0;" class="input is-rounded date" type="date" id="warranty" name="warranty" data-date="" data-date-format="DD MMMM YYYY"/>
        </div>
    </div>

    <div class="box">
        <h2 class="title">Manutenções</h2>
        <form id="add-maintenance" method="POST" action="/vehicles/{{ $vehicle->uuid }}/add-maintenance"></form>
        {{ csrf_field() }}
        <button class="button is-primary" type="submit">
            <span class="icon has-text-info">
                <i class="fas fa-plus"></i>
                <i class="fas fa-tools"></i>
            </span>
        </button>

        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Data prevista</th>
                    <th>Data realizada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datasheets as $datasheet)
                    <tr>
                        <td>{{ $datasheet->maintenance_description }}</td> 
                        <td>{{ $datasheet->maintenance_expected_date->format('d/m/Y') }}</td> 
                        <td>{{ $datasheet->maintenance_date_held->format('d/m/Y') }}</td>          
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="box">
        <h2 class="title">Reparos</h2>
        <form id="add-repair" method="POST" action="/vehicles/{{ $vehicle->uuid }}/add-repair"></form>
        {{ csrf_field() }}
        <button class="button is-primary" type="submit">
            <span class="icon has-text-info">
                <i class="fas fa-plus"></i>
                <i class="fas fa-hammer"></i>
            </span>
        </button>

        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Mecânico</th>
                    <th>Contato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datasheets as $datasheet)
                    <tr>
                        <td>{{ $datasheet->repair_date_held->format('d/m/Y') }}</td> 
                        <td>{{ $datasheet->repair_description }}</td> 
                        <td>{{ $datasheet->repair_professional }}</td>          
                        <td>{{ $datasheet->repair_professional_contact }}</td>          
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@include ('errors')
@endsection