@extends('layouts.master')

@section('title', 'Edit Category Alimentaire')

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
            <div class="h4">Edit Category Alimentaire</div>
            <div>
                <a href="{{ route('categoryalimentaire.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('categoryalimentaire.update',$categoryalimentaire->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">


                     <div class="mb-3">
                        <label for="NomCategory" class="form-label">NomCategory</label>
                        <select name="NomCategory" id="NomCategory" class="form-select
                         @error('NomCategory') is-invalid @enderror">
                            <option value="">Choisir une Category</option>
                            @foreach($Categories as $Category)
                            <option value="{{ $Category->id }}" {{ $categoryalimentaire->Category_id== $Category->id ? "selected":'' }}>{{ $Category->NomCategory }}</option>
                            @endforeach
                        </select>

                        @error('NomCategory')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="NomArticle" class="form-label">NomArticle</label>
                        <input type="text" name="NomArticle" id="NomArticle" placeholder="Entrer NomArticle" class="form-control @error('NomArticle') is-invalid @enderror" value="{{ old('NomArticle',$categoryalimentaire->NomArticle) }}">
                        @error('NomArticle')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" placeholder="Entrer description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description',$categoryalimentaire->description) }}">
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


                </div>
            </div>

            <button class="btn btn-primary my-3">Update categoryalimentaire</button>

        </form>
    </div>


</body>
</html>
@endsection
