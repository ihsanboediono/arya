@extends('layouts/app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">Surat Keluar</h4>
                </div>
                <div class="col-2 text-right">
                    <a href=" SK/create " class="btn btn-sm btn-primary">Add Surat Keluar </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table class="table table-dark table-striped">
                <thead class=" text-primary">
                    <tr>
                        <th scope="col"> NO. </th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Nomor Keluar</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">File</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class=" text-primary">
                    <?php $no = 1 ?>
                    @foreach ($data as $item)
                    <tr>
                        <td> {{ $no }} </td>
                        <td> {{ $item->tgl_sk}} </td>
                        <td> {{ $item->no_sk }} </td>
                        <td> {{ $item->tujuan }} </td>
                        <td> {{ $item->perihal_sk }} </td>
                        <td> {{ $item->ket_sk }} </td>
                        <td> {{ $item->file_sk }} </td>
                        <td>
                            <!-- <button> <a href='{{ url('/SK/edit/'.$item->id_sk) }}'> Edit </a> </button>
                            <button> Delete </button> -->
                            <a class="btn btn-secondary btn-sm" href="{{ url('/SK/'.$item->id_sk.'/edit' ) }}"> Edit </a>
                            <!-- <a class="btn btn-warning btn-sm" href="{{ url('/SK/'.$item->id_sk.'/delete' ) }}"> Delete </a> -->
                            <!-- //menggunakan method delete, sehingga menggunakan form khusus delete// -->
                            <form onsubmit="return confirm('Are you sure?')" class='d-inline' action="{{ '/SK/'.$item->id_sk }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"> Delete </button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $data->links() }}
    @endsection