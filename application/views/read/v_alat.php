<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Alat
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Alat</li>
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
                      <h4 class="modal-title">Input Alat</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?=base_url('alat/add')?>" method="post" autocomplete="off" class="form-user">
                        <div class="form-group col-md-6">
                          <label for="waktu">Key</label>
                          <input type="text" class="form-control" name="key" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="matpel">Penanggung Jawab</label>
                           <select class="form-control" name="nip" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($guru as $g){ ?>
                              <option value="<?=$g['nip']?>"><?=$g['nama_guru']?></option>    
                            <?php } ?>
                          </select> 
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
                    <th>Key</th>
                    <th>Penanggung Jawab</th>              
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['key']?></td>
                    <td><?=$d['nama_guru']?></td>
                    <td>
                     <div class="btn-group">
                      <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#" class='open_modals' id='<?=$d['id']?>'>Edit</a>
                        </li>
                      <li class="divider"></li>
                      <li><a href="<?=base_url('alat/delete/'.$d['id']) ?>" class="delete-link">Hapus</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            <?php } ?>              
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Key</th>
              <th>Penanggung Jawab</th>              
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
         <!-- Modal Update -->
        <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>
</div>
<!-- /.row -->
</section>
</div>
<!-- /.content -->
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

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('alat/edit')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalUpdate").html(ajaxData);
            $("#ModalUpdate").modal('show',{backdrop: 'true'});
           }
         });
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