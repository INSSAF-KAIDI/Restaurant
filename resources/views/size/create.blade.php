@extends('layouts.master')

@section('title', 'Create Size')

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
            <div class="h4">Sizes</div>
            <div>
                <a href="{{ route('sizes.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('sizes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">


                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Entrer Nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                        @error('nom')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="taille" class="form-label">Taille</label>
                        <input type="text" name="taille" id="taille" placeholder="Entrer Taille" class="form-control @error('taille') is-invalid @enderror" value="{{ old('taille') }}">
                        @error('taille')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                </div>
            </div>

            <button class="btn btn-primary mt-3">Save Size</button>

        </form>
    </div>
        </div>
    </div>
</body>
</html>
