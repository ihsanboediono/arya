<?php

namespace App\Http\Controllers;

use App\Models\sk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = sk::orderby('id_sk', 'asc')->paginate(2);
        return view('SK/index')->with('data', $data);
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SK/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('tgl_sk', $request->tgl_sk);
        Session::flash('no_sk', $request->no_sk);
        Session::flash('tujuan', $request->tujuan);
        Session::flash('perihal_sk', $request->perihal_sk);
        Session::flash('ket_sk', $request->ket_sk);
        Session::flash('file_sk', $request->file_sk);

        $request->validate([
            'tgl_sk' => 'required',
            'no_sk' => 'required',
            'tujuan' => 'required',
            'perihal_sk' => 'required',
            'ket_sk' => 'required',
            'file_sk' => 'required'
        ], [
            'tgl_sk.required' => 'Tanggal Masuk Wajib Diisi',
            'no_sk.required' => 'nomor Surat Wajib Diisi',
            'tujuan.required' => 'tujuan Surat Wajib Diisi',
            'perihal_sk.required' => 'Perihal Wajib Diisi',
            'ket_sk.required' => 'Keterangan Wajib Diisi',
            'file_sk.required' => 'File Wajib Diisi',
        ]);
        $data = [
            'tgl_sk' => $request->input('tgl_sk'),
            'no_sk' => $request->input('no_sk'),
            'tujuan' => $request->input('tujuan'),
            'perihal_sk' => $request->input('perihal_sk'),
            'ket_sk' => $request->input('ket_sk'),
            'file_sk' => $request->input('file_sk'),
        ];
        sk::create($data);
        return redirect('SK')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = sk::where('id_sk', $id)->first();
        return view('SK/edit')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = sk::where('id_sk', $id)->first();
        return view('/SK/edit')->with('data', $data);
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
            'tgl_sk' => 'required',
            'no_sk' => 'required',
            'tujuan' => 'required',
            'perihal_sk' => 'required',
            'ket_sk' => 'required',
            'file_sk' => 'required'
        ], [
            'tgl_sk.required' => 'Tanggal Masuk Wajib Diisi',
            'no_sk.required' => 'nomor Surat Wajib Diisi',
            'tujuan.required' => 'tujuan Surat Wajib Diisi',
            'perihal_sk.required' => 'Perihal Wajib Diisi',
            'ket_sk.required' => 'Keterangan Wajib Diisi',
            'file_sk.required' => 'File Wajib Diisi',
        ]);
        $data = [
            'tgl_sk' => $request->input('tgl_sk'),
            'no_sk' => $request->input('no_sk'),
            'tujuan' => $request->input('tujuan'),
            'perihal_sk' => $request->input('perihal_sk'),
            'ket_sk' => $request->input('ket_sk'),
            'file_sk' => $request->input('file_sk'),
        ];
        SK::where('id_sk', $id)->update($data);
        return redirect('/SK')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SK::where('id_sk', $id)->delete();
        return redirect("/SK")->with('success', 'Berhasil delete data');
    }
}
