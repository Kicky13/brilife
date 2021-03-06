<!DOCTYPE html>
<html>
<?php $this->load->view('komponen/head'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('komponen/topside'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('komponen/admin_sidebar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Kuisioner
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Kuisioner</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- /.box-header -->

            <!-- /.box-body -->

            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <a href="<?php echo base_url('index.php/kuesioner/formAddkuesioner'); ?>" class="btn btn-primary" type="button">Tambah Kuisioner</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jabatan</th>
                            <th>Pertanyaan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($data as $row) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['jabatan']; ?></td>
                            <td><?php echo $row['kuesioner']; ?></td>
                            <td><a href="<?php echo base_url('index.php/kuesioner/formEditkuesioner/'.$row['id_kuesioner']); ?>" class="btn btn-block btn-success btn-xs" type="button">Edit</a></td>
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
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>

</footer>

<!-- Control Sidebar -->

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
