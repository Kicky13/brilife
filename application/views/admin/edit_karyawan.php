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
                Form Karyawan

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Data Karyawan</a></li>
                <li class="active">Form Karyawan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo base_url('index.php/karyawan/editKaryawan/'.$detail['id_karyawan'])?>" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Induk Pegawai</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk Pegawai" value="<?php echo $detail['nip']; ?>" name="nip">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk Pegawai" value="<?php echo $detail['password']; ?>" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap" value="<?php echo $detail['nama']; ?>" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo $detail['ttl']; ?>" name="ttl">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir" value="<?php echo $detail['tempat_lahir']; ?>" name="tempat_lahir">
                                </div>
                                <div class="form-group">
                                    <label>Laki-Laki
                                        <input type="radio" name="kelamin" value="1" class="flat-red form-control" <?php echo ($detail['id_gender'] == 1) ? "checked":""; ?>>
                                    </label>
                                    <label>Perempuan
                                        <input type="radio" name="kelamin" value="2" class="flat-red form-control" <?php echo ($detail['id_gender'] == 2) ? "checked":""; ?>>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jabatan</label>
                                    <select class="form-control" name="jabatan">
                                        <?php foreach ($jabatan as $item) { ?>
                                            <option value="<?php echo $item['id_jabatan']; ?>" <?php echo ($detail['id_jabatan'] == $item['id_jabatan']) ? "selected":""; ?>><?php echo $item['jabatan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Diterima</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker2" value="<?php echo $detail['tanggal_masuk']; ?>" name="masuk">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" value="update" class="btn btn-warning">Update</button>
                                <a href="<?php echo base_url('index.php/karyawan'); ?>" class="btn btn-primary">Kembali</a>
                            </div>
                        </form>
                    </div>

                    <!-- /.box -->

                    <!-- Form Element sizes -->


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
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
        $('#datepicker2').datepicker({
            autoclose: true
        });
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
</body>
</html>
