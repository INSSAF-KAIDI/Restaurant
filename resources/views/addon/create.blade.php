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
            <div class="h4">Addons</div>
            <div>
                <a href="{{ route('addons.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('addons.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="addon" class="form-label">Addon</label>
                        <input type="text" name="addon" id="addon" placeholder="Entrer addon" class="form-control @error('addon') is-invalid @enderror" value="{{ old('addon') }}">
                        @error('addon')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" name="prix" id="prix" placeholder="Entrer prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}">
                        @error('prix')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" id="status" placeholder="Entrer status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                        @error('status')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>




                    </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Addon</button>

        </form>
    </div>

        </div>
    </div>
</body>
</html>
