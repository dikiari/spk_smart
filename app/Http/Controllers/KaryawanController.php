<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\KriteriaModel; 
use Illuminate\Http\Request; 
use App\KaryawanModel;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{

    public function index()
    {

        $data['karyawan'] = DB::table('karyawan')->get(); 
        return view('penilaian/karyawan')->with($data);
    }

    public function cek_karyawan(Request $request)
    {
        $data = KaryawanModel::cek_karyawan($request['id_karyawan']);
        $return_data = ($data)? "duplicate" : "success" ;
        echo $return_data;
    }

    public function karyawan_doAdd(Request $request)
    { 
        
            try {
                $id = DB::table('karyawan')->insertGetId([
                    'nm_karyawan' => $request->nm_karyawan, 
                    'nik' => $request->nik, 

                ]);  
    
                return redirect()->route('karyawan.index')->with('status', 'Data Kriteria berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
        
    }

    public function karyawan_doEdit(Request $request)
    {
          
            try {
                DB::table('karyawan')
                    ->where('id_karyawan', $request->id_karyawan)
                    ->update([
                        'nm_karyawan' => $request->nm_karyawan, 
                        'nik' => $request->nik, 

                    ]);
 
    
                return redirect()->route('karyawan.index')->with('status', 'Data Kriteria berhasil ubah');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
    }

    public function karyawan_get(Request $request)
    {
        $data = KaryawanModel::karyawan_get($request['id']);
        $detail = DB::table('karyawan')
                    ->where('id_karyawan', $request['id'])->get();


        $array = array("data" => $data, "detail" => $detail);
        return json_encode($array);
    }


    public function karyawan_delete($id)
    {
       
        try {
            DB::table('karyawan')->where('id_karyawan', $id)->delete();  
            return redirect()->route('karyawan.index')->with('status', 'Data Kriteria berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

}

