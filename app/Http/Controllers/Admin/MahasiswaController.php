<?php

namespace App\Http\Controllers\API\Mahasiswa;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;
use Exception;

class MahasiswaController extends Controller
{
    public function index(){
        $data = Mahasiswa::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request){
        try {
            $request->validate([
                'nama_mahasiswa' => 'required',
                'nim' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
            ]);

            $mahasiswa = Mahasiswa::create([
                'nama_mahasiswa' => $request->nama_mahaiswa,
                'nim' => $request->nim,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update(Request $request, $id){
        try {
            $request->validate([
                'nama_mahasiswa' => 'required',
                'nim' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
            ]);

            $mahasiswa = Mahasiswa::findOrFail($id);

            $mahasiswa->update([
                'nama_mahasiswa' => $request->nama_mahaiswa,
                'nim' => $request->nim,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function destroy($id){
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);

            $data = $mahasiswa->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destory data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
