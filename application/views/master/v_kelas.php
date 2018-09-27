<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Kelas
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kelas</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
            </button>
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Input Data Kelas</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?=base_url('m/ikls')?>" method="post" autocomplete="off" class="form-user">
                        <div class="form-group col-md-12">
                          <label for="nama_kelas">Nama Kelas</label>
                          <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas.."  required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['nama_kelas']?></td>
                    <td>
                     <div class="btn-group">
                      <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a 
                          href="#"
                          data-id_kelas="<?=$d['id_kelas'] ?>"
                          data-nama_kelas="<?=$d['nama_kelas'] ?>"
                          data-toggle="modal" data-target="#edit-data">
                          Edit
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="<?=base_url('m/delkls/').$d['id_kelas']?>" class="delete-link">Hapus</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            <?php } ?>              
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
        <!-- Modal Ubah -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data</h4>
              </div>
              <div class="modal-body">
               <form action="<?=base_url('m/ukls')?>" method="post" autocomplete="off" class="form-user">
                <input type="hidden" id="id_kelas" name="id_kelas">
                <div class="form-group col-md-12">
                  <label for="nama_kelas">Nama Kelas</label>
                  <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukan Kelas.."  required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END Modal Ubah -->

  </div>

</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/back/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/back/dist/swt/sweetalert.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_kelas').attr("value",div.data('id_kelas'));
            modal.find('#nama_kelas').attr("value",div.data('nama_kelas'));
          });
      });
    </script>

  <script>
  jQuery(document).ready(function($){
    $('.delete-link').on('click',function(){
      var getLink = $(this).attr('href');
      swal({
        title: "Apa kamu yakin?",
        text: "Setelah di hapus, data akan hilang permanen!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Hapus!",
        cancelButtonText: "Batal !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = getLink;
        } else {
          swal("Batal", "Data Batal di Hapus :)", "error");
        }
      });
      return false;
    });
  });
</script>

    <script>
  //swal tambah berhasil
  <?php if($this->session->userdata('proses')){ ?>
    swal("Berhasil!", "Data Berhasl Tersimpan!", "success")
    <?php
    $this->session->unset_userdata('proses');
  } ?>

   //swal tambah gagal
   <?php if($this->session->userdata('gagal_proses')){ ?>
     swal("Gagal!", "Data Gagal Tersimpan!", "error")
     <?php
     $this->session->unset_userdata('gagal_proses');
   } ?>

    //swal edit berhasil
    <?php if($this->session->userdata('edit')){ ?>
     swal("Berhasil!", "Data Berhasl di Ubah!", "success")
     <?php
     $this->session->unset_userdata('edit');
   } ?>

    //swal edit gagal
    <?php if($this->session->userdata('gagal_edit')){ ?>
      swal("Gagal!", "Data Gagal di Ubah!", "error")
      <?php
      $this->session->unset_userdata('gagal_edit');
    } ?>

     //swal hapus berhasil
     <?php if($this->session->userdata('delete')){ ?>
      swal("Berhasil!", "Data Berhasl di Hapus!", "success")
      <?php
      $this->session->unset_userdata('delete');
    } ?>

     //swal hapus gagal
     <?php if($this->session->userdata('gagal_delete')){ ?>
       swal("Gagal!", "Data Gagal di Hapus!", "error")
       <?php
       $this->session->unset_userdata('gagal_delete');
     } ?>
   </script>