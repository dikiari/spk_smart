 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="icon" type="image/png" href="{{ asset('lgn/images/icons/favicon.ico') }}"/>
 <!-- Tempusdominus Bbootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
 <!-- iCheck -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <!-- JQVMap -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
 <!-- summernote -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
 <!-- Select2 -->
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
 <!-- Google Font: Source Sans Pro -->
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <!-- jQuery -->
 <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
 <!-- SweetAlert2 -->
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
 <!-- SweetAlert2 -->
 <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Hasil Perangkingan Penilaian</h2> 
                        <h3 class="card-title">Periode : {{ $periode->nm_periode }}</h3>
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
                                <th>Nama Karyawan</th>  
                                <th>Hasil Akhir</th>
                                <th>Perangkingan</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $no = 0; 
                            ?>
                            @foreach ($perangkingan as $p)
                            <?php
                            $no++;
                            ?>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nm_karyawan }}</td>  
                                <td>{{ $p->total_score }}</td>  
                                <td>{{ $no }}</td>   
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" onclick="window.print()" class="btn btn-primary mt-2">Print</button>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Bootstrap -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{ asset('admin/dist/js/pages/dashboard2.js') }}"></script>
    <!--- My Js -->
    <script src="{{ asset('js/myscript.js') }}"></script>
 
    
 