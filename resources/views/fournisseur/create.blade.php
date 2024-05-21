@extends('layouts.app')

@section('title', 'Create Fournisseur')
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

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Fournisseurs</div>
            <div>
                <a href="{{ route('fournisseurs.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('fournisseurs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="NomFournisseur" class="form-label">NomFournisseur</label>
                        <input type="text" name="NomFournisseur" id="NomFournisseur" placeholder="Entrer NomFournisseur" class="form-control @error('NomFournisseur') is-invalid @enderror" value="{{ old('NomFournisseur') }}">
                        @error('NomFournisseur')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Entrer email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" name="telephone" id="telephone" placeholder="Entrer telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}">
                        @error('telephone')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" name="adresse" id="adresse" placeholder="Entrer adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}">
                        @error('adresse')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" id="status" placeholder="Entrer status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    </div>
            </div>

            <button class="btn btn-primary mt-3">Save Fournisseur</button>

        </form>
    </div>


</body>
</html>
