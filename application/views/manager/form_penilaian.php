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
                Form Penilaian

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Data Penilaian</a></li>
                <li><a href="#">Tabel Penilaian</a></li>
                <li class="active">Form Penilaian</li>
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
                        <form role="form" method="post"
                              action="<?php echo base_url('index.php/penilaian/addPenilaian/' . $data['id_karyawan']); ?>">
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Periode Penilaian</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Bulan Penilaian"
                                       value="<?php echo $periode['bulan'] . '/' . $periode['tahun']; ?>" disabled>
                                <input type="hidden" value="<?php echo $periode['bulan'] . '/' . $periode['tahun']; ?>"
                                       name="periode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Induk Pegawai</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nomor Induk Pegawai" disabled value="<?php echo $data['nip']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Nama Lengkap</label>
                                <input type="text" class="form-control" id="exampleInput"
                                       placeholder="Nama Lengkap" disabled value="<?php echo $data['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="exampleInput"
                                       placeholder="Tempat, Tanggal Lahir" disabled value="<?php echo $data['ttl']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="exampleInput"
                                       placeholder="Jenis Kelamin" disabled value="<?php echo $data['gender']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Jabatan</label>
                                <input type="text" class="form-control" id="exampleInput"
                                       placeholder="Jabatan" disabled value="<?php echo $data['jabatan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Lama Kerja</label>
                                <input type="text" class="form-control" id="exampleInput"
                                       placeholder="Lama Kerja" disabled
                                       value="<?php echo $data['lama_kerja']; ?> Bulan">
                            </div> -->
                            <div class="form-group">
                                <label for="exampleInput">Mutu Kerja</label>
                                <input type="number" min="0" class="form-control"
                                       placeholder="Mutu Kerja" name="mutu" value="<?php echo $nilai[0]; ?>" id="mutu" readonly>
                                       <p><b>Keterangan Nilai : 0 - 69 = Cukup || 70 - 79 = Cukup Baik || 80 - 100 = Baik</b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Inisiatif</label>
                                <input type="number" min="0" class="form-control"
                                       placeholder="Inisiatif" name="inisiatif" value="<?php echo $nilai[1]; ?>" id="inisiatif" readonly>
                                       <p><b>Keterangan Nilai : 0 - 69 = Cukup || 70 - 79 = Cukup Baik || 80 - 100 = Baik</b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Kehadiran</label>
                                <input type="number" min="0" class="form-control"
                                       placeholder="Kehadiran" name="kehadiran" value="<?php echo $nilai[2]; ?>" id="kehadiran" readonly>
                                       <p><b>Keterangan Nilai : 0 - 69 = Cukup || 70 - 79 = Cukup Baik || 80 - 100 = Baik</b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Sikap</label>
                                <input type="number" min="0" class="form-control"
                                       placeholder="Sikap" name="sikap" value="<?php echo $nilai[3]; ?>" id="sikap" readonly>
                                       <p><b>Keterangan Nilai : 0 - 69 = Cukup || 70 - 79 = Cukup Baik || 80 - 100 = Baik</b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Pengetahuan tentang pekerjaan</label>
                                <input type="number" min="0" class="form-control"
                                       placeholder="Pengetahuan tentang pekerjaan" name="pengetahuan" value="<?php echo $nilai[4]; ?>" id="pengetahuan"
                                       readonly>
                                       <p><b>Keterangan Nilai : 0 - 69 = Cukup || 70 - 79 = Cukup Baik || 80 - 100 = Baik</b></p>
                            </div>
                            <div class="box-footer">
                                <button type="button" id="hitung" class="btn btn-info">Hitung</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Prestasi</label>
                                <input type="text" class="form-control" id="nilai"
                                       placeholder="Prestasi" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput">Keterangan</label>
                                <input type="text" class="form-control" id="prestasi"
                                       placeholder="Keterangan" name="prestasi" required>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label for="exampleInput">Keterangan</label>
                                <input type="text" class="form-control"
                                       placeholder="Keterangan" name="komentar">
                            </div> -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" value="submit">Simpan</button>
                        <a href="<?php echo base_url('index.php/penilaian/tabelPenilaian'); ?>" type="button" class="btn btn-success">Kembali</a>
                    </div>
                    </form>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('komponen/footer'); ?>
<script>
    $(document).ready(function () {
        $('#hitung').click(function () {
            $('#prestasi').html();
            var mutu = $('#mutu').val();
            var inisiatif = $('#inisiatif').val();
            var kehadiran = $('#kehadiran').val();
            var sikap = $('#sikap').val();
            var pengetahuan = $('#pengetahuan').val();
            if (mutu == "" || inisiatif == "" || kehadiran == "" || sikap == "" || pengetahuan == "") {
                swal("Gagal!", "Semua Kriteria Harus Di isi!", "error");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('index.php/penilaian/hitungPrestasi'); ?>',
                    data: {
                        "mutu": mutu,
                        "inisiatif": inisiatif,
                        "kehadiran": kehadiran,
                        "sikap": sikap,
                        "pengetahuan": pengetahuan
                    }
                }).done(function (data) {
                    var cetak = jQuery.parseJSON(data);
                    $('#prestasi').val(cetak.prestasi);
                    $('#nilai').val(cetak.nilai);
                })
            }
        });
    });
</script>
</body>
</html>
