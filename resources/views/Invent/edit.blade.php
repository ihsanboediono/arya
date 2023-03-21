@extends('layouts/app')

@section('content')
<form method="post" action={{ '/Inventaris/'.$data->id_invent }}>
    @csrf
    @method('PUT')
    <!-- <div class="mb-3">
        <label for="id_sm" class="form-label">ID</label>
        <input type="text" class="form-control" id="id_sm">
    </div> -->
    <a href="/Inventaris" class="btn btn-secondary"> Back </a>
    <div class="mb-3">
        <h1> {{ $data->id_invent }}
    </div>
    <div class="mb-3">
        <label for="nama_barang" class="form-label"> Nama Barang </label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ $data->nama_barang }}">
    </div>
    <div class="mb-3">
        <label for="jml_barang" class="form-label"> Jumlah Barang </label>
        <input type="text" class="form-control" name="jml_barang" id="jml_barang" value="{{ $data->jml_barang }}">
    </div>
    <div class="mb-3">
        <label for="kondisi_barang" class="form-label"> Kondisi Barang </label>
        <input type="text" class="form-control" name="kondisi_barang" id="kondisi_barang" value="{{ $data->kondisi_barang }}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Update </button>
    </div>
</form>


@endsection