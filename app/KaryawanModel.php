<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class KaryawanModel extends Model
{
    public static function cek_karyawan($id)
    {
        return DB::select("SELECT * FROM karyawan WHERE id_karyawan='".$id."'");
    }

    public static function karyawan_get($id)
    {
        return DB::table('karyawan')->where('id_karyawan', $id)->first();
    }

}
