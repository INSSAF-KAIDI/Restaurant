@extends('layouts.master')

@section('title', 'Home Size Alimentaire List')

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
    <div class="page-wrapper">
        <div class="content container-fluid">
     
    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">SizeAlimentaires</div>
            <div>
                <a href="{{ route('sizealimentaire.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NomAlimentaire</th>
                        <th>Taille</th>
                        <th>Prix</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($sizealimentaires->isNotEmpty())
                    @foreach ($sizealimentaires as $sizealimentaire)
                    <tr valign="middle">
                        <td>{{ $sizealimentaire->id }}</td>
                        <td>{{ $sizealimentaire && $sizealimentaire->alimentaire && $sizealimentaire->alimentaire->NomAlimentaire != "" ? $sizealimentaire->alimentaire->NomAlimentaire : '-- aucun --' }}</td>
                        <td>{{ $sizealimentaire && $sizealimentaire->size && $sizealimentaire->size->Taille!= "" ? $sizealimentaire->size->Taille: '-- aucun --' }}</td>
                        <td>{{ $sizealimentaire->Prix }}</td>
                        <td>{{ $sizealimentaire->status }}</td>
                        <td>
                            <a href="{{ route('sizealimentaire.edit',$sizealimentaire->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteSizeAlimentaire({{ $sizealimentaire->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="sizealimentaire-edit-action-{{ $sizealimentaire->id }}" action="{{ route('sizealimentaire.destroy',$sizealimentaire->id) }}" method="post">
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
            {{ $sizealimentaires->links() }}
        </div>

    </div>

        </div>
    </div>
</body>
</html>
<script>
    function deleteSizeAlimentaire(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('sizealimentaire-edit-action-'+id).submit();
        }
    }
</script>
@endsection