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
            <div class="h4">Edit SizeAlimentaire</div>
            <div>
                <a href="{{ route('sizealimentaire.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('sizealimentaire.update',$sizealimentaire->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">



                    <div class="mb-3">
                        <label for="NomAlimentaire" class="form-label">NomAlimentaire</label>
                        <select name="NomAlimentaire" id="NomAlimentaire" class="form-select
                         @error('NomAlimentaire') is-invalid @enderror">
                            <option value="">Choisir un Alimentaire</option>
                            @foreach($alimentaires as $alimentaire)
                            <option value="{{ $alimentaire->id }}" {{ $sizealimentaire->alimentaire_id== $alimentaire->id ? "selected":'' }}>{{ $alimentaire->NomAlimentaire }}</option>
                            @endforeach
                        </select>

                        @error('NomAlimentaire')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Taille" class="form-label">Taille</label>
                        <select name="Taille" id="Taille" class="form-select
                         @error('Taille') is-invalid @enderror">
                            <option value="">Choisir une taille</option>
                            @foreach($sizes as $size)
                            <option value="{{ $size->id }}" {{ $sizealimentaire->size_id== $size->id ? "selected":'' }}>{{ $size->Taille }}</option>
                            @endforeach
                        </select>

                        @error('Taille')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                     <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" name="prix" id="prix" placeholder="Entrer prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix',$sizealimentaire->prix) }}">
                        @error('prix')
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

            <button class="btn btn-primary my-3">Update sizealimentaire</button>

        </form>
    </div>


</body>
</html>
