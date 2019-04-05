@extends('layout')

@section('content')
    @include ('flash')
    <h1 class="title">{{ $vehicle->name }}</h1>

    <div class="box">
        <form action="/vehicles/{{$vehicle->uuid}}/action" method="POST" style="margin-bottom:1em">
            @method('PATCH')
            @csrf
            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit" name="action" value="parked">
                        Estacionar
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
                    <p>Ligar o motor de uma embarcação a muito tempo parada</p>
                    <button class="button is-link" type="submit" name="action" value="deleted">
                        Excluir
                    </button>
                    <p>Excluir embarcação permanentemente</p>
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