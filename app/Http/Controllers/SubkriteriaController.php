<?php

namespace App\Http\Controllers;

use App\SubkriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubkriteriaController extends Controller
{
    public function index()
    {

        $data['subkriteria'] = DB::table('sub_kriteria')
                                    ->join('kriteria','sub_kriteria.id_kriteria','=','kriteria.id_kriteria')
                                    ->orderBy('sub_kriteria.id_kriteria','ASC')->get();
        $data['kriteria'] = DB::table('kriteria')->get();

        $data['karyawan'] = DB::table('karyawan')->get();
        return view('penilaian/subkriteria')->with($data);
    }

    public function cek_subkriteria(Request $request)
    {
        $data = SubkriteriaModel::cek_subkriteria($request['kode_subkriteria']);
        $return_data = ($data)? "duplicate" : "success" ;
        echo $return_data;
    }

    public function subkriteria_doAdd(Request $request)
    { 
        
            try {
                $id = DB::table('sub_kriteria')->insertGetId([
                    'id_kriteria' => $request->id_kriteria, 
                    'nm_subkriteria' => $request->nm_subkriteria, 
                    'bobot_subkriteria' => $request->bobot_subkriteria, 
                ]);  
    
                return redirect()->route('subkriteria.index')->with('status', 'Data Sub Kriteria berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
        
    }

    public function subkriteria_doEdit(Request $request)
    {
          
            try {
                DB::table('sub_kriteria')
                    ->where('id_subkriteria', $request->id_subkriteria)
                    ->update([
                        'id_kriteria' => $request->id_kriteria,  
                        'nm_subkriteria' => $request->nm_subkriteria, 
                        'bobot_subkriteria' => $request->bobot_subkriteria, 
                    ]);
 
    
                return redirect()->route('subkriteria.index')->with('status', 'Data Sub Kriteria berhasil ubah');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
    }

    public function subkriteria_get(Request $request)
    {
        $data = SubkriteriaModel::subkriteria_get($request['id']);
        $detail = DB::table('sub_kriteria')
                    ->where('id_subkriteria', $request['id'])->get();


        $array = array("data" => $data, "detail" => $detail);
        return json_encode($array);
    }


    public function subkriteria_delete($id)
    {
       
        try {
            DB::table('sub_kriteria')->where('id_subkriteria', $id)->delete();  
            return redirect()->route('subkriteria.index')->with('status', 'Data Sub Kriteria berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }
}
