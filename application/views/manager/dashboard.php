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
                Selamat Datang, Pimpinan Cabang!
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        <div id="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default widget">
                                <div class="panel-heading">
                                    <div class="panel-controls">
                                        
                                    </div>
                                    <h1>SISTEM PENILAIAN KINERJA KARYAWAN</h1>
                                </div>
        <img src="<?php echo base_url().'assets/'; ?>dist/img/bri.jpg">                        
        <div class="panel-body">
    
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        </div>
            </section>              

<?php $this->load->view('komponen/footer'); ?>
</body>
</html>
