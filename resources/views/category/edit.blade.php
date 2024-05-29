@extends('layouts.master')

@section('title', 'Edit Category')

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
         <div class="h4">Edit Category</div>
            <div>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="NomCategory" class="form-label">NomCategory</label>
                        <input type="text" name="NomCategory" id="NomCategory" placeholder="Enter NomCategory" class="form-control @error('NomCategory') is-invalid @enderror" value="{{ old('NomCategory',$category->NomCategory) }}">
                        @error('NomCategory')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="remise" class="form-label">Remise</label>
                        <input type="text" name="remise" id="remise" placeholder="Enter Remise" class="form-control @error('remise') is-invalid @enderror" value="{{ old('remise',$category->remise) }}">
                        @error('remise')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" placeholder="Enter Description" class="form-control">{{ old('description',$category->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"></label>
                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">

                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                        <div class="pt-3">
                            @if($category->image != '' && file_exists(public_path().'/uploads/categories/'.$category->image))
                            <img src="{{ url('uploads/categories/'.$category->image) }}" alt="" width="100" height="100">
                        @endif
                        </div>
                    </div>

                </div>
            </div>

            <button class="btn btn-primary my-3">Update Category</button>

        </form>
    </div>

        </div>
    
</body>
</html>
@endsection

