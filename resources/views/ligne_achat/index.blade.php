@extends('layouts.app')

@section('title', 'Home Ligne-Achat List')

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
            <div class="h4">Ligne_Achats</div>
            <div>
                <a href="{{ route('Ligne_Achats.create') }}" class="btn btn-primary">Create</a>
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
                        <th>No_Invoice</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($ligne_achats->isNotEmpty())
                    @foreach ($ligne_achats as $ligne_achat)
                    <tr valign="middle">
                        <td>{{ $ligne_achat->id }}</td>
                        <td>{{ $ligne_achat->NomFournisseur }}</td>
                        <td>{{ $ligne_achat->no_invoice }}</td>
                        <td>{{ $ligne_achat->montant }}</td>
                        <td>{{ $ligne_achat->date }}</td>
                        <td>{{ $ligne_achat->status }}</td>
                        <td>
                            <a href="{{ route('Ligne_Achats.edit',$ligne_achat) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteLigne_Achat({{ $ligne_achat->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="Ligne_Achat-edit-action-{{ $ligne_achat->id }}" action="{{ route('Ligne_Achats.destroy',$ligne_achat->id) }}" method="post">
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
            {{ $ligne_achats->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteLigne_Achat(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('Ligne_Achat-edit-action-'+id).submit();
        }
    }
</script>
