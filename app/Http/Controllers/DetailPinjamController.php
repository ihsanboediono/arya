<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use App\Models\Invent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DetailPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = DetailPinjam::orderby('id', 'asc')
            ->where('id_pinjam', $id)
            ->paginate(10);
        $data_barang = Invent::all();
        return view('pinjam/detail', [
            'id_pinjam' => $id,
            'data' => $data,
            'data_barang' => $data_barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pinjam/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            Session::flash('nama_barang', $request->nama_barang);
            Session::flash('jml_barang', $request->jml_barang);

            $request->validate([
                'nama_barang' => 'required',
                'jml_barang' => 'required'
            ], [
                'nama_barang.required' => 'Nama Barang Wajib Diisi',
                'jml_barang.required' => 'Jumlah Barang Wajib Diisi'
            ]);
            $id_pinjam = $request->input('id_pinjam');
            $data = [
                'id_pinjam' => $request->input('id_pinjam'),
                'id_invent' => $request->input('nama_barang'),
                'jml_barang' => $request->input('jml_barang')
            ];
            DetailPinjam::create($data);
            return redirect('DetailPinjam/' . $id_pinjam)->with('success', 'Berhasil Menambahkan Data');
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
        //
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
