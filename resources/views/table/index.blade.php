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
            <div class="h4">Tables</div>
            <div>
                <a href="{{ route('tables.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NumTable</th>
                        <th>Capacite</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($tables->isNotEmpty())
                    @foreach ($tables as $table)
                    <tr valign="middle">
                        <td>{{ $table->id }}</td>
                        <td>{{ $table->NumTable }}</td>
                        <td>{{ $table->Capacite }}</td>
                        <td>{{ $table->Status }}</td>
                        <td>
                            <a href="{{ route('tables.edit',$table->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteTable({{ $table->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="table-edit-action-{{ $table->id }}" action="{{ route('tables.destroy',$table->id) }}" method="post">
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
            {{ $tables->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteTable(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('table-edit-action-'+id).submit();
        }
    }
</script>
