<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Detail Peminjaman
    <table>
        <tr>
            <th> NO. </th>
            <th>Tanggal Pinjam</th>
            <th>Peminjam</th>
            <th>Surat Peminjaman</th>
        </tr>
        <tr>
            <td>#</td>
            <td>{{ $detailPinjam->tgl_pinjam }}</td>
            <td>{{ $detailPinjam->peminjam }}</td>
            <td>
                <iframe src="/suratPeminjaman/{{ $detailPinjam->file_pinjam }}" width="300" height="400"></iframe>
            </td>
        </tr>
    </table>
    <hr>
    Detail Barang yg dipinjam
    <table>
        <tr>
            <th>NO.</th>
            <th>Nama barang</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($detailBarang as $data)
        <tr>
            <td>#</td>
            <td>{{ $data->nama_barang }}</td>
            <td>{{ $data->jml_barang }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>