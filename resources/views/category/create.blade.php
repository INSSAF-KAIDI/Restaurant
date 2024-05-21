@extends('layouts.master')

@section('title', 'Create Category')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/assets/css/bootstrap.min.css') }}">
</head>
<body>

    <!-- <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">CRUD / FOOD_MANAGER</div>
        </div>
    </div> -->

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Categories</div>
            <div>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <!-- <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data"> -->
        <form action="{{ route('admin/categories/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="NomCategory" class="form-label">NomCategory</label>
                        <input type="text" name="NomCategory" id="NomCategory" placeholder="Entrer NomCategory" class="form-control @error('NomCategory') is-invalid @enderror" value="{{ old('NomCategory') }}">
                        @error('NomCategory')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="remise" class="form-label">Remise</label>
                        <input type="text" name="remise" id="remise" placeholder="Entrer Remise" class="form-control @error('remise') is-invalid @enderror" value="{{ old('remise') }}">
                        @error('remise')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" placeholder="Entrer Description" class="form-control">{{ old('description') }}</textarea>
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

            <button class="btn btn-primary mt-3">Save Category</button>

        </form>
    </div>


</body>
</html>
@endsection


