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
                Kuisioner
            </h1>
            <h3> Pengisian Kuisioner</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Data Penilaian</a></li>
                <li class="active">Tabel Penilaian</li>
                <li class="active">Kuisioner</li>
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
                    <form action="<?php echo base_url('index.php/penilaian/isiKuesioner/' . $mydata[0]['id_karyawan'] . '/' . $mydata[0]['id_jabatan']); ?>" method="post">
                        <table id="example1" class="table table-bordered table-striped">
                            <div class="margin">
                                <p><h4><b>Keterangan Presentase Nilai :
                                    <br>Skor 1 : 0-14% || Skor 2 : 15-29% || Skor 3 : 30-44% || Skor 4 : 45-59% || Skor 5 : 60-74% || Skor 6 : 75-89% || Skor 7 : 90-100%</b></h4></p>
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pertanyaan</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach ($mydata as $row) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kuesioner']; ?></td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="1">
                                        </td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="2">
                                        </td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="3">
                                        </td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="4">
                                        </td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="5">
                                        </td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="6">
                                        </td>
                                        <td><input required type="radio" name="id-<?php echo $row['id_kuesioner']; ?>" value="7">
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </div>
                        </table>
                        <div class="box-footer">
                            <button type="submit" value="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
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
