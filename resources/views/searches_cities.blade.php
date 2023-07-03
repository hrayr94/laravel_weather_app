<!-- resources/views/searched_cities.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Searched Cities</title>
</head>
<body>
<h1>Searched Cities</h1>

<table>
    <thead>
    <tr>
        <th>City</th>
        <th>Temperature</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($weathers as $weather)
        <tr>
            <td>{{ $weather->city }}</td>
            <td>{{ $weather->temperature }}</td>
            <td>{{ $weather->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
