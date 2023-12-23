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
                <h1 class="m-0 text-dark">Kriteria</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Kriteria</a></li>
                    <li class="breadcrumb-item active">Data Kriteria</li>
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
                    <input type="hidden" id="id" name="id_kriteria">  
                <div class="form-group">
                    <label>Nama Kriteria <font color="#f00">*</font></label>
                    <input type="text" class="form-control" name="nm_kriteria" id="nm_kriteria" placeholder="Nama kriteria ...">
                </div>
                <div class="form-group">
                    <label>Nilai Bobot (%) <font color="#f00">*</font></label>
                    <input type="number" class="form-control" name="bobot_kriteria" id="bobot_kriteria" placeholder="Nilai Bobot kriteria ...">
                </div> 
                 
                <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipe Kriteria</label>
                            <select class="form-control" id="tipe_kriteria" name="tipe_kriteria" required>
                                <option value=''>Pilih Kriteria</option>
                                <option value='cost'>Cost</option>
                                <option value='benefit'>Benefit</option> 
                            </select>
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
                        <h3 class="card-title">List Data kriteria</h3>
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
                                <th>Nama Kriteria</th>  
                                <th>Nilai Bobot</th>  
                                <th>Tipe Kriteria</th>  
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($kriteria as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nm_kriteria }}</td>  
                                <td>{{ $p->bobot_kriteria }}</td>  
                                <td>{{ $p->tipe_kriteria }}</td>  
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editData({{ $p->id_kriteria }})"><i class="fa fa-edit"></i> Edit</button>
                                    <a class="btn btn-danger btn-sm tombol-hapus" href="{{ '/kriteria/kriteria_delete/'.$p->id_kriteria }}"><i class="fa fa-trash"></i> Delete</a>
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
        $('#nm_kriteria').val('');  
        $('#bobot_kriteria').val('');  
        $('#tipe_kriteria').val('');  
        dsState = "Input";
        
        $("#myModal").find('.modal-title').text('Tambah Kriteria');
        $("#myModal").modal('show',{backdrop: 'true'}); 

        
    });


    $("#saveData").click(function(){
        if($.trim($("#nm_kriteria").val()) == ""){
            Toast.fire({
                icon: 'error',
                title: ' Nama kriteria harus diisi'
            });
        }else if($.trim($("#bobot_kriteria").val()) == ""){
            Toast.fire({
                icon: 'error',
                title: ' Bobot kriteria harus diisi'
            });
        }else if($.trim($("#tipe_kriteria").val()) == ""){
            Toast.fire({
                icon: 'error',
                title: ' Tipe kriteria harus diisi'
            });
        }
        else{
            if(dsState=="Input"){ 
                $('#formku').attr("action", " {{ route('kriteria.kriteria_doAdd') }}");
                      
                    $('#formku').submit(); 
            }else{
                $('#formku').attr("action", " {{ route('kriteria.kriteria_doEdit') }}");
                $('#formku').submit(); 
            }
        }
    });
  
    function editData(id){
        dsState = "Edit";  
        $.ajax({
            type: "POST",
            url: "{{ route('kriteria.kriteria_get') }}",
            dataType: 'json',
            data : {
                "_token" : "{{ csrf_token() }}",
                id : id
            },
            success: function (result){
                console.log(result);
                $('#id').val(result.data.id_kriteria);
                $('#nm_kriteria').val(result.data.nm_kriteria); 
                $('#bobot_kriteria').val(result.data.bobot_kriteria);   
                $('#tipe_kriteria').val(result.data.tipe_kriteria);   
                $("#myModal").find('.modal-title').text('Edit kriteria');
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