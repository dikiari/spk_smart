<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubkriteriaModel extends Model
{
    public static function cek_subkriteria($name)
    {
        return DB::select("SELECT * FROM sub_kriteria WHERE id_subkriteria='".$name."'");
    }

    public static function subkriteria_get($id)
    {
        return DB::table('sub_kriteria')->where('id_subkriteria', $id)->first();
    }
}
