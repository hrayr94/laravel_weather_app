<!-- resources/views/search.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Weather Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<h1>Weather Search</h1>
<input type="text" id="city" placeholder="Enter city name">
<button id="search">Search</button>

<table id="weatherTable">
    <thead>
    <tr>
        <th>City</th>
        <th>Temperature</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <!-- Weather data will be displayed here -->
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#search').click(function () {
            let city = $('#city').val();
                    console.log(city)

            $.ajax({
                url: 'api/search',
                type: 'POST',
                data: {
                    city: city
                },
                success: function (data) {
                    let row = '<tr>';
                    row += '<td>' + data.city + '</td>';
                    row += '<td>' + data.temperature + '</td>';
                    row += '<td>' + data.description + '</td>';
                    row += '</tr>';
                    $('#weatherTable tbody').append(row);
                }
            });
        });
    });
</script>
</body>
</html>
