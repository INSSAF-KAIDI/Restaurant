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
            <div class="h4">Edit Commande</div>
            <div>
                <a href="{{ route('commandealimentaire.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('commandealimentaire.update',$commandealimentaire->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">



                    <div class="mb-3">
                        <label for="NoCmd" class="form-label">NoCmd</label>
                        <select name="NoCmd" id="NoCmd" class="form-select
                         @error('NoCmd') is-invalid @enderror">
                            <option value="">Choisir une commande</option>
                            @foreach($commandes as $commande)
                            <option value="{{ $commande->id }}" {{ $commande->commande_id== $commande->id ? "selected":'' }}>{{ $commande->NoCmd }}</option>
                            @endforeach
                        </select>

                        @error('NoCmd')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="NomAlimentaire" class="form-label">NomAlimentaire</label>
                        <select name="NomAlimentaire" id="NomAlimentaire" class="form-select
                         @error('NomAlimentaire') is-invalid @enderror">
                            <option value="">Choisir un Alimentaire</option>
                            @foreach($alimentaires as $alimentaire)
                            <option value="{{ $alimentaire->id }}" {{ $commande->alimentaire_id== $alimentaire->id ? "selected":'' }}>{{ $alimentaire->NomAlimentaire }}</option>
                            @endforeach
                        </select>

                        @error('NomAlimentaire')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <select name="prix" id="prix" class="form-select
                         @error('prix') is-invalid @enderror">
                            <option value="">Choisir un prix</option>
                            @foreach($size_alimentaires as $size_alimentaire)
                            <option value="{{ $size_alimentaire->id }}" {{ $size_alimentaire->size_alimentaire_id== $size_alimentaire->id ? "selected":'' }}>{{ $size_alimentaire->prix }}</option>
                            @endforeach
                        </select>

                        @error('prix')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                        <label for="quantite" class="form-label">Quantite</label>
                        <input type="text" name="quantite" id="quantite" placeholder="Entrer quantite" class="form-control @error('quantite') is-invalid @enderror" value="{{ old('quantite',$commandealimentaire->quantite) }}">
                        @error('quantite')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" name="montant" id="montant" placeholder="Entrer montant" class="form-control @error('montant') is-invalid @enderror" value="{{ old('montant',$commandealimentaire->montant) }}">
                        @error('montant')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
            </div>

            <button class="btn btn-primary my-3">Update CommandeAlimentaire</button>

        </form>
    </div>


</body>
</html>
