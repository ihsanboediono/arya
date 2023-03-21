<?php

namespace App\Http\Controllers;

use App\Models\Invent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invent::orderby('id_invent', 'asc')->paginate(10);
        return view('Invent/index')->with('data', $data);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Invent/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_barang', $request->nama_barang);
        Session::flash('jml_barang', $request->jml_barang);
        Session::flash('kondisi_barang', $request->kondisi_barang);

        $request->validate([
            'nama_barang' => 'required',
            'jml_barang' => 'required',
            'kondisi_barang' => 'required'
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'jml_barang.required' => 'Nomor Surat Wajib Diisi',
            'kondisi_barang.required' => 'Kondisi Barang Surat Wajib Diisi'
        ]);
        $data = [
            'nama_barang' => $request->input('nama_barang'),
            'jml_barang' => $request->input('jml_barang'),
            'kondisi_barang' => $request->input('kondisi_barang')
        ];
        Invent::create($data);
        return redirect('Inventaris')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Invent::where('id_invent', $id)->first();
        return view('Invent/edit')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Invent::where('id_invent', $id)->first();
        return view('/Invent/edit')->with('data', $data);
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
        $request->validate([
            'nama_barang' => 'required',
            'jml_barang' => 'required',
            'kondisi_barang' => 'required'
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'jml_barang.required' => 'Nomor Surat Wajib Diisi',
            'kondisi_barang.required' => 'Kondisi Barang Surat Wajib Diisi'
        ]);
        $data = [
            'nama_barang' => $request->input('nama_barang'),
            'jml_barang' => $request->input('jml_barang'),
            'kondisi_barang' => $request->input('kondisi_barang'),
        ];
        Invent::where('id_invent', $id)->update($data);
        return redirect('/Inventaris')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invent::where('id_invent', $id)->delete();
        return redirect("/Inventaris")->with('success', 'Berhasil delete data');
    }
}
