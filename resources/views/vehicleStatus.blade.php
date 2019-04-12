@switch($vehicle->status)
    @case('out')
        <h2 class="subtitle is-6" style="color:#4a4a4a;text-transform: initial;">Fora da marina</h2>
        @break

    @case('navigating')
        <h2 class="subtitle is-6" style="color:#4a4a4a;text-transform: initial;">Navegando</h2>
        @break

    @case('parked')
        <h2 class="subtitle is-6" style="color:#4a4a4a;text-transform: initial;">Estacionado</h2>
@endswitch 