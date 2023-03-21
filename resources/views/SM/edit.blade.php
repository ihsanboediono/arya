@extends('layouts/app')

@section('content')
<form method="post" action={{ '/SM/'.$data->id_sm }}>
    @csrf
    @method('PUT')
    <!-- <div class="mb-3">
        <label for="id_sm" class="form-label">ID</label>
        <input type="text" class="form-control" id="id_sm">
    </div> -->
    <a href="/SM" class="btn btn-secondary"> Back </a>
    <div class="mb-3">
        <h1> {{ $data->id_sm }}
    </div>
    <div class="mb-3">
        <label for="tgl_sm" class="form-label"> Tanggal Masuk</label>
        <input type="date" class="form-control" name="tgl_sm" id="tgl_sm" value="{{ $data->tgl_sm }}">
    </div>
    <div class="mb-3">
        <label for="no_sm" class="form-label"> Nomor Surat</label>
        <input type="text" class="form-control" name="no_sm" id="no_sm" value="{{ $data->no_sm }}">
    </div>
    <div class="mb-3">
        <label for="pengirim" class="form-label"> Pengirim </label>
        <input type="text" class="form-control" name="pengirim" id="pengirim" value="{{ $data->pengirim }}">
    </div>
    <div class="mb-3">
        <label for="perihal" class="form-label"> Perihal </label>
        <input type="text" class="form-control" name="perihal" id="perihal" value="{{ $data->perihal }}">
    </div>
    <div class="mb-3">
        <label for="ket_sm" class="form-label"> Keterangan </label>
        <input type="text" class="form-control" name="ket_sm" id="ket_sm" value="{{ $data->ket_sm }}">
    </div>
    <div class="mb-3">
        <label for="file_sm" class="form-label"> File </label>
        <input type="file" class="form-control" name="file_sm" id="file_sm" value="{{ $data->file_sm }}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Update </button>
    </div>
</form>


@endsection