@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dernières transactions') }}</div>

                <div class="card-body">
                <ul class="list-group">
                <table class="table table-borderless">
                <thead>
                     <tr>
                        <th scope="col">Destinataire</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Date de l'opération</th>
                     </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->user->lastname. ' ' .$transaction->user->firstname}}</td>
                        <td>{{$transaction->amount .' ('.$transaction->currency.')'}}</td>
                        <td>{{date('D m Y H:i', strtotime($transaction->created_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
