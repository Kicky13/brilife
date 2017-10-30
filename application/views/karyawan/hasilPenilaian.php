<!DOCTYPE html>
<html>
<?php $this->load->view('komponen/head'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('komponen/topside'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('komponen/karyawan_sidebar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hasil Penilaian Periode <?php echo $periode['nama'].' '.$periode['tahun']; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Penilaian</a></li>
                <li class="active">Hasil Penilaian</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- /.box-body -->
            <!-- /.box -->
            <div class="box">
                <div class="box-header"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Profile Image -->
                    <!-- <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="<?php echo base_url() . 'assets/'; ?>dist/img/user4-128x128.jpg"
                                 alt="User profile picture"> -->

                            <h3 class="profile-username text-center"><?php echo $data['nama']; ?></h3>

                            <p class="text-muted text-center"><?php echo $data['jabatan']; ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Mutu Kerja</b> <a class="pull-right"><?php echo $data['mutu_kerja']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Inisiatif</b> <a class="pull-right"><?php echo $data['inisiatif']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kehadiran</b> <a class="pull-right"><?php echo $data['kehadiran']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Sikap</b> <a class="pull-right"><?php echo $data['sikap']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Pengetahuan Kerja</b> <a class="pull-right"><?php echo $data['pengetahuan_kerja']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Prestasi</b> <a class="pull-right"><?php echo $data['prestasi']; ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('komponen/footer'); ?>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
