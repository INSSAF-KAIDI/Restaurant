@extends('layouts.master')

@section('title', 'Create Commande')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD / FOOD_MANAGER</title>
    <link rel="stylesheet" href="{{ asset('asset/assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="page-wrapper">
        <div class="content container-fluid">


    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Commandes</div>
            <div>
                <a href="{{ route('commande.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('commande.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">


                    <div class="mb-3">
                        <label for="NoCmd" class="form-label">NoCmd</label>
                        <input type="text" name="NoCmd" id="NoCmd" placeholder="Entrer NoCmd" class="form-control @error('NoCmd') is-invalid @enderror" value="{{ old('NoCmd') }}">
                        @error('NoCmd')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="NomClient" class="form-label">NomClient</label>
                        <select name="NomClient" id="NomClient" class="form-select
                         @error('NomClient') is-invalid @enderror">
                            <option value="">Choisir un client</option>
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('NomClient') == $client->id ? "selected":'' }}>{{ $client->NomClient }}</option>
                            @endforeach
                        </select>

                        @error('NomClient')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="NomServeur" class="form-label">NomServeur</label>
                        <select name="NomServeur" id="NomServeur" class="form-select
                         @error('NomServeur') is-invalid @enderror">
                            <option value="">Choisir un serveur</option>
                            @foreach($serveurs as $serveur)
                            <option value="{{ $serveur->id }}" {{ old('NomServeur') == $serveur->id ? "selected":'' }}>{{ $serveur->NomServeur }}</option>
                            @endforeach
                        </select>

                        @error('NomServeur')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                             <label for="status" class="form-label">Status</label>
                             <div class="d-flex">
                    <div class="form-check me-3">
                             <input type="radio" name="status" id="active" value="active" class="form-check-input @error('status') is-invalid @enderror" @if(old('status') === 'active') checked @endif>
                             <label for="active" class="form-check-label">Active</label>
                    </div>
                    <div class="form-check">
                             <input type="radio" name="status" id="inactive" value="inactive" class="form-check-input @error('status') is-invalid @enderror" @if(old('status') === 'inactive') checked @endif>
                             <label for="inactive" class="form-check-label">Inactive</label>
                    </div>
                    </div>
                         @error('status')
                        <p class="invalid-feedback">{{ $message }}</p>
                           @enderror
                    </div>


                    <div class="mb-3">
                        <label for="DateDemande" class="form-label">DateDemande</label>
                        <input type="date" name="DateDemande" id="DateDemande" placeholder="Entrer DateDemande" class="form-control @error('DateDemande') is-invalid @enderror" value="{{ old('DateDemande') }}">
                        @error('DateDemande')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" name="montant" id="montant" placeholder="Entrer montant" class="form-control @error('montant') is-invalid @enderror" value="{{ old('montant') }}">
                        @error('montant')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                </div>
            </div>

            <button class="btn btn-primary mt-3">Save Commande</button>

        </form>
    </div>
        </div>
    </div>

</body>
</html>
@endsection
