        @foreach ($marinaActions->groupby('subject_id') as $action)
            @if  ($action[0]['created_at'] <= $df)
                <table>
                    <thead>
                        <tr>
                            <th>{{ $action[0]['properties']['attributes']['owner_name'] }}</th>
                        </tr>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($action as $a)
                            <tr>
                                <td>{{ $a->created_at->format('d/m/Y') }}</td> 
                                <td>{{ $a->created_at->format('H:i') }}</td> 
                                <td>@switch($a->properties['attributes']['status'])
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
                                </td>          
                            </tr>
                        @endforeach
                            <tr></tr>
                    </tbody>
                </table>
            @endif
        @endforeach