@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Envoyer de l\'argent') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté!') }}
                    <div class="p-3">

                  

                    </div>

                    <form data-action="{{ route('changes.store') }}" method="POST" enctype="multipart/form-data" id="send-money-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-12">
                            <input  id="receiver_id" name="receiver_id" type="hidden">
                                <input type="text" class="form-control @error('receiver') is-invalid @enderror" id="receiver" name="receiver"  placeholder="Nom et Prénom" required aria-label="Nom et Prénom">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <input type="number" class="form-control @error('amount') is-invalid @enderror" placeholder="Montant" id="amount" required name="amount" aria-label="Montant">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <input type="text" class="form-control @error('currency') is-invalid @enderror" placeholder="Devise" id="currency" name="currency" aria-label="currency">
                            </div>
                            <div class="col-md-6 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-submit">
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
