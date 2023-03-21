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
                            <h6 class="text-white text-capitalize ps-3"> Surat Masuk </h6>
                            <div class="col-2 text-right">
                                <a href=" SM/create " class="btn btn-sm btn-info">Add Surat Masuk </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <!-- <table class="table table-dark table-striped"> -->
                                <thead class=" text-primary">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Pengirim</th>
                                        <th scope="col">Perihal</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">File</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class=" text-primary">
                                    @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $item->id_sm }} </td>
                                        <td> {{ $item->tgl_sm}} </td>
                                        <td> {{ $item->no_sm }} </td>
                                        <td> {{ $item->pengirim }} </td>
                                        <td> {{ $item->perihal }} </td>
                                        <td> {{ $item->ket_sm }} </td>
                                        <td> {{ $item->file_sm }} </td>
                                        <td>
                                            <!-- <button> <a href='{{ url('/SM/edit/'.$item->id_sm) }}'> Edit </a> </button>
                            <button> Delete </button> -->
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/SM/'.$item->id_sm.'/edit' ) }}"> Edit </a>
                                            <form onsubmit="return confirm('Are you sure?')" class='d-inline' action="{{ '/SM/'.$item->id_sm }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $data->links() }}
</div>
@endsection