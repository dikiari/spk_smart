<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenilaianModel extends Model
{
    public static function cek_penilaian($name)
    {
        return DB::select("SELECT * FROM penilaian WHERE id_penilaian='".$name."'");
    }

    public static function penilaian_get($id)
    {
        return DB::table('penilaian')->where('id_penilaian', $id)->first();
    }

    public static function cari_hasil($id_kriteria,$id_karyawan,$id_periode)
    {
        
         $r = DB::select("SELECT * FROM penilaian p JOIN kriteria k ON k.id_kriteria = p.id_kriteria JOIN sub_kriteria s ON s.id_subkriteria = p.id_subkriteria WHERE p.id_kriteria = '".$id_kriteria."' AND p.id_karyawan = '".$id_karyawan."' AND id_periode= '".(int)$id_periode."'"); 

         return $r;
    }

    public static function cari_hasil_sub($id_kriteria)
    { 
         $r = DB::select("SELECT * FROM sub_kriteria sk JOIN kriteria k ON k.id_kriteria = sk.id_kriteria   WHERE  sk.id_kriteria = '".$id_kriteria."'"); 

         return $r;
    }


    public static function hasil_max($id_kriteria,$id_periode)
    {
         
        $r = DB::select("SELECT max(value_sub) as max FROM penilaian   WHERE id_kriteria = '".$id_kriteria."'  AND id_periode= '".(int)$id_periode."' "); 

        return $r;
    }
    public static function hasil_min($id_kriteria,$id_periode)
    {
         
        $r = DB::select("SELECT min(value_sub) as min FROM penilaian   WHERE id_kriteria = '".$id_kriteria."'  AND id_periode= '".(int)$id_periode."' "); 

        return $r;
    }

}
