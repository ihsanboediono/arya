@extends('layouts/app')

@section('content')
<form method="post" action="/SK">
    @csrf
    <!-- <div class="mb-3">
        <label for="id_sm" class="form-label">ID</label>
        <input type="text" class="form-control" id="id_sm">
    </div> -->
    <div class="mb-3">
        <label for="tgl_sk" class="form-label"> Tanggal Keluar</label>
        <input type="date" class="form-control" name="tgl_sk" id="tgl_sk" value="{{ Session::get('tgl_sk')}}">
    </div>
    <div class="mb-3">
        <label for="no_sk" class="form-label"> Nomor Surat</label>
        <input type="text" class="form-control" name="no_sk" id="no_sk" value="{{ Session::get('no_sk')}}">
    </div>
    <div class="mb-3">
        <label for="tujuan" class="form-label"> Tujuan </label>
        <input type="text" class="form-control" name="tujuan" id="tujuan" value="{{ Session::get('tujuan')}}">
    </div>
    <div class="mb-3">
        <label for="perihal_sk" class="form-label"> Perihal </label>
        <input type="text" class="form-control" name="perihal_sk" id="perihal_sk" value="{{ Session::get('perihal_sk')}}">
    </div>
    <div class="mb-3">
        <label for="ket_sk" class="form-label"> Keterangan </label>
        <input type="text" class="form-control" name="ket_sk" id="ket_sk" value="{{ Session::get('ket_sk')}}">
    </div>
    <div class="mb-3">
        <label for="file_sk" class="form-label"> File </label>
        <input type="file" class="form-control" name="file_sk" id="file_sk" value="{{ Session::get('file_sk')}}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </div>
</form>


@endsection