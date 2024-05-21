@extends('layouts.master')

@section('title', 'Edit Commande')

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
            <div class="h4">Commandes</div>
            <div>
                <a href="{{ route('commande.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NoCmd</th>
                        <th>NomClient</th>
                        <th>NomServeur</th>
                        <th>Status</th>
                        <th>DateDemande</th>
                        <th>Montant</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($commandes->isNotEmpty())
                    @foreach ($commandes as $commande)
                    <tr valign="middle">
                        <td>{{ $commande->id }}</td>
                        <td>{{ $commande->NoCmd }}</td>
                        <td>{{ $commande && $commande->client && $commande->client->NomClient != "" ? $commande->client->NomClient : '-- aucun --' }}</td>
                        <td>{{ $commande && $commande->serveur && $commande->serveur->NomServeur != "" ? $commande->serveur->NomServeur : '-- aucun --' }}</td>
                        <td>{{ $commande->status }}</td>
                        <td>{{ $commande->DateDemande }}</td>
                        <td>{{ $commande->montant }}</td>
                        <td>
                            <a href="{{ route('commande.edit',$commande) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteCommande({{ $commande->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="commande-edit-action-{{ $commande->id }}" action="{{ route('commande.destroy',$commande->id) }}" method="post">
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
            {{ $commandes->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteCommande(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('commande-edit-action-'+id).submit();
        }
    }
</script>
@endsection
