<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Data: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Animal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptions as $adoption)
                <tr>
                    <td>{{ $adoption['id'] }}</td>
                    <td>{{ $adoption['user'] }}</td>
                    <td>{{ $adoption['pet'] }}</td>
                    <td>{{ $adoption['status'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>