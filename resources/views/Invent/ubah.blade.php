@extends('layouts/app')

@section('content')
<div class="">
    <table class="table">
        <thead class=" text-primary">
            <tr>
                <th scope="col">id_invent</th> {{ $data->id_invent }}
                <th scope="col">nama_barang</th> {{ $data->nama_barang }}
                <th scope="col">jml_barang</th> {{ $data->jml_barang }}
                <th scope="col">kondisi_barang</th> {{ $data->kondisi_barang }}
                <th scope="col">Aksi</th>
            </tr>
        </thead>
    </table>
</div>
<a href="/inventaris"> Back </a>
@endsection