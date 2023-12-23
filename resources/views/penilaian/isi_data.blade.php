@extends('layouts.master')


@section('content')
<style>
    .thumb{
        margin: 10px 5px 0 0;
        width: 100px;
        padding-left: 2px;
    } 
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Isi Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Sub Kriteria</a></li>
                    <li class="breadcrumb-item active">Data Sub Kriteria</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

 <!-- Modal tambah data -->
 <div class="modal fade  " id="m_add-isi" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Kriteria</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div> 
         <div class="modal-body">  
                     <div class="table-responsive">
                     <table class="table table-bordered" id="subkriteria-table" width="100%" cellspacing="0">
                         <thead>
                             <tr>  
                                 <th>Nama Kriteria</th>
                                 <th>Value</th>  
                             </tr>   
                         </thead>
                         <tbody>
                             <form id="f_simpan_val" action="{{ route('penilaian.simpan_val') }}" method="POST">
                                {{ csrf_field() }} 

                                 <input type="hidden" id="id_karyawan" name="id_karyawan">
                         <?php  
                             foreach($kriteria as $r){
                                 ?>
                                     <tr>
                                         <td>
                                         <?php echo $r->nm_kriteria;?>
                                         <input type="hidden" name="id_periode" value="<?php echo request()->segment(3);?>">
                                         <input type="hidden" name="id_kriteria[]" value="<?php echo $r->id_kriteria;?>">
                                     </td>
                                         <td> 
                                                   @php   
                                                            $hasil = \App\PenilaianModel::cari_hasil_sub($r->id_kriteria);  
                                                    @endphp    
                                                 <select class="form-control" name="val[]" required> 
                                              <?php foreach($hasil as $h){ ;?> 
                                                         <option  value="<?php echo $h->id_subkriteria;?>"><?php echo $h->nm_subkriteria;?></option>  
                                                         <?php };?> 
                                                     </select> 
                                         </td>
                                     </tr> 
                                 <?php }
                         ?>
                         </tbody> 
                     </table> 
                 </div> 
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
             <button type="submit" class="btn btn-primary">Simpan Data</button>
         </div>
         </form>
     </div>
 </div> 
 </div> 
 
<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12 col-xs-12">
                @if($errors->any())
                    <div class="row">
                        <div class="col-12 alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button class="close" onclick="$('.alert').hide()"><i class="fa fa-close"></i></button>
                        </div>
                    </div>
                @endif
                @if(session('status'))
                    <div class="row">
                        <div class="col-12 alert alert-success">
                            {{ session('status') }}
                            <button class="close" onclick="$('.alert').hide()"><i class="fa fa-close"></i></button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-right">
                            <div class="btn-group mt-3">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @foreach ($karyawan as $k)
                    <div class="card-body">
                    <h3 class="card-title">                                               
                         <?php echo $k->nm_karyawan;?> 
                    </h3>

                        <table   class="table table-bordered table-striped">
                            <thead>
                                <tr> 
                                    <th>Nama Kriteria</th>    
                                    <th>Sub Kriteria</th>    
                                    <th>Bobot Subkriteria</th>    
                                </tr>
                            </thead>
                            <tbody> 
                               
                            @foreach ($kriteria as $kr)
                            <tr>
                                <td>
                                                <?php echo $kr->nm_kriteria;?>
                                                </td>   
                                                        @php   
                                                            $hasil = \App\PenilaianModel::cari_hasil($kr->id_kriteria,$k->id_karyawan,request()->segment(3));  
                                                        @endphp   
                                                <td> 
                                                     <?php foreach($hasil as $h){ ;?> 
                                                             <?php echo $h->nm_subkriteria;?> 
                                                    <?php };?>
                                                </td>
                                                <td> 
                                                     <?php foreach($hasil as $h){ ;?>
                                                             <?php echo $h->value_sub;?>  
                                                    <?php };?>
                                                </td>
                            <tr>
                                 
                              
                               
                            @endforeach
                                
                                
                            </tbody>
                        </table>
                        <button type="buton" value="Simpan" class="btn btn-primary btn_isi_data mt-2" id_karyawan="<?php echo $k->id_karyawan;?>">Isi Data</button> 
                        <button type="buton" value="reset" class="btn btn-danger btn_reset_data mt-2" id_karyawan="<?php echo $k->id_karyawan;?>" id_periode="<?php echo request()->segment(3);?>">Reset</button> 
                </div>
                @endforeach
                    <!-- /.card-body -->
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