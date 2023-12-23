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
                <h1 class="m-0 text-dark">Penilaian</h1>
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
                        <h3 class="card-title">List Data Periode</h3>
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
                                    @if(Auth::user()->role == 'admin') 
                                    <a class="btn btn-primary btn-sm" href="{{ '/penilaian/isi_data/'.$p->id_periode }}"><i class="fa fa-edit"></i> Isi Data</a>
                                    @endif
                                    <a class="btn btn-success btn-sm" href="{{ '/penilaian/hasil/'.$p->id_periode }}"><i class="fa fa-file"></i> Hasil Perhitungan</a>
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
    
@endsection