@extends('layouts.app')

@section('title', 'Home Reservations List')

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
            <div class="h4">Reservations</div>
            <div>
                <a href="{{ route('reservation.create') }}" class="btn btn-primary">Create</a>
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
                        <th>NumTable</th>
                        <th>DateDemande</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($reservations->isNotEmpty())
                    @foreach ($reservations as $reservation)
                    <tr valign="middle">
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation && $reservation->client && $reservation->client->NomClient != "" ? $reservation->client->NomClient : '-- aucun --' }}</td>
                        <td>{{ $reservation && $reservation->table && $reservation->table->NumTable != "" ? $reservation->table->NumTable : '-- aucun --' }}</td>
                        <td>{{ $reservation->DateDemande }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>
                            <a href="{{ route('reservation.edit',$reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteReservation({{ $reservation->id }})" class="btn btn-danger btn-sm"> Delete</a>

                            <form id="reservation-edit-action-{{ $reservation->id }}" action="{{ route('reservation.destroy',$reservation->id) }}" method="post">
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
            {{ $reservations->links() }}
        </div>

    </div>


</body>
</html>
<script>
    function deleteReservation(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('reservation-edit-action-'+id).submit();
        }
    }
</script>
@endsection
