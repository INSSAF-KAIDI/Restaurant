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
            <div class="h4">Adresses</div>
            <div>
                <a href="{{ route('adresses.create') }}" class="btn btn-primary">Create</a>
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
                        <th>Ville</th>
                        <th>Quartier</th>
                        <th>Libelle</th>
                        <th>CodePostal</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($adresses->isNotEmpty())
                    @foreach ($adresses as $adresse)
                    <tr valign="middle">
                        <td>{{ $adresse->id }}</td>
                        <td>{{ $adresse->ville }}</td>
                        <td>{{ $adresse->quartier }}</td>
                        <td>{{ $adresse->libelle }}</td>
                        <td>{{ $adresse->codepostal }}</td>
                       <td>
                            <a href="{{ route('adresses.edit',$adresse->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteAdresse({{ $adresse->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="adresse-edit-action-{{ $adresse->id }}" action="{{ route('adresses.destroy',$adresse->id) }}" method="post">
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
            {{ $adresses->links() }}
        </div>

    </div>
        </div>
    </div>

</body>
</html>
<script>
    function deleteAdresse(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('adresse-edit-action-'+id).submit();
        }
    }
</script>
