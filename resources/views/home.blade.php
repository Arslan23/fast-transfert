@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tableau de Bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté!') }}

                    <form method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="form-control" id="receiver" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <input type="number" class="form-control" placeholder="Montant" aria-label="Montant">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                            <div class="col-md-6 col-sm-4">
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
