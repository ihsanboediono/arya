@extends('layouts/app')

@section('content')
<h4 class="text-center mb-5
"> Kelola Agenda Adam Malik </h4>
<div class="container">
    <div class="row mb-3">
        <form method="post" action="/Event">
            @csrf
            <div class="mb-3">
                <label for="tgl_event" class="form-label"> Tanggal Agenda </label>
                <input type="date" class="form-control" name="tgl_event" value="{{ Session::get('tgl_event')}}">
            </div>
            <div class="mb-3">
                <label for="nama_event" class="form-label"> Nama Agenda </label>
                <input type="text" class="form-control" name="nama_event" value="{{ Session::get('nama_event')}}">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label"> Detail Agenda </label>
                <input type="text" class="form-control" name="detail" value="{{ Session::get('detail')}}">
            </div>
            <button type="submit" class="btn btn-primary"> Ajukan </button>
        </form>
    </div>
    <div class="row">
        <table class="table table-dark table-striped">
            <thead class=" text-primary">
                <tr>
                    <th scope="col"> NO. </th>
                    <th scope="col"> Tanggal Agenda </th>
                    <th scope="col"> Nama Agenda  </th>
                    <th scope="col"> Detail Agenda </th>
                    <th scope="col"> Status </th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class=" text-primary">
                <?php $no = 1 ?>
                @foreach ($data as $item)
                <tr>
                    <td> {{ $no }} </td>
                    <td> {{ $item->tgl_event }} </td>
                    <td> {{ $item-> nama_event }} </td>
                    <td> {{ $item-> detail }} </td>
                    @if ($item->status_event == 0)
                    <td> Belum Disetujui </td>
                    @elseif ($item->status_event == 1)
                    <td> Sudah Disetujui </td>
                    @endif
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ url('/Event/'.$item->id.'/edit' ) }}"> Edit </a>
                        <!-- <a class="btn btn-warning btn-sm" href="{{ url('/SK/'.$item->id_sk.'/delete' ) }}"> Delete </a> -->
                        <!-- //menggunakan method delete, sehingga menggunakan form khusus delete// -->
                        <form onsubmit="return confirm('Are you sure?')" class='d-inline' action="{{ '/Event/'.$item->id_event }}" method="post">
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