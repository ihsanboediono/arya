<?php

namespace App\Http\Controllers;

use App\Models\Invent;
use App\Models\PinjamInvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PinjamInventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = PinjamInvent::orderby('id', 'asc')->paginate(2);
        $data = PinjamInvent::orderby('id', 'asc')->paginate(2);
        return view('pinjam/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            Session::flash('tgl_pinjam', $request->tgl_pinjam);
            Session::flash('peminjam', $request->peminjam);
            Session::flash('file_pinjam', $request->file_pinjam);

            $request->validate([
                'tgl_pinjam' => 'required',
                'peminjam' => 'required',
                'file_pinjam' => 'required'
            ], [
                'tgl_pinjam.required' => 'Tanggal Pinjam Wajib Diisi',
                'peminjam.required' => 'Peminjam Wajib Diisi',
                'file_pinjam.required' => 'Surat Wajib Diisi'
            ]);

            $file_pinjam = $request->file('file_pinjam');
            $file_pinjam_ekstensi = $file_pinjam->extension();
            $file_pinjam_nama = date('ymdhis') . "." . $file_pinjam_ekstensi;
            $file_pinjam->move(public_path('suratPeminjaman'), $file_pinjam_nama);

            $data = [
                'tgl_pinjam' => $request->input('tgl_pinjam'),
                'peminjam' => $request->input('peminjam'),
                'file_pinjam' => $file_pinjam_nama,
                'status_kembali' => 0
            ];  

            PinjamInvent::create($data);
            return redirect('Pinjam')->with('success', 'Berhasil Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPinjam = PinjamInvent::where('id', $id)->first();
        $detailBarang = PinjamInvent::join('detail_pinjams', 'pinjam_invents.id', '=', 'detail_pinjams.id_pinjam')
            ->join('invent', 'invent.id_invent', '=', 'detail_pinjams.id_invent')
            ->where('detail_pinjams.id_pinjam', $id)
            ->get(['pinjam_invents.*', 'detail_pinjams.*', 'invent.nama_barang']);
        return view('pinjam.show', compact('detailPinjam', 'detailBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
