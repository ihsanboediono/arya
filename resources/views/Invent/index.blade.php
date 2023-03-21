@extends('layouts/app')

@section('content')
<!-- {{ json_encode($data) }} -->
<div class="col-md-10">
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">Data Inventaris</h4>
                </div>
                <div class="col-2 text-right">
                    <a href=" Inventaris/create " class="btn btn-sm btn-primary">Add Inventaris</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            <table class="table table-dark table-striped">
                <thead class=" text-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Kondisi Barang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class=" text-primary">
                    <?php $no = 1 ?>
                    @foreach ($data as $item)
                    <tr>
                        <td> {{ $no }} </td>
                        <td> {{ $item->nama_barang }} </td>
                        <td> {{ $item->jml_barang }} </td>
                        <td> {{ $item->kondisi_barang }} </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{{ url('/Inventaris/'.$item->id_invent.'/edit' ) }}"> Edit </a>
                            <form onsubmit="return confirm('Are you sure?')" class='d-inline' action="{{ '/Inventaris/'.$item->id_invent }}" method="post">
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