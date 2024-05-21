@extends('layouts.master')

@section('title', 'Home Category List')

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

    <!-- <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">CRUD / FOOD_MANAGER</div>
        </div>
    </div> -->

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Category List</div>
            <div>
                <a href="{{ route('admin/categories/create') }}" class="btn btn-primary">Add Category</a>
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
                        <th>Image</th>
                        <th>NomCategory</th>
                        <th>Remise</th>
                        <th>Description</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($categories->isNotEmpty())
                    @foreach ($categories as $category)
                    <tr valign="middle">
                        <td>{{ $category->id }}</td>
                        <td>
                            @if($category->image != '' && file_exists(public_path().'/uploads/categories/'.$category->image))
                            <img src="{{ url('uploads/categories/'.$category->image) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('assets/assets/images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif
                        </td>
                        <td>{{ $category->NomCategory}}</td>
                        <td>{{ $category->remise }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteCategory({{ $category->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="category-edit-action-{{ $category->id }}" action="{{ route('categories.destroy',$category->id) }}" method="post">
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
            {{ $categories->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteCategory(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('category-edit-action-'+id).submit();
        }
    }
</script>

@endsection


