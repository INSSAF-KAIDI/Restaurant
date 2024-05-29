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
            <div class="h4">Adresses</div>
            <div>
                <a href="{{ route('adresses.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('adresses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" name="ville" id="ville" placeholder="Entrer ville" class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}">
                        @error('ville')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quartier" class="form-label">Quartier</label>
                        <input type="text" name="quartier" id="quartier" placeholder="Entrer quartier" class="form-control @error('quartier') is-invalid @enderror" value="{{ old('quartier') }}">
                        @error('quartier')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libelle</label>
                        <input type="text" name="libelle" id="libelle" placeholder="Entrer libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}">
                        @error('libelle')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="codepostal" class="form-label">CodePostal</label>
                        <input type="text" name="codepostal" id="codepostal" placeholder="Entrer codepostal" class="form-control @error('codepostal') is-invalid @enderror" value="{{ old('codepostal') }}">
                        @error('codepostal')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                    </div>
            </div>

            <button class="btn btn-primary mt-3">Save Adresse</button>

        </form>
    </div>
        </div>
    </div>

</body>
</html>
