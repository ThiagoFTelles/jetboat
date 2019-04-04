@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul style="padding: 0;">
                    <a style="display: block;" href="/marina">Embarcações</a>
                    <a style="display: block;" href="/qrcode">Ler QR Code</a>
                    </ul>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
