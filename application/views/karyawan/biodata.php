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
                Biodata
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Biodata</li>
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
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'assets/'; ?>dist/img/avatar04.png" alt="User profile picture"> -->

                            <h1 class="profile-username text-center"><?php echo $data['nama']; ?></h1>

                            <p class="text-muted text-center"><?php echo $data['jabatan']; ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>NIP</b> <a class="pull-right"><?php echo $data['nip']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jenis Kelamin</b> <a class="pull-right"><?php echo $data['gender']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal Lahir</b> <a class="pull-right"><?php echo $data['ttl']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tempat Lahir</b> <a class="pull-right"><?php echo $data['tempat_lahir']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal Masuk Kerja</b> <a class="pull-right"><?php echo $data['tanggal_masuk']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Lama Kerja</b> <a class="pull-right"><?php echo $data['lama_kerja']; ?> Bulan</a>
                                </li>
                            </ul>
                            <!-- <a href="#" class="btn btn-info btn-block"><b>Edit</b></a> -->
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
