@extends('layouts.master')

@section('title', 'Home Serveurs List')

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
            <div class="h4">Serveurs</div>
            <div>
                <a href="{{ route('serveurs.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NomServeur</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($serveurs->isNotEmpty())
                    @foreach ($serveurs as $serveur)
                    <tr valign="middle">
                        <td>{{ $serveur->id }}</td>
                        <td>{{ $serveur->NomServeur }}</td>
                        <td>{{ $serveur->email }}</td>
                        <td>{{ $serveur->telephone }}</td>
                        <td>{{ $serveur->adresse }}</td>
                        <td>{{ $serveur->status }}</td>
                        <td>
                            <a href="{{ route('serveurs.edit',$serveur->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteServeur({{ $serveur->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="serveur-edit-action-{{ $serveur->id }}" action="{{ route('serveurs.destroy',$serveur->id) }}" method="post">
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
            {{ $serveurs->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteServeur(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('serveur-edit-action-'+id).submit();
        }
    }
</script>
@endsection
