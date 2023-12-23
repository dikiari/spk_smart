<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PeriodeModel extends Model
{
    public static function cek_periode($name)
    {
        return DB::select("SELECT * FROM periode WHERE id_periode='".$name."'");
    }

    public static function periode_get($id)
    {
        return DB::table('periode')->where('id_periode', $id)->first();
    }

 
}
