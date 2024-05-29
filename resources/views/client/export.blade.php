<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Tel</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->NomClient }}</td>
            <td>{{ $client->PrenomClient }}</td>
            <td>{{ $client->adresse }}</td>
            <td>{{ $client->telephone }}</td>
            <td>{{ $client->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
