@extends('layouts.master')

@section('title', 'Create Category')

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
            <div class="h4">Alimentaires</div>
            <div>
                <a href="{{ route('alimentaire.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('alimentaire.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">




                    <div class="mb-3">
                        <label for="NomCategory" class="form-label">Nom Category</label>
                        <select name="NomCategory" id="NomCategory" class="form-select
                         @error('NomCategory') is-invalid @enderror">
                            <option value="">Choisir une category </option>
                            @foreach($Category as $Category)
                            <option value="{{ $Category->id }}" {{ old('NomCategory') == $Category->id ? "selected":'' }}>{{ $Category->Category }}</option>
                            @endforeach
                        </select>

                        @error('NomCategory')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nomAliment" class="form-label">Nom d'Aliment</label>
                        <input type="text" name="nomAliment" id="nomAliment" placeholder="Entrer nomAliment" class="form-control @error('nomAliment') is-invalid @enderror" value="{{ old('nomAliment') }}">
                        @error('nomAliment')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" placeholder="Entrer description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                        @error('description')
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
                        <label for="image" class="form-label"></label>
                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">

                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                </div>
            </div>

            <button class="btn btn-primary mt-3">Save alimentaire</button>

        </form>
    </div>

        </div>
    </div>
</body>
</html>
@endsection
