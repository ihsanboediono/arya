@extends('layouts/app')

@section('content')
<div class="col-md-12">
    <!-- <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">Surat Masuk</h4>
                </div>
                <div class="col-2 text-right">
                    <a href=" SM/create " class="btn btn-sm btn-primary">Add Surat Masuk </a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="card-body">
        <div class=""> -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3"> Tambah Surat Masuk </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form method="post" action="{{ route('SM.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="mb-3">
                                <label for="id_sm" class="form-label">ID</label>
                                <input type="text" class="form-control" id="id_sm">
                            </div> -->
                            <div class="form-group mb-3">
                                <label for="tgl_sm" class="form-label"> Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tgl_sm" id="tgl_sm" value="{{ old('tgl_sm') }}">
                                @error('tgl_sm') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_sm" class="form-label"> Nomor Surat</label>
                                <input type="text" class="form-control" name="no_sm" id="no_sm" value="{{ old('no_sm') }}">
                                @error('no_sm') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="pengirim" class="form-label"> Pengirim </label>
                                <input type="text" class="form-control" name="pengirim" id="pengirim" value="{{ old('pengirim') }}">
                                @error('pengirim') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="perihal" class="form-label"> Perihal </label>
                                <input type="text" class="form-control" name="perihal" id="perihal" value="{{ old('perihal') }}">
                                @error('perihal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="ket_sm" class="form-label"> Keterangan </label>
                                <input type="text" class="form-control" name="ket_sm" id="ket_sm" value="{{ old('ket_sm') }}">
                                @error('ket_sm') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="file_sm" class="form-label"> File </label>
                                <input type="file" class="form-control" name="file_sm" id="file_sm">
                                @error('file_sm') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary"> Simpan </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection