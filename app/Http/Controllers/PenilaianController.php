<?php

namespace App\Http\Controllers;

use App\PenilaianModel;
use App\PeriodeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {

        $data['penilaian'] = DB::table('penilaian')
                                    ->join('kriteria','penilaian.id_kriteria','=','kriteria.id_kriteria')
                                    ->orderBy('penilaian.id_kriteria','ASC')->get();
        $data['periode'] = DB::table('periode')->get();

        $data['karyawan'] = DB::table('karyawan')->get();
        return view('penilaian/penilaian')->with($data);
    }

    public function isi_data($id_periode)
    {

        $data['penilaian'] = DB::table('penilaian')
                                    ->join('kriteria','penilaian.id_kriteria','=','kriteria.id_kriteria')
                                    ->orderBy('penilaian.id_kriteria','ASC')->get();
        $data['periode'] = DB::table('periode')->get();  
    

        $data['data_periode'] = DB::table('periode')->where('id_periode',$id_periode)->get();
        $data['kriteria'] = DB::table('kriteria')->get();
        $data['sub_kriteria'] = DB::table('sub_kriteria')->get();
        $data['karyawan'] = DB::select(DB::raw("SELECT * FROM periode_d p JOIN karyawan k ON k.id_karyawan = p.id_karyawan WHERE id_periode = '".$id_periode."'" ));
        

        return view('penilaian/isi_data')->with($data);
    }

    public function hasil($id_periode)
    {

        $data['penilaian'] = DB::table('penilaian')
                                    ->join('kriteria','penilaian.id_kriteria','=','kriteria.id_kriteria')
                                    ->orderBy('penilaian.id_kriteria','ASC')->get();
        $data['periode'] = DB::table('periode')->get();  
    

        $data['data_periode'] = DB::table('periode')->where('id_periode',$id_periode)->get();
        $data['kriteria'] = DB::table('kriteria')->get();
        $data['sub_kriteria'] = DB::table('sub_kriteria')->get();
        $data['karyawan'] = DB::select(DB::raw("SELECT * FROM periode_d p JOIN karyawan k ON k.id_karyawan = p.id_karyawan WHERE id_periode = '".$id_periode."'" ));  

        return view('penilaian/hasil')->with($data);
    }

    public function cek_penilaian(Request $request)
    {
        $data = PenilaianModel::cek_penilaian($request['kode_penilaian']);
        $return_data = ($data)? "duplicate" : "success" ;
        echo $return_data;
    }

    public function penilaian_doAdd(Request $request)
    { 
        
            try {
                $id = DB::table('penilaian')->insertGetId([
                    'id_kriteria' => $request->id_kriteria, 
                    'nm_penilaian' => $request->nm_penilaian, 
                    'bobot_penilaian' => $request->bobot_penilaian, 
                ]);  
    
                return redirect()->route('penilaian.index')->with('status', 'Data Sub Kriteria berhasil ditambahkan');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
        
    }

    public function penilaian_doEdit(Request $request)
    {
          
            try {
                DB::table('penilaian')
                    ->where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'id_kriteria' => $request->id_kriteria,  
                        'nm_penilaian' => $request->nm_penilaian, 
                        'bobot_penilaian' => $request->bobot_penilaian, 
                    ]);
 
    
                return redirect()->route('penilaian.index')->with('status', 'Data Sub Kriteria berhasil ubah');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        
    }

    public function penilaian_get(Request $request)
    {
        $data = PenilaianModel::penilaian_get($request['id']);
        $detail = DB::table('penilaian')
                    ->where('id_penilaian', $request['id'])->get();


        $array = array("data" => $data, "detail" => $detail);
        return json_encode($array);
    }


    public function penilaian_delete($id)
    {
       
        try {
            DB::table('penilaian')->where('id_penilaian', $id)->delete();  
            return redirect()->route('penilaian.index')->with('status', 'Data Sub Kriteria berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    public function reset_data(Request $request)
    {
       
        try {
            DB::table('penilaian')
                    ->where('id_periode', $request->id_periode)
                    ->where('id_karyawan', $request->id_karyawan)
                    ->delete();  

            echo json_encode('success');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }


    public function simpan_val(Request $request)
    {
       

        foreach($request->id_kriteria as $key => $value){ 
            $bobot = DB::table('sub_kriteria')
                        ->where('id_subkriteria', $request->val[$key])->first();
            $data = array(
                'id_periode' => $request->id_periode,
                'id_karyawan' => $request->id_karyawan,
                'id_kriteria' => $request->id_kriteria[$key],
                'id_subkriteria' => $request->val[$key],
                'value_sub' => $bobot->bobot_subkriteria, 
            );

            $id = DB::table('penilaian')->insertGetId($data);  
        } 

        return redirect()->route('penilaian.isi_data',$request->id_periode)->with('status', 'Data berhasil disimpan');


    }  

    public function cek_duplikat(Request $request)
    {
     
       $exist =  DB::table('penilaian')
            ->where('id_periode', $request->id_periode)
            ->where('id_karyawan', $request->id_karyawan)->count();
        
        echo $exist; 

    }

    public function perangkingan()
    {
        $data['periode'] = DB::table('periode')->get(); 
        return view('penilaian/perangkingan')->with($data);
    }
    public function perangkingan_hasil($id_periode)
    {
        $data['perangkingan'] = DB::table('perangkingan') 
                                    ->join('karyawan','karyawan.id_karyawan','=','perangkingan.id_karyawan')
                                    ->where('id_periode', $id_periode)
                                    ->orderBy('perangkingan.total_score','DESC')
                                    ->get();

        $data['periode'] = DB::table('periode') 
                                    ->where('id_periode', $id_periode)
                                    ->first();
 
        return view('penilaian/perangkingan_hasil')->with($data);
    }

}
