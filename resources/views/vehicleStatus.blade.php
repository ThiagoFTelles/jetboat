@switch($vehicle->status)
    @case('out')
        Fora da marina
        @break

    @case('navigating')
        Navegando
        @break

    @case('parked')
        Estacionado
@endswitch 