@extends('index')

@section('MainContent')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTML Table dengan CSS Menarik</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table.custom-table {
      width: 100%;
      border-collapse: collapse;
    }

    table.custom-table th, table.custom-table td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    table.custom-table th {
      background-color: #f2f2f2;
    }

    table.custom-table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table.custom-table tbody tr:hover {
      background-color: #ddd;
    }

    table.custom-table img {
      display: block;
      max-width: 100%;
      height: 50%;
    }
  </style>
</head>
<body>
    <h1>Master Data</h1>
    <a href="/tambahuser" class="btn btn-success">+ Tambah Data</a><br><br>
  <table class="custom-table">
    <thead>
      <tr>
        <th>NO</th>
        <th>ID BARANG</th>
        <th>NAMA BARANG</th>
        <th>HARGA BARANG</th>
        <th>KATEGORI BARANG</th>
        <th>FOTO BARANG</th>
        <th></th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
     @foreach($db as $name)

     <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$name->ID_BARANG}}</td>
        <td>{{$name->NAMA_BARANG}}</td>
        <td>{{$name->HARGA_BARANG}}</td>
        <td>{{$name->KATEGORI_BARANG}}</td>
        <td>{{$name->FOTO_BARANG}}</td>
        <td><img src="{{asset('asset/img/' .$name->FOTO_BARANG)}}" alt="" width='100px'></td>
        <td style="text-align: center;">
        <a href="/profile/edit/{{$name->ID_BARANG}}" class='btn btn-succes'>Edit</a>
        <a href="/profile/properties/{{$name->ID_BARANG}}" class='btn btn-warning'>Properties</a>
        <a href="/profile/remove/{{$name->ID_BARANG}}" class='btn btn-danger'>Remove</a>
</td>
</tr>
@endforeach
    </tbody>
  </table>
</body>
</html>
@endsection