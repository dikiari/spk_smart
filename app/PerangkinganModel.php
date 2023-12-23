<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PerangkinganModel extends Model
{
    protected $table = 'perangkingan';
    protected $primaryKey = 'id_perangkingan';


    public static function hasil_perangkingan($id_karyawan,$id_periode)
    {
        $data['perangkingan'] = DB::table('perangkingan')
                                ->join('periode','periode.id_periode','=','perangkingan.id_periode')
                                ->join('karyawan','karyawan.id_karyawan','=','perangkingan.id_karyawan')
                                ->where('perangkingan.id_karyawan',$id_karyawan)
                                ->where('perangkingan.id_periode',$id_periode)
                                ->first();

        return $data;
    }
}
