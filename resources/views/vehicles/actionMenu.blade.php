@extends('layout')

@section('content')
@include ('flash')

<h1 class="title">{{ $vehicle->name }}</h1>

<div class="box">
    <form action="/vehicles/{{$vehicle->uuid}}/action" method="POST" style="margin-bottom:1em">
        @method('PATCH')
        @csrf
        <div class="panel_info_container" style="text-align: left;">
            <p>Combustível: <input name="gas_percentage" style="width: 50px;text-align: center;" class="panel_info_input" id="gas_percentage" type="number" min="0" max="100" step="5" value="{{ $vehicle->gas_percentage }}">%</p>

            <p>Horas: <input name="navigation_hours" style="width: 50px;text-align: center;" class="panel_info_input" id="navigation_hours" type="number" min="0" max="9999" value="{{ $vehicle->navigation_hours }}"></p>

            <p>Pertences:</p>
            <textarea name="belongings" rows="4" cols="20" id="belongings" style="width: 100%;" class="panel_info_input">{{ $vehicle->belongings }}</textarea>
            <br>
            <br>
            <br>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit" name="action" value="parked">
                    Chegada
                </button>
                <p>Entrar na marina e estacionar embarcação</p><br>
                <button class="button is-link" type="submit" name="action" value="navigating">
                    Descer Rampa
                </button>
                <p>Sair para navegar</p><br>
                <button class="button is-link" type="submit" name="action" value="out">
                    Sair
                </button>
                <p>Sair temporariamente para viagem ou manutenção</p><br>
                <button class="button is-link" type="submit" name="action" value="run">
                    Funcionamento técnico
                </button>
                <p>Ligar o motor de uma embarcação a muito tempo parada</p><br>
                <button class="button is-link" type="submit" name="action" value="deleted">
                    Excluir
                </button>
                <p>Excluir embarcação desta marina</p>
            </div>
        </div>
    </form>


    <!-- <form action="/vehicles/{{$vehicle->uuid}}/generateqr/?text={{$vehicle->uuid}}" method="POST" style="margin-bottom:1em">
            @csrf
            <button class="button is-link" type="submit" name="value" value="{{$vehicle->uuid}}">
                        Gerar QrCode
            </button>

        </form> -->


    @include ('errors')
</div>

@endsection