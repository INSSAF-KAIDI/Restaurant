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
            <div class="h4">Commandealimentaires</div>
            <div>
                <a href="{{ route('commandealimentaire.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NoCmd</th>
                        <th>NomAlimentaire</th>
                        <th>Prix</th>
                        <th>Quantite</th>
                        <th>Montant</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($commandealimentaires->isNotEmpty())
                    @foreach ($commandealimentaires as $commandealimentaire)
                    <tr valign="middle">
                        <td>{{ $commandealimentaire->id }}</td>
                        <td>{{ $commandealimentaire && $commandealimentaire->commande && $commandealimentaire->commande->NoCmd != "" ? $commandealimentaire->commande->NoCmd : '-- aucun --' }}</td>
                        <td>{{ $commandealimentaire && $commandealimentaire->Alimentaire && $commandealimentaire->Alimentaire->NomAlimentaire != "" ? $commandealimentaire->Alimentaire->NomAlimentaire : '-- aucun --' }}</td>
                        <td>{{ $commandealimentaire && $commandealimentaire->size_alimentaire && $commandealimentaire->size_alimentaire->prix != "" ? $commandealimentaire->size_alimentaire->prix : '-- aucun --' }}</td>
                        <td>{{ $commandealimentaire->quantite }}</td>
                        <td>{{ $commandealimentaire->montant }}</td>
                        <td>
                            <a href="{{ route('commandealimentaire.edit',$commandealimentaire) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteCommandeAlimentaire({{ $commandealimentaire->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="commandealimentaire-edit-action-{{ $commandealimentaire->id }}" action="{{ route('commandealimentaire.destroy',$commandealimentaire->id) }}" method="post">
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
            {{ $commandealimentaires->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteCommandeAlimentaire(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('commandealimentaire-edit-action-'+id).submit();
        }
    }
</script>
