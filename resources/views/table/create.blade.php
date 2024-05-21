@extends('layouts.app')

@section('title', 'Create Table')

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
            <div class="h4">Tables</div>
            <div>
                <a href="{{ route('tables.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('tables.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">


                    <div class="mb-3">
                        <label for="NumTable" class="form-label">NumTable</label>
                        <input type="text" name="NumTable" id="NumTable" placeholder="Entrer NumTable" class="form-control @error('NumTable') is-invalid @enderror" value="{{ old('NumTable') }}">
                        @error('NumTable')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="capacite" class="form-label">Capacite</label>
                        <input type="text" name="capacite" id="capacite" placeholder="Entrer capacite" class="form-control @error('capacite') is-invalid @enderror" value="{{ old('capacite') }}">
                        @error('capacite')
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


                </div>
            </div>

            <button class="btn btn-primary mt-3">Save table</button>

        </form>
    </div>


</body>
</html>
