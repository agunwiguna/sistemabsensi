  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>ABSENSI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if ($this->session->userdata('level')=='admin') { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
              <?php } else if ($this->session->userdata('level')=='siswa') { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
              <?php } else { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

              <?php if ($this->session->userdata('level')=='admin') { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="img-circle" alt="User Image">
              <?php } else if ($this->session->userdata('level')=='siswa') { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="img-circle" alt="User Image">
              <?php } else { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="img-circle" alt="User Image">
              <?php } ?>

                <p>
                  <?php echo $this->session->userdata('nama');?>
                  <small><?php echo $this->session->userdata('alamat');?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url('setting')?>" class="btn btn-info btn-sm">
                    <span class="glyphicon glyphicon-user"></span> Profile 
                  </a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('auth/out')?>" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-log-out"></span> Sign Out 
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php if ($this->session->userdata('level')=='admin') { ?>
          <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
        <?php } else if ($this->session->userdata('level')=='siswa') { ?>
          <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
        <?php } else { ?>
          <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="user-image" alt="User Image">
        <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <?php if ($this->session->userdata('level')=='admin') { ?>
        <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
          <a href="<?=base_url('db')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_sw)?$active_menu_sw:'' ?>"><a href="<?=base_url('m/sw')?>">
              <i class="fa fa-user"></i>Data Siswa</a>
            </li>
            <li class="<?=isset($active_menu_gr)?$active_menu_gr:'' ?>">
              <a href="<?=base_url('m/gr')?>"><i class="fa fa-graduation-cap"></i>Data Guru
              </a>
            </li>
            <li class="<?=isset($active_menu_kls)?$active_menu_kls:'' ?>">
              <a href="<?=base_url('m/kls')?>"><i class="fa fa-street-view"></i>Data Kelas</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Data Absensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_ab)?$active_menu_ab:'' ?>">
              <a href="<?=base_url('absensi/list')?>"><i class="fa fa-user"></i>Data Absensi</a>
            </li>
            <li class="<?=isset($active_menu_lap)?$active_menu_lap:'' ?>">
              <a href="<?=base_url('absensi/report')?>"><i class="fa fa-bookmark"></i>Laporan Absensi</a>
            </li>
          </ul>
        </li>
        <li class="<?=isset($active_menu_alt)?$active_menu_alt:'' ?>">
          <a href="<?=base_url('alat')?>">
            <i class="fa fa-wrench"></i> <span>Alat</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_inf)?$active_menu_inf:'' ?>">
          <a href="<?=base_url('i')?>">
            <i class="fa fa-info"></i> <span>Info</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_jdwl)?$active_menu_jdwl:'' ?>">
          <a href="<?=base_url('j')?>"><i class="fa fa-calendar"></i> <span>Jadwal</span></a>
        </li>
        <li class="<?=isset($active_menu_k)?$active_menu_k:'' ?>">
          <a href="<?=base_url('konsultasi')?>"><i class="fa fa-exclamation-triangle"></i><span>Konseling</span></a>
        </li>
        <li class="<?=isset($active_menu_st)?$active_menu_st:'' ?>">
          <a href="<?=base_url('setting')?>"><i class="fa fa-gear"></i> <span>Setting</span>
          </a>
        </li>
         <?php } else if ($this->session->userdata('level')=='siswa') { ?>
        <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
          <a href="<?=base_url('db')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_sw)?$active_menu_sw:'' ?>"><a href="<?=base_url('m/sw')?>">
              <i class="fa fa-user"></i>Data Siswa</a>
            </li>
          </ul>          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Data Absensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_ab)?$active_menu_ab:'' ?>">
              <a href="<?=base_url('absensi/list')?>"><i class="fa fa-user"></i>Data Absensi</a>
            </li>
          </ul>
        </li>
        <li class="<?=isset($active_menu_inf)?$active_menu_inf:'' ?>">
          <a href="<?=base_url('i')?>">
            <i class="fa fa-info"></i> <span>Info</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_jdwl)?$active_menu_jdwl:'' ?>">
          <a href="<?=base_url('j')?>"><i class="fa fa-calendar"></i> <span>Jadwal</span></a>
        </li>
        <li class="<?=isset($active_menu_st)?$active_menu_st:'' ?>">
          <a href="<?=base_url('setting')?>"><i class="fa fa-gear"></i> <span>Setting</span>
          </a>
        </li>
          <?php } else { ?>
        <li class="<?=isset($active_menu_db)?$active_menu_db:'' ?>">
          <a href="<?=base_url('db')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_sw)?$active_menu_sw:'' ?>"><a href="<?=base_url('m/sw')?>">
              <i class="fa fa-user"></i>Data Siswa</a>
            </li>
            <li class="<?=isset($active_menu_gr)?$active_menu_gr:'' ?>">
              <a href="<?=base_url('m/gr')?>"><i class="fa fa-graduation-cap"></i>Data Guru
              </a>
            </li>
            <li class="<?=isset($active_menu_kls)?$active_menu_kls:'' ?>">
              <a href="<?=base_url('m/kls')?>"><i class="fa fa-street-view"></i>Data Kelas</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Data Absensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=isset($active_menu_ab)?$active_menu_ab:'' ?>">
              <a href="<?=base_url('absensi/list')?>"><i class="fa fa-user"></i>Data Absensi</a>
            </li>
            <li class="<?=isset($active_menu_lap)?$active_menu_lap:'' ?>">
              <a href="<?=base_url('absensi/report')?>"><i class="fa fa-bookmark"></i>Laporan Absensi</a>
            </li>
          </ul>
        </li>
        <li class="<?=isset($active_menu_inf)?$active_menu_inf:'' ?>">
          <a href="<?=base_url('i')?>">
            <i class="fa fa-info"></i> <span>Info</span>
          </a>
        </li>
        <li class="<?=isset($active_menu_jdwl)?$active_menu_jdwl:'' ?>">
          <a href="<?=base_url('j')?>"><i class="fa fa-calendar"></i> <span>Jadwal</span></a>
        </li>
        <li class="<?=isset($active_menu_k)?$active_menu_k:'' ?>">
          <a href="<?=base_url('konsultasi')?>"><i class="fa fa-exclamation-triangle"></i><span>Konseling</span></a>
        </li>
        <li class="<?=isset($active_menu_st)?$active_menu_st:'' ?>">
          <a href="<?=base_url('setting')?>"><i class="fa fa-gear"></i> <span>Setting</span>
          </a>
        </li>
          <?php } ?>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>