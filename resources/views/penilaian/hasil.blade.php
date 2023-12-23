@extends('layouts.master')


@section('content')
<style>
    .thumb{
        margin: 10px 5px 0 0;
        width: 100px;
        padding-left: 2px;
    } 
</style>
@php
        $delete = \App\HasilModel::where('id_periode','=',request()->segment(3))->delete();  
        $delete = \App\PerangkinganModel::where('id_periode','=',request()->segment(3))->delete();  
@endphp
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Perhitungan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
 
 
<div class="content">
    <div class="container-fluid">
        <div class="row">  
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-left">
                            <div class="btn-group mt-3">
                                Nilai Alternatif 
                            </div>
                        </div>
                    </div>
                    <div class='box-body pad'>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="subkriteria-table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>  
                                            <th>Karyawan</th>
                                        <?php  
                                        foreach($kriteria as $r){
                                            ?>
                                            <th><?php echo $r->nm_kriteria;?></th> 
                                        <?php }
                                        ?>
                                        </tr>   
                                    </thead>
                                    <tbody> <?php
                                        foreach($karyawan as $k){
                                            ?>  
                                                <tr> 
                                                    <td><?= $k->nm_karyawan;?></td>
                                                     <?php
                                                        foreach($kriteria as $r){  
                                                           
                                                            $hasil = \App\PenilaianModel::cari_hasil($r->id_kriteria,$k->id_karyawan,request()->segment(3));  
                                                             
                                                            echo '<td>'.$hasil[0]->value_sub.'</td>'; 
                                                        } ?> 
                                                    </td>  
                                                </tr>
                                            <?php } ?>
                                   
                                    </tbody> 
                                </table>
                               
    
                            </div>
                        </div>
                    </div> 
                    </div>
                    </div> 

            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-left">
                            <div class="btn-group mt-3">
                                Nilai Utility 
                            </div>
                        </div>
                    </div>
                    <div class='box-body pad'>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="subkriteria-table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>  
                                            <th>Karyawan</th>
                                        <?php  
                                        foreach($kriteria as $r){
                                            ?>
                                            <th><?php echo $r->nm_kriteria;?></th> 
                                        <?php }
                                        ?>
                                        </tr>   
                                    </thead>
                                    <tbody> <?php
                                        foreach($karyawan as $k){
                                            ?>  
                                                <tr> 
                                                    <td><?= $k->nm_karyawan;?></td>
                                                     <?php
                                                        $total_score=0;
                                                        foreach($kriteria as $krit){  
                                                            $hasil_k = \App\PenilaianModel::cari_hasil($krit->id_kriteria,$k->id_karyawan,request()->segment(3));  
                                                            
                                                            $hasil_max = \App\PenilaianModel::hasil_max($krit->id_kriteria,request()->segment(3));  
                                                            $hasil_min = \App\PenilaianModel::hasil_min($krit->id_kriteria,request()->segment(3));  
                                                            
                                                            if($krit->tipe_kriteria == 'benefit'){
                                                                $a= (float)$hasil_k[0]->value_sub - (float)$hasil_min[0]->min;
                                                                $b= (float)$hasil_max[0]->max - (float)$hasil_min[0]->min;
                                                            }else{
                                                                $a= (float)$hasil_max[0]->max - (float)$hasil_k[0]->value_sub;
                                                                $b= (float)$hasil_max[0]->max - (float)$hasil_min[0]->min;

                                                            }

                                                            echo '<td>'.$a/$b.'</td>'; 

                                                            $score= $a/$b * $krit->bobot_kriteria/100; 

                                                            $data = array(
                                                                'id_periode' => request()->segment(3),
                                                                'id_karyawan' => $k->id_karyawan,
                                                                'id_kriteria' => $krit->id_kriteria,
                                                                'score' => $score
                                                            ); 

                                                            $insert = \App\HasilModel::insert($data);  

                                                            $total_score += $score;

                                                        } ?> 
                                                    </td>  
                                                </tr>
                                                <?php 

                                                        $data_perangkingan = array(
                                                                'id_periode'  => request()->segment(3),
                                                                'id_karyawan' => $k->id_karyawan, 
                                                                'total_score' => $total_score
                                                        ); 

                                                        $insert = \App\PerangkinganModel::insert($data_perangkingan);

                                                } ?>
                                   
                                    </tbody> 
                                </table>
                               
    
                            </div>
                        </div>
                    </div> 
                    </div>
                    </div>
                    
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-left">
                            <div class="btn-group mt-3">
                                Hasil Akhir 
                            </div>
                        </div>
                    </div>
                    <div class='box-body pad'>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="subkriteria-table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>  
                                            <th>Karyawan</th> 
                                            <th>Total Score</th> 
                                        </tr>   
                                    </thead>
                                    <tbody> <?php $no=1;
                                        foreach($karyawan as $k){
                                            ?>  
                                                <tr> 
                                                    <td><?= $k->nm_karyawan;?></td>
                                                     <?php  
                                                            $perangkingan = \App\PerangkinganModel::hasil_perangkingan($k->id_karyawan,request()->segment(3));
                                                            echo '<td>'.$perangkingan['perangkingan']->total_score.'</td>';  
                                                        ?> 
                                                    </td>  
                                                    
                                                </tr>
                                                <?php  
                                                } ?>
                                   
                                    </tbody> 
                                </table>
                               
    
                            </div>
                        </div>
                    </div> 
                    </div>
                    </div> 
                            
    
                </div>
            </div>
        </div>
    </div>
</div> 
    
<script type="text/javascript">
            
    $(document).ready(function() { 
            //reset
            $('.btn_reset_data').on('click', function(event) {
                var id_karyawan = $(this).attr('id_karyawan'); 
                var id_periode = '<?php echo request()->segment(3);?>'; 
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('penilaian.reset_data') }}",
                    data: {
                        "_token" : "{{ csrf_token() }}",  
                        id_karyawan : id_karyawan,
                        id_periode : id_periode
                    }, 
                    dataType: "json",
                    success: function(data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'success',
                            title: 'Data Berhasil Direset'
                        }); 
                        setTimeout(function() {
                             location.reload();
                        }, 1000);
                        
                    },
                    error: function(request, status, error) {
                        console.log(request.responseText);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'error',
                            title: 'Gagal menghubungkan Ke Server'
                        })
                    }

                });

            });

            $(document).on('click', '.btn_isi_data', function() {
                var id_karyawan = $(this).attr('id_karyawan'); 
                var id_periode = '<?php echo request()->segment(3);?>'; 
                $("#id_karyawan").val(id_karyawan); 
 

                $.ajax({
                    type: "POST",
                    url: "{{ route('penilaian.cek_duplikat') }}",
                    data: {
                        "_token" : "{{ csrf_token() }}",   
                        id_karyawan : id_karyawan,
                        id_periode : id_periode
                    }, 
                    dataType: "json",
                    success: function(data) {
                        if(data > 0){ 
                            alert('Data Sudah ada Silahkan Reset Data'); 
                        }else{
                            $('#m_add-isi').modal('show');  
                        }

                    },
                    error: function(request, status, error) {
                        console.log(request.responseText);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'error',
                            title: 'Gagal menghubungkan Ke Server'
                        })
                    }

                });

            }); 
            }); 


</script>
@endsection