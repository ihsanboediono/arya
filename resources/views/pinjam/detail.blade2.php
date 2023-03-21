@extends('layouts/app')

@section('content')
<h4 class="text-center mb-5"> Detail Peminjaman Inventaris</h4>
<div class="container">
    <a href="/Pinjam" class="btn btn-secondary"> Back </a>
    <div class="row mb-3">
        <form method="post" action="{{ url('DetailPinjam/store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_pinjam" class="form-label"> Id pinjam </label>
                <input type="text" class="form-control" value="{{ $id_pinjam }}" disabled>
                <input type="hidden" class="form-control" name="id_pinjam" value="{{ $id_pinjam }}">
            </div>
            <div class="mb-3">
                <label for="id_invent" class="form-label"> Nama Barang </label>
                <select class="form-select" aria-label="Default select example" name="nama_barang">
                    <option selected value="">Pilih barang</option>
                    @foreach ($data_barang as $barang)
                    <option value="{{ $barang->id_invent }}"> {{ $barang->nama_barang }} </option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="jml_barang" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" name="jml_barang" value="{{ Session::get('jml_barang')}}">
            </div>
            <button type="submit" class="btn btn-primary"> Pinjam </button>
        </form>
    </div>
    <div class="row">
        <table class="table table-dark table-striped">
            <thead class=" text-primary">
                <tr>
                    <th scope="col"> NO. </th>
                    <th scope="col"> Nama Barang</th>
                    <th scope="col"> Jumlah Barang </th>
                    <th scope="col"> Aksi</th>
                </tr>
            </thead>
            <tbody class=" text-primary">
                <?php $no = 1 ?>
                @foreach ($data as $item)
                <tr>
                    <td> {{ $no }} </td>
                    <td> {{ $item-> id_invent }} </td>
                    <td> {{ $item-> jml_barang }} </td>
                    <td>

                        <a class="btn btn-warning btn-sm" href="{{ url('/DetailPinjam/'.$item->id.'/edit' ) }}"> Edit </a>
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

<!-- Detail Barang yg dipinjam
    <table>
        <tr>
            <th>NO.</th>
            <th>Nama barang</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($data as $data)
        <tr>
            <td>#</td>
            <td>{{ $data->nama_barang }}</td>
            <td>{{ $data->jml_barang }}</td>
        </tr>
        @endforeach
    </table> -->