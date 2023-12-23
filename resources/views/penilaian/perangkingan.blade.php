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
                <h1 class="m-0 text-dark">Hasil Akhir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
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
                        <h3 class="card-title">List Data periode</h3>
                        <div class="float-sm-right">
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
                                <th>Nama Periode</th>  
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($periode as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nm_periode }}</td>  
                                <td>
                                    <a class="btn btn-success btn-sm print text-white" id_periode="{{ $p->id_periode }}"><i class="fa fa-print"></i> Lihat Hasil</a>
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
   

    $( document ).ready(function() {
        $(document).on('click', '.print', function() { 
                var id_periode = $(this).attr('id_periode');  
                window.open('/penilaian/perangkingan_hasil/'+ id_periode, '_blank', 'location=yes,height=570,width=900,scrollbars=yes,status=yes'); 
            });
    });
    

     

       



</script>
    
@endsection