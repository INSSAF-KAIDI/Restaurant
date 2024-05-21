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
            <div class="h4">Edit Size</div>
            <div>
                <a href="{{ route('sizes.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('sizes.update',$size->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Entrer Nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom',$size->nom) }}">
                        @error('nom')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="taille" class="form-label">Taille</label>
                        <input type="text" name="taille" id="taille" placeholder="Entrer Taille" class="form-control @error('taille') is-invalid @enderror" value="{{ old('taille',$size->taille) }}">
                        @error('taille')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
            </div>

            <button class="btn btn-primary my-3">Update Size</button>

        </form>
    </div>


</body>
</html>
