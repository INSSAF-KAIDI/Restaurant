@extends('layouts.master')

@section('title', 'Home Sizes List')

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
            <div class="h4">Sizes</div>
            <div>
                <a href="{{ route('sizes.create') }}" class="btn btn-primary">Create</a>
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
                        <th>Nom</th>
                        <th>Taille</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($sizes->isNotEmpty())
                    @foreach ($sizes as $size)
                    <tr valign="middle">
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->nom }}</td>
                        <td>{{ $size->taille }}</td>
                        <td>
                            <a href="{{ route('sizes.edit',$size->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteSize({{ $size->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="size-edit-action-{{ $size->id }}" action="{{ route('sizes.destroy',$size->id) }}" method="post">
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
            {{ $sizes->links() }}
        </div>

    </div>

        </div>
    </div>
</body>
</html>
<script>
    function deleteSize(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('size-edit-action-'+id).submit();
        }
    }
</script>
@endsection