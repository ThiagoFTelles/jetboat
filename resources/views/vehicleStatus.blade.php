@switch($vehicle->status)
    @case('out')
        <span style="text-transform: initial;">Fora da marina</span>
        @break

    @case('navigating')
        <span style="text-transform: initial;">Navegando</span>
        @break

    @case('parked')
        <span style="text-transform: initial;">Estacionado</span>
@endswitch 