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
                <h1 class="m-0 text-dark">Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Karyawan</a></li>
                    <li class="breadcrumb-item active">Data Karyawan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
            <form class="eventInsForm" method="post" target="_self" name="formku" id="formku"  >
            {{ csrf_field() }} 
                    <input type="hidden" id="id" name="id_karyawan">  
                <div class="form-group">
                    <label>Nama Karyawan <font color="#f00">*</font></label>
                    <input type="text" class="form-control" name="nm_karyawan" id="nm_karyawan" placeholder="Nama karyawan ...">
                </div>
                <div class="form-group">
                    <label>NIK<font color="#f00">*</font></label>
                    <input type="number" class="form-control" name="nik" id="nik" placeholder="Nilai Bobot karyawan ...">
                </div> 
                  
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <button type="button" class="btn btn-primary" id="saveData"><i class="fa fa-save"></i> Simpan </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
                        <h3 class="card-title">List Data karyawan</h3>
                        <div class="float-sm-right">
                            <button class="btn btn-block btn-primary" id="tambah"><i class="fa fa-plus"></i> Tambah</button> 
                            <div class="btn-group mt-3">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>  
                                <th>NIP</th>  
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($karyawan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nm_karyawan }}</td>  
                                <td>{{ $p->nik }}</td>     
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editData({{ $p->id_karyawan }})"><i class="fa fa-edit"></i> Edit</button>
                                    <a class="btn btn-danger btn-sm tombol-hapus" href="{{ '/karyawan/karyawan_delete/'.$p->id_karyawan }}"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   var dsState;

    $("#tambah").click(function(){
        $('#id').val('');
        $('#nm_karyawan').val('');  
        $('#nik').val('');   
        dsState = "Input";
        
        $("#myModal").find('.modal-title').text('Tambah Karyawan');
        $("#myModal").modal('show',{backdrop: 'true'}); 

        
    });


    $("#saveData").click(function(){
        if($.trim($("#nm_karyawan").val()) == ""){
            Toast.fire({
                icon: 'error',
                title: ' Nama karyawan harus diisi'
            });
        }else if($.trim($("#nik").val()) == ""){
            Toast.fire({
                icon: 'error',
                title: ' Bobot karyawan harus diisi'
            });
        } 
        else{
            if(dsState=="Input"){ 
                $('#formku').attr("action", " {{ route('karyawan.karyawan_doAdd') }}");
                      
                    $('#formku').submit(); 
            }else{
                $('#formku').attr("action", " {{ route('karyawan.karyawan_doEdit') }}");
                $('#formku').submit(); 
            }
        }
    });
  
    function editData(id){
        dsState = "Edit";  
        $.ajax({
            type: "POST",
            url: "{{ route('karyawan.karyawan_get') }}",
            dataType: 'json',
            data : {
                "_token" : "{{ csrf_token() }}",
                id : id
            },
            success: function (result){
                console.log(result);
                $('#id').val(result.data.id_karyawan);
                $('#nm_karyawan').val(result.data.nm_karyawan); 
                $('#nik').val(result.data.nik);   
                $("#myModal").find('.modal-title').text('Edit karyawan');
                $("#myModal").modal('show',{backdrop: 'true'});           
            }
        });
    }
 

    function checkPassword(value) {
        const password = $('#password').val();
        const check = $('#password_confirmation').val();
        if (password != check) {
            $('#password_confirmation').css({ 'background-color' : '#ffc89e' });
            $('#passwordWarning').show();
        } else {
            $('#password_confirmation').css({ 'background-color' : '#ffffff' });
            $('#passwordWarning').hide();
        }
    }  
  
</script>
    
@endsection