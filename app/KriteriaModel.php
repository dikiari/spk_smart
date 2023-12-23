<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class KriteriaModel extends Model
{
    protected $table = 'periode_d';
    protected $primaryKey = 'id_periode_d';
    public static function cek_kriteria($id)
    {
        return DB::select("SELECT * FROM kriteria WHERE id_kriteria='".$id."'");
    }

    public static function kriteria_get($id)
    {
        return DB::table('kriteria')->where('id_kriteria', $id)->first();
    }

    
}
