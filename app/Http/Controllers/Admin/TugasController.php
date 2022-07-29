<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\kategori;
use App\Task;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Tugas';
        $data=Task::all();
        return view('admin.tugas.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_kategori=kategori::all();
        $pagename  = 'Data Tugas';
        return view('admin.tugas.create', compact('pagename','data_kategori'));
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
            'nama_tugas'=>'required',
            'id_kategori'=>'required',
            'ket_tugas'=>'required',
            'status_tugas'=>'required',
        ]);

        $data_tugas = new Task([
            'nama_tugas'=>$request->get('nama_tugas'),
            'id_kategori'=>$request->get('id_kategori'),
            'ket_tugas'=>$request->get('ket_tugas'),
            'status_tugas'=>$request->get('status_tugas'),
        ]);

        $data_tugas->save();
        return redirect('admin/tugas')->with('success', 'tugas berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_kategori = kategori::all();
        $pagename = 'Update Tugas';
        $data = Task::find($id);
        return view('admin.tugas.edit', compact('data_kategori', 'data', 'pagename'));
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
            'nama_tugas'=>'required',
            'id_kategori'=>'required',
            'ket_tugas'=>'required',
            'status_tugas'=>'required',
        ]);

        $tugas=Task::find($id);

        $tugas->nama_tugas = $request->get('nama_tugas');
        $tugas->id_kategori=$request->get('id_kategori');
        $tugas->ket_tugas=$request->get('ket_tugas');
        $tugas->status_tugas=$request->get('status_tugas');


        $tugas->save();
        return redirect('admin/tugas')->with('success', 'tugas berhasil di update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Task::find($id);
        $tugas->delete();
        return redirect('admin/tugas')->with('success', 'tugas berhasil di hapus');
    }
}
