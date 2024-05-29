@extends('layouts.master')

@section('title', 'Edit Ligne Achat')

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
            <div class="h4">Edit Ligne_Achat</div>
            <div>
                <a href="{{ route('Ligne_Achats.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('Ligne_Achats.update',$ligne_achat->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                <div class="mb-3">
                        <label for="NomFournisseur" class="form-label">NomFournisseur</label>
                        <select name="NomFournisseur" id="NomFournisseur" class="form-select
                         @error('NomFournisseur') is-invalid @enderror">
                            <option value="">Choisir un Fournisseur</option>
                            @foreach($Fournisseurs as $Fournisseur)
                            <option value="{{ $Fournisseurs->id }}" {{ old('NomFournisseur') == $Fournisseur->id ? "selected":'' }}>{{ $Fournisseur->NomFournisseur }}</option>
                            @endforeach
                        </select>

                        @error('NomFournisseur')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_invoice" class="form-label">No_Invoice</label>
                        <input type="text" name="no_invoice" id="no_invoice" placeholder="Entrer no_invoice" class="form-control @error('no_invoice') is-invalid @enderror" value="{{ old('no_invoice',$ligne_achat->no_invoice) }}">
                        @error('no_invoice')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" name="montant" id="montant" placeholder="Entrer montant" class="form-control @error('montant') is-invalid @enderror" value="{{ old('montant',$ligne_achat->montant)}}">
                        @error('montant')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" placeholder="Entrer date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date',$ligne_achat->date) }}">
                        @error('date')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" id="status" placeholder="Entrer status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status',$ligne_achat->status) }}">
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <button class="btn btn-primary my-3">Update Ligne_Achat</button>

        </form>
    </div>
        </div>
    </div>
    
</body>
</html>
@endsection