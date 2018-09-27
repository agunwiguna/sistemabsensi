<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAbsensi | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/iCheck/square/blue.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>SI</b>ABSENSI</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php if($this->session->flashdata('status')) { ?>
    <p class="login-box-msg"><span class="label label-danger"><?=$this->session->flashdata('status')?></span></p>
    <?php } ?>
    <?php if($this->session->flashdata('regis')) { ?>
    <p class="login-box-msg"><span class="label label-success"><?=$this->session->flashdata('regis')?></span></p>
    <?php } ?>
   <?php echo form_open($action); ?>
      <div class="form-group has-feedback">
         <?php echo form_input('username', $username, ' autocomplete="off" class="form-control" id="username" placeholder="Username" required'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_password('password', $password, 'id="password" class="form-control" placeholder="Password" required'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
     <a href="" class="text-center" data-toggle="modal" data-target="#myModal">Register</a><br/>
     <a href="" data-toggle="modal" data-target="#ModalForgot">Lupa Password ?</a>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrasi Akun</h4>
      </div>
      <div class="modal-body">

        <form id="form-shower">
          <div class="form-group">
            <label for="sel1">Registrasi Sebagai :</label>
            <select class="form-control" id="myselect">
              <option>-- Pilih --</option>
              <option value="form_name1">Siswa</option>
              <option value="form_name2">Guru</option>
            </select>
          </div>
        </form>

        <form action="<?=base_url('auth/regs')?>" method="post" name="form_name1" id="form_name1" style="display:none" autocomplete="off">
          <div class="form-group col-md-2">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS.." required>
            <span id="availablity"></span>
          </div>
          <div class="form-group col-md-3">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder=" Masukan Nama.." required>
          </div>
          <div class="form-group col-md-2">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" name="jk" required>
              <option value="">-- Pilih --</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>  
          </div>
          <div class="form-group col-md-2">
            <label for="kontak">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" placeholder=" Masukan Kontak.." required>
          </div>
          <div class="form-group col-md-3">
            <label for="email">E-Mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder=" Masukan Email.." required>
          </div>
          <div class="form-group col-md-12">
            <label for="kontak">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Masukan Alamat.." required></textarea>
          </div>
          <div class="form-group col-md-2">
            <label for="agama">Agama</label>
            <select class="form-control" name="agama" required>
              <option value="">-- Pilih --</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
            </select>  
          </div>
          <div class="form-group col-md-3">
            <label for="parent">Nama Orang Tua</label>
            <input type="text" class="form-control" id="parent" name="parent" placeholder="Masukan Nama.." required>
          </div>
          <div class="form-group col-md-3">
            <label for="kontak">Kontak Orang Tua</label>
            <input type="text" class="form-control" id="kontakp" name="kontakp" placeholder="Masukan Kontak.." required>
          </div>
          <div class="form-group col-md-4">
            <label for="nip">Wali Kelas</label>
            <select class="form-control" name="nip" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($guru as $g){ ?>
                <option value="<?=$g['nip']?>"><?=$g['nama_guru']?></option>    
              <?php } ?>
            </select>  
          </div>
          <div class="form-group col-md-3">
            <label for="id_rfid">ID Absensi</label>
            <input type="text" class="form-control" id="id_rfid" name="id_rfid" placeholder="Masukan ID.." required>
          </div>
          <div class="form-group col-md-3">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" name="id_kelas" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($kelas as $k){ ?>
                <option value="<?=$k['id_kelas']?>"><?=$k['nama_kelas']?></option>    
              <?php } ?>
            </select>  
          </div>
          <div class="form-group col-md-3" id="userNameDiv">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username.." required>
          </div>
          <div class="form-group col-md-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password.." required>
          </div>
          <div class="form-group col-md-12">
          <p align="right">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info">Simpan</button>
          </p>
          </div>
        </form>

        <form action="<?=base_url('auth/reg')?>" method="post" name="form_name2" id="form_name2" style="display:none" autocomplete="off">
           <div class="form-group col-md-6">
            <label for="pengarang">NIP</label>
            <input type="text" class="form-control" name="nip" placeholder="Masukan NIP.."  required>
          </div>
          <div class="form-group col-md-6">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama_guru" placeholder="Masukan Nama.."  required>
          </div>
          <div class="form-group col-md-6">
            <label for="kontak">Kontak</label>
            <input type="text" class="form-control" name="kontak" placeholder="Masukan Kontak.."  required>
          </div>
          <div class="form-group col-md-6">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" name="jk" required>
              <option value="">-- Pilih --</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>  
          </div>
          <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Masukan Email.."  required>
          </div>
          <div class="form-group col-md-12">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Masukan Alamat ..." required></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username.." required>
            <div id="msg"></div>
          </div>
          <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password.." required>
          </div>
          <div class="form-group col-md-12">
            <p align="right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-info">Simpan</button>
            </p>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<div class="container">
<div class="modal fade" id="ModalForgot" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lupa Password</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('auth/forgot')?>" method="post" autocomplete="off">
        <div class="form-group col-md-12">
          <label for="email">Masukan E-Mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email.." required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info">Simpan</button>
      </div>
      </form>
    </div>

  </div>
</div>
</div>
<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/back/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/back/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/back/plugins/iCheck/icheck.min.js"></script>
<script>
$("#myselect").on("change", function() {
    $("#" + $(this).val()).show().siblings().hide();
})
</script>
<script type="text/javascript">
  $('document').ready(function(){
    $('#nis').change(function(){
     var nis = $(this).val();
     $.ajax ({
      url : "<?=base_url('auth/ceknis')?>",
      method : "POST",
      data :  {nis :nis },
      dataType: "text",
      success:function(html)
      {
        $('#availablity').html(html);
      }
    });
   });
  });
</script>
</body>
</html>
