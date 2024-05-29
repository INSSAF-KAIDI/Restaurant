@extends('layouts.master')

@section('title', 'Home Category Alimentaire List')

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
            <div class="h4">Category Alimentaire</div>
            <div>
                <a href="{{ route('categoryalimentaire.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NomCategory</th>
                        <th>NomArticle</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($categoryalimentaires->isNotEmpty())
                    @foreach ($categoryalimentaires as $categoryalimentaire)
                    <tr valign="middle">
                        <td>{{ $categoryalimentaire->id }}</td>
                        <td>{{ $categoryalimentaire && $categoryalimentaire->Category && $categoryalimentaire->Category->NomCategory != "" ? $categoryalimentaire->Category->NomCategory : '-- aucun --' }}</td>
                        <td>{{ $categoryalimentaire->NomArticle}}</td>
                        <td>{{ $categoryalimentaire->description }}</td>
                        <td>{{ $categoryalimentaire->status }}</td>
                        <td>
                            <a href="{{ route('categoryalimentaire.edit',$categoryalimentaire) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deletecategoryalimentaire({{ $categoryalimentaire->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="categoryalimentaire-edit-action-{{ $categoryalimentaire->id }}" action="{{ route('categoryalimentaire.destroy',$categoryalimentaire->id) }}" method="post">
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
            {{ $categoryalimentaires->links() }}
        </div>

    </div>

        </div>
    </div>
    
</body>
</html>
<script>
    function deletecategoryalimentaire(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('categoryalimentaire-edit-action-'+id).submit();
        }
    }
</script>
@endsection
