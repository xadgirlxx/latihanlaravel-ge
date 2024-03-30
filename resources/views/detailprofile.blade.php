
@extends('index')

@section('MainContent')
<!-- <h1>Ini Tambah User</h1> -->

<div class="card">
<div class="card-header"><h1>Tambah Data</h1></div>
<div class="card-body">
        <div class="form-group>
            <label for="NAMA_BARANG" class="form-label">Nama Barang</label>
            <input type="text" name="NAMA_BARANG" id="NAMA_BARANG" class="form-control" value="{{$user->NAMA_BARANG}}" readonly>
        </div>
        <div class="form-group>
            <label for="HARGA_BARANG" class="form-label">HARGA BARANG</label>
            <input type="int" name="HARGA_BARANG" id="HARGA_BARANG" class="form-control" value="{{$user->HARGA_BARANG}}" readonly>
        </div>
        <div class="form-group>
            <label for="KATEGORI_BARANG" class="form-label">KATEGORI BARANG</label>
            <input type="text" name="KATEGORI_BARANG" id="KATEGORI_BARANG" class="form-control" value="{{$user->KATEGORI_BARANG}}" readonly>
        </div>
        <div class="form-group>
            <label for="FOTO_BARANG" class="form-label">FOTO BARANG</label>
            <img src="{{asset('asset/img/' .$user->FOTO_BARANG)}}" alt="" width='100px'>
        </div>

        <div class="card-footer">
            <a href="/profile" class="btn btn-danger">Cancel</a>
        </div>
</div>
</div>

@endsection