@extends('layouts/app')

@section('content')
<div class="container-fluid py-4 px-3">
    <h4 class="mb-3">Peminjaman Inventaris</h4>
    <div class="container">
        <div class="row mb-3">
            <form method="post" action="/Pinjam" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Tanggal Pinjam</label>
                    <div class="input-group input-group-outline mb-3">
                        <input type="date" class="form-control" name="tgl_pinjam" value="{{ Session::get('tgl_pinjam')}}" placeholder="">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Peminjam</label>
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" class="form-control" name="peminjam" value="{{ Session::get('Peminjam')}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Surat Peminjaman</label>
                    <div class="input-group input-group-outline mb-3">
                        <input type="file" class="form-control" name="file_pinjam" value="{{ Session::get('file_pinjam')}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Pinjam </button>
            </form>
        </div>
        <div class="row">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pinjam</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Peminjam</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Kembali</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach ($data as $item)
                            <tr>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->tgl_pinjam }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $item-> peminjam }} </p>
                                </td>
                                @if ($item->status_kembali == 0)
                                <td>
                                    <span class="badge badge-sm bg-gradient-secondary">Belum Dikembalikan</span>
                                </td>
                                @elseif ($item->status_kembali == 1)
                                <td>
                                    <span class="badge badge-sm bg-gradient-success">Sudah Dikembalikan</span>
                                </td>
                                @endif
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('Pinjam.show', $item->id) }}"> Detail </a>
                                    <a class="btn btn-warning btn-sm" href="{{ url('/Pinjam/'.$item->id.'/edit' ) }}"> Edit </a>
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
        </div>
    </div>
</div>
{{ $data->links() }}
@endsection