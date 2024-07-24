<!DOCTYPE html>
<html>
<head>
    <title>Master Sales PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Master Sales</h1>
    <table>
        <thead>
            <tr>
                <th>Kode Sales</th>
                <th>Nama Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saless as $sales)
            <tr>
                <td>{{ $sales->kode_sales }}</td>
                <td>{{ $sales->nama_sales }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
