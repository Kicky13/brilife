<!DOCTYPE html>
<html>
<?php $this->load->view('komponen/head'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('komponen/topside'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('komponen/manager_sidebar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tabel Penilaian
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Data Penilaian</a></li>
                <li class="active">Tabel Penilaian</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <!-- /.box-body -->

            <!-- /.box -->

            <div class="box">
                <div class="box-header">

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($data as $row) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nip']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jabatan']; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/penilaian/kuisioner/'.$row['id_karyawan'].'/'.$row['id_jabatan']); ?>" class="btn btn-block btn-primary btn-xs" type="button">Input Nilai</a>
                            </td>
                        </tr>
                        <?php } ?>
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
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>

</footer>

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Create the tabs -->
<!-- </aside> -->
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
