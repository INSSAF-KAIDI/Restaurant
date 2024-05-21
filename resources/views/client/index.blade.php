@extends('layouts.master')

@section('title', 'Home CLients List')

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
            <div class="h4">Clients List</div>
            <div>
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
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
                        <th>NomClient</th>
                        <th>PrenomClient</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($clients->isNotEmpty())
                    @foreach ($clients as $client)
                    <tr valign="middle">
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->NomClient }}</td>
                        <td>{{ $client->user->name ?? 'None' }}</td>
                        <td>{{ $client->user->email ?? 'None' }}</td>
                        <td>{{ $client->adresse }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>{{ $client->status }}</td>
                        <td>
                            <a href="{{ route('clients.edit',$client->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteClient({{ $client->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="client-edit-action-{{ $client->id }}" action="{{ route('clients.destroy',$client->id) }}" method="post">
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
            {{ $clients->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteClient(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('client-edit-action-'+id).submit();
        }
    }
</script>
@endsection
