
@extends('index')

@section('MainContent')
<h1>EDIT DATA PROFILE</h1>

<div class="card">
<div class="card-header"><h1>Edit Data</h1></div>
<div class="card-body">
<form action="/editprofile/{{$user->ID_BARANG}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group>
            <label for="NAMA_BARANG" class="form-label">Nama Barang</label>
            <input type="text" name="NAMA_BARANG" id="NAMA_BARANG" class="form-control" value="{{$user->NAMA_BARANG}}" required>
        </div>
        <div class="form-group>
            <label for="HARGA_BARANG" class="form-label">HARGA BARANG</label>
            <input type="int" name="HARGA_BARANG" id="HARGA_BARANG" class="form-control" value="{{$user->HARGA_BARANG}}" required>
        </div>
        <div class="form-group>
            <label for="KATEGORI_BARANG" class="form-label">KATEGORI BARANG</label>
            <input type="text" name="KATEGORI_BARANG" id="KATEGORI_BARANG" class="form-control" value="{{$user->KATEGORI_BARANG}}" required>
        </div>
        <div class="form-group>
            <label for="FOTO_BARANG" class="form-label"></label>
            <img src="{{asset('asset/img/' .$user->FOTO_BARANG)}}" alt="" width='100px'>
            <input type="file" class="form-control" name="FOTO_BARANG" id="FOTO_BARANG">
        </div>

        <div class="card-footer">
            <a href="/profile" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>
</div>

@endsection