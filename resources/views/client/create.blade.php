@extends('layouts.master')

@section('title', 'Create Client')

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
            <div class="h4">Clients List</div>
            <div>
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">

                <div class="mb-3">
                        <label for="NomClient" class="form-label">NomClient</label>
                        <input type="text" name="NomClient" id="NomClient" placeholder="Entrer NomClient" class="form-control @error('NomClient') is-invalid @enderror" value="{{ old('NomClient') }}">
                        @error('NomClient')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="PrenomClient" class="form-label">PrenomClient</label>
                        <input type="text" name="PrenomClient" id="PrenomClient" placeholder="Entrer PrenomClient" class="form-control @error('PrenomClient') is-invalid @enderror" value="{{ old('PrenomClient') }}">
                        @error('PrenomClient')
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
                        <label for="password" class="form-label">password</label>
                        <input type="password" name="password" id="password" placeholder="Entrer password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="passwordConfirm" class="form-label">password confirmation</label>
                        <input type="password" name="password_confirmation" id="passwordConfirm" placeholder="Entrer password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                    </div>



                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" name="adresse" id="adresse" placeholder="Entrer adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}">
                        @error('adresse')
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
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" id="status" placeholder="Entrer status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Client</button>

        </form>
    </div>


</body>
</html>
@endsection
