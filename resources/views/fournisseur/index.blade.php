@extends('layouts.app')

@section('title', 'Home Fournisseurs List')

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
            <div class="h4">Fournisseurs</div>
            <div>
                <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th width="30">ID</th>
                        <th>NomFournisseur</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($fournisseurs->isNotEmpty())
                    @foreach ($fournisseurs as $fournisseur)
                    <tr valign="middle">
                        <td>{{ $fournisseur->id }}</td>
                        <td>{{ $fournisseur->NomFournisseur }}</td>
                        <td>{{ $fournisseur->email }}</td>
                        <td>{{ $fournisseur->telephone }}</td>
                        <td>{{ $fournisseur->adresse }}</td>
                        <td>{{ $fournisseur->status }}</td>
                        <td>
                            <a href="{{ route('fournisseurs.edit',$fournisseur->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteFournisseur({{ $fournisseur->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="fournisseur-edit-action-{{ $fournisseur->id }}" action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @else
                    <tr>
                        <td colspan="6">Record Not Found</td>
                    </tr>
                    @endif

                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $fournisseurs->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteFournisseur(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('fournisseur-edit-action-'+id).submit();
        }
    }
</script>
@endsection
