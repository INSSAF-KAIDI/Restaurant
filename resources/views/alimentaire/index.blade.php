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
            <div class="h4">Alimentaires</div>
            <div>
                <a href="{{ route('alimentaire.create') }}" class="btn btn-primary">Create</a>
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
                        <th>CategoryAlimentaire</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Image</th>

                        <th width="150">Action</th>
                    </tr>

                    @if($alimentaires->isNotEmpty())
                    @foreach ($alimentaires as $alimentaire)
                    <tr valign="middle">
                        <td>{{ $alimentaire->id }}</td>
                        <td>{{ $alimentaire && $alimentaire->categoryalimentaire && $alimentaire->categoryalimentaire->CategoryAlimentaire != "" ? $alimentaire->categoryalimentaire->CategoryAlimentaire : '-- aucun --' }}</td>
                        <td>{{ $alimentaire->description }}</td>
                        <td>{{ $alimentaire->status }}</td>
                        <td>
                            @if($alimentaire->image != '' && file_exists(public_path().'/uploads/alimentaires/'.$alimentaire->image))
                            <img src="{{ url('uploads/alimentaires/'.$alimentaire->image) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('assets/assets/images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('alimentaire.edit',$alimentaire->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteAlimentaire({{ $alimentaire->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="alimentaire-edit-action-{{ $alimentaire->id }}" action="{{ route('alimentaire.destroy',$alimentaire->id) }}" method="post">
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
            {{ $alimentaires->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteAlimentaire(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('alimentaire-edit-action-'+id).submit();
        }
    }
</script>
