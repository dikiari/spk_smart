<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\KriteriaModel; 
use Illuminate\Http\Request; 
use App\ProdukModel;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{

    public function index()
    {

        $data['kriteria'] = DB::table('kriteria')->get();
        $data['karyawan'] = DB::table('karyawan')->get();
        return view('penilaian/kriteria')->with($data);
    }

    public function cek_kriteria(Request $request)
    {
        $data = KriteriaModel::cek_kriteria($request['kode_kriteria']);
        $return_data = ($data)? "duplicate" : "success" ;
        echo $return_data;
    }

    public function kriteria_doAdd(Request $request)
    { 
        
            try {
                $id = DB::table('kriteria')->insertGetId([
                    'nm_kriteria' => $request->nm_kriteria, 
                    'bobot_kriteria' => $request->bobot_kriteria, 
                    'tipe_kriteria' => $request->tipe_kriteria, 

                ]);  
    
                return redirect()->route('kriteria.index')->with('status', 'Data Kriteria berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
        
    }

    public function kriteria_doEdit(Request $request)
    {
          
            try {
                DB::table('kriteria')
                    ->where('id_kriteria', $request->id_kriteria)
                    ->update([
                        'nm_kriteria' => $request->nm_kriteria, 
                        'bobot_kriteria' => $request->bobot_kriteria, 
                        'tipe_kriteria' => $request->tipe_kriteria, 
                    ]);
 
    
                return redirect()->route('kriteria.index')->with('status', 'Data Kriteria berhasil ubah');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
    }

    public function kriteria_get(Request $request)
    {
        $data = KriteriaModel::kriteria_get($request['id']);
        $detail = DB::table('kriteria')
                    ->where('id_kriteria', $request['id'])->get();


        $array = array("data" => $data, "detail" => $detail);
        return json_encode($array);
    }


    public function kriteria_delete($id)
    {
       
        try {
            DB::table('kriteria')->where('id_kriteria', $id)->delete();  
            return redirect()->route('kriteria.index')->with('status', 'Data Kriteria berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

}

