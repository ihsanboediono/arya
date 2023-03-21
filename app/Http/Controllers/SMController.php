<?php

namespace App\Http\Controllers;

use App\Models\sm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index() //menampilkan semua data
    {
        $data = sm::orderby('id_sm', 'asc')->paginate(10);
        return view('SM.index')->with('data', $data);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //menampilkan form membuat data
    {
        return view('SM.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //menyimpan data yang dimasukkan
    {
        Validator::make(
            $request->all(),
            [
                'tgl_sm' => 'required',
                'no_sm' => 'required',
                'pengirim' => 'required',
                'perihal' => 'required',
                'ket_sm' => 'required',
                'file_sm' => 'required|mimes:pdf,docx,doc'
            ],
            [
                'tgl_sm' => 'Tanggal Masuk Wajib Diisi',
                'no_sm' => 'nomor Surat Wajib Diisi',
                'pengirim' => 'Pengirim Surat Wajib Diisi',
                'perihal' => 'Perihal Wajib Diisi',
                'ket_sm' => 'Keterangan Wajib Diisi',
                'file_sm.required' => 'File Wajib Diisi',
                'file_sm.mimes' => 'Foto hanya diperbolehkan berekstensi DOC,DOCX,PDF'
            ],
        )->validate();
        

        // $file_sm_file = $request->file('file_sm');
        // $file_sm_ekstensi = $file_sm_file->extension();
        // $file_sm_nama = date('ymdhis') . "." . $file_sm_ekstensi;
        // $file_sm_file->move(public_path('suratMasuk'), $file_sm_nama);
        
        $data = [
            'tgl_sm' => $request->input('tgl_sm'),
            'no_sm' => $request->input('no_sm'),
            'pengirim' => $request->input('pengirim'),
            'perihal' => $request->input('perihal'),
            'ket_sm' => $request->input('ket_sm'),
            // 'file_sm' => $file_sm_nama
            // 'file_sm' => $request->file('file_sm')->store('suratMasuk')
        ];

        // dd($data);
        $data['file_sm'] = $request->file('file_sm')->storeAs('suratMasuk', $request->file('file_sm')->getClientOriginalName());
        sm::create($data);
        return redirect('SM')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //detail data
    {
        $data = sm::where('id_sm', $id)->first();
        return view('SM/edit')->with('data', $data);
        // return view('Invent/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //edit data
    {
        $data = sm::where('id_sm', $id)->first();
        return view('/SM/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //menyumpan data yang di update
    {
        $request->validate([
            'tgl_sm' => 'required',
            'no_sm' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'ket_sm' => 'required',
            'file_sm' => 'required'
        ], [
            'tgl_sm.required' => 'Tanggal Masuk Wajib Diisi',
            'no_sm.required' => 'nomor Surat Wajib Diisi',
            'pengirim.required' => 'Pengirim Surat Wajib Diisi',
            'perihal.required' => 'Perihal Wajib Diisi',
            'ket_sm.required' => 'Keterangan Wajib Diisi',
            'file_sm.required' => 'File Wajib Diisi',
        ]);
        $data = [
            'tgl_sm' => $request->input('tgl_sm'),
            'no_sm' => $request->input('no_sm'),
            'pengirim' => $request->input('pengirim'),
            'perihal' => $request->input('perihal'),
            'ket_sm' => $request->input('ket_sm'),
            'file_sm' => $request->input('file_sm'),
        ];

        sm::where('id_sm', $id)->update($data);
        return redirect('/SM')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //hapus data
    {
        sm::where('id_sm', $id)->delete();
        return redirect("/SM")->with('success', 'Berhasil delete data');
    }
}
