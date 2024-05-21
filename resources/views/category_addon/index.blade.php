@extends('layouts.master')

@section('title', 'Home Category Addon List')

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
            <div class="h4">CategoryAddons</div>
            <div>
                <a href="{{ route('categoryaddons.create') }}" class="btn btn-primary">Create</a>
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
                        <th>Titre</th>
                        <th>Choix</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($categoryaddons->isNotEmpty())
                    @foreach ($categoryaddons as $categoryaddon)
                    <tr valign="middle">
                        <td>{{ $categoryaddon->id }}</td>
                        <td>{{ $categoryaddon->titre }}</td>
                        <td>{{ $categoryaddon->choix }}</td>
                        <td>
                            <a href="{{ route('categoryaddons.edit',$categoryaddon->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteCategoryAddon({{ $categoryaddon->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="categoryaddon-edit-action-{{ $categoryaddon->id }}" action="{{ route('categoryaddons.destroy',$categoryaddon->id) }}" method="post">
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
            {{ $categoryaddons->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteCategoryAddon(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('categoryaddon-edit-action-'+id).submit();
        }
    }
</script>
@endsection
