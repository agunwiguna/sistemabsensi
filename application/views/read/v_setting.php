<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Setting</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting</li>
      </ol>
    </section>

   <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if ($this->session->userdata('level')=='admin') { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="profile-user-img img-responsive img-circle" alt="User profile picture">
              <?php } else if ($this->session->userdata('level')=='siswa') { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="profile-user-img img-responsive img-circle" alt="User profile picture">
              <?php } else { ?>
                <img src="<?=base_url()?>assets/img/<?php echo $this->session->userdata('foto');?>" class="profile-user-img img-responsive img-circle" alt="User profile picture">
              <?php } ?>
              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama');?></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('alamat');?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Setting</a></li>
              <li><a href="#timeline" data-toggle="tab">Ubah Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form action="<?=base_url('auth/up')?>" class="form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Akun</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama');?>" name="nama" placeholder="Masukan Nama Akun..">
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('alamat');?>" name="alamat" placeholder="Masukan Alamat..">
                    </div>
                  </div>
              <?php if ($this->session->userdata('level')=='admin') {?>
                  <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Lattitude</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('lat');?>" name="lat" placeholder="Masukan Lattitude..">
                    </div>
                  </div>                               
                  <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Longittude</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('lng');?>" name="lng" placeholder="Masukan Longittude..">
                    </div>
                  </div>
              <?php } ?>
                  <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Foto Profile</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="foto">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Ubah</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                 <form class="form-horizontal" action="<?=base_url('auth/pas')?>" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_baru" class="form-control" id="inputName" placeholder="Masukan Password Lama.." required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_baru" class="form-control" id="inputEmail" placeholder="Masukan Password Baru.." required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="konfirmasi_password" class="form-control" id="inputEmail" placeholder="Konfirmasi Password.." required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Ubah</button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </div>
