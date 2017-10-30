<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url().'assets/'; ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><h4>SIPEKA</h4></p>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo base_url('index.php/dashboard'); ?>">
                    <i class="fa fa-home"></i> <span>Home</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Data Penilaian</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('index.php/penilaian/tabelPenilaian'); ?>"><i class="fa fa-circle-o"></i> Tabel Penilaian</a></li>
                    <li><a href="<?php echo base_url('index.php/penilaian/hasilPenilaian'); ?>"><i class="fa fa-circle-o"></i> Hasil Penilaian</a></li>
                    <li><a href="<?php echo base_url('index.php/penilaian/transkripPenilaian'); ?>"><i class="fa fa-circle-o"></i> Laporan Data Penilaian</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>