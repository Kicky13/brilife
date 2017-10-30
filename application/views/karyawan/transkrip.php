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
                Transkrip Nilai <?php echo $profil['nama']; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Data Penilaian</a></li>
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
                    <table id="example1" class="table table-bordered table-striped">
                        <div class="margin">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Periode</th>
                                <th>Mutu Kerja</th>
                                <th>Inisiatif</th>
                                <th>Kehadiran</th>
                                <th>Sikap</th>
                                <th>Pengetahuan Kerja</th>
                                <th>Indeks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            foreach ($data as $row){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['periode']; ?></td>
                                    <td><?php echo $row['mutu']; ?></td>
                                    <td><?php echo $row['inisiatif']; ?></td>
                                    <td><?php echo $row['kehadiran']; ?></td>
                                    <td><?php echo $row['sikap']; ?></td>
                                    <td><?php echo $row['pengetahuan']; ?></td>
                                    <td><?php echo $row['prestasi']; ?></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>
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
