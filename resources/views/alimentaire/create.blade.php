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
                        <label for="CategoryAlimentaire" class="form-label">CategoryAlimentaire</label>
                        <select name="CategoryAlimentaire" id="CategoryAlimentaire" class="form-select
                         @error('CategoryAlimentaire') is-invalid @enderror">
                            <option value="">Choisir une category alimentaire</option>
                            @foreach($CategoryAlimentaire as $CategoryAlimentaire)
                            <option value="{{ $CategoryAlimentaire->id }}" {{ old('CategoryAlimentaire') == $CategoryAlimentaire->id ? "selected":'' }}>{{ $CategoryAlimentaire->CategoryAlimentaire }}</option>
                            @endforeach
                        </select>

                        @error('CategoryAlimentaire')
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


</body>
</html>
