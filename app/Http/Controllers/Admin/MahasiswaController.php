<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Data Mahasiswa';
        $data=Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename  = 'Data Mahasiswa';
        return view('admin.mahasiswa.create', compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'address'=>'required',
        ]);

        $data_mahasiswa = new Mahasiswa([
            'username'=>$request->get('username'),
            'address'=>$request->get('address'),
        ]);

        $data_mahasiswa->save();
        return redirect('admin/mahasiswa')->with('success', 'tugas berhasil di simpan');
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
        $pagename = 'Update Mahasiswa';
        $data = Mahasiswa::find($id);
        return view('admin.mahasiswa.edit', compact('data', 'pagename'));
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
            'username'=>'required',
            'address'=>'required',
        ]);

        $tugas=Mahasiswa::find($id);

        $tugas->username = $request->get('username');
        $tugas->address=$request->get('address');


        $tugas->save();
        return redirect('admin/mahasiswa')->with('success', 'mahasiswa berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Mahasiswa::find($id);
        $tugas->delete();
        return redirect('admin/mahasiswa')->with('success', 'tugas berhasil di hapus');
    }
}
