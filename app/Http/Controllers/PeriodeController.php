<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PeriodeModel;
use Illuminate\Http\Request; 
use App\ProdukModel;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{

    public function index()
    {

        $data['periode'] = DB::table('periode')->get();
        $data['karyawan'] = DB::table('karyawan')->get();
        return view('penilaian/periode')->with($data);
    }

    public function cek_periode(Request $request)
    {
        $data = PeriodeModel::cek_periode($request['kode_periode']);
        $return_data = ($data)? "duplicate" : "success" ;
        echo $return_data;
    }

    public function periode_doAdd(Request $request)
    { 
        
            try {
                $id = DB::table('periode')->insertGetId([
                    'nm_periode' => $request->nm_periode, 
                ]);
                $last_id =  $id;

                foreach($request->id_karyawan as $v){
                    DB::table('periode_d')->insert([
                        'id_karyawan' => $v, 
                        'id_periode' => $last_id
                    ]);
                }


    
                return redirect()->route('periode.index')->with('status', 'Data Periode berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
        
    }

    public function periode_doEdit(Request $request)
    {
          
            try {
                DB::table('periode')
                    ->where('id_periode', $request->id_periode)
                    ->update([
                        'nm_periode' => $request->nm_periode, 
                    ]);

                DB::table('periode_d')
                    ->where('id_periode', $request->id_periode)
                    ->delete();

                    foreach($request->id_karyawan as $v){
                        DB::table('periode_d')->insert([
                            'id_karyawan' => $v, 
                            'id_periode' => $request->id_periode
                        ]);
                    }
    
                return redirect()->route('periode.index')->with('status', 'Data Periode berhasil ubah');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
    }

    public function periode_get(Request $request)
    {
        $data = PeriodeModel::periode_get($request['id']);
        $detail = DB::table('periode_d')
                    ->where('id_periode', $request['id'])->get();


        $array = array("data" => $data, "detail" => $detail);
        return json_encode($array);
    }


    public function periode_delete($id)
    {
       
        try {
            DB::table('periode')->where('id_periode', $id)->delete(); 
            DB::table('periode_d')->where('id_periode', $id)->delete(); 
            return redirect()->route('periode.index')->with('status', 'Data Periode berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

}
