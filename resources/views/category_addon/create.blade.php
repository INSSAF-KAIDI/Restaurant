@extends('layouts.master')

@section('title', 'Create Category Addon')

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


    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">CategoryAddons</div>
            <div>
                <a href="{{ route('categoryaddons.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('categoryaddons.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" name="titre" id="titre" placeholder="Entrer titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}">
                        @error('titre')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="choix" class="form-label">Choix</label>
                        <input type="text" name="choix" id="choix" placeholder="Entrer choix" class="form-control @error('choix') is-invalid @enderror" value="{{ old('choix') }}">
                        @error('choix')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>




                    </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save CategoryAddon</button>

        </form>
    </div>


</body>
</html>
@endsection
