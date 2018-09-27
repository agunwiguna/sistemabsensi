<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konseling
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Konseling</li>
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
            </div>  
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kontak</th>              
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['nama']?></td>
                    <td><?=$d['kontak']?></td>
                    <td>
                     <a href="#" class="btn btn-info btn-sm open_modals" id='<?=$d['id']?>'>
                      <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <a href="<?=base_url('konsul/delete/'.$d['id']) ?>" class="btn btn-danger btn-sm delete-link">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>                    
                </td>
              </tr>
            <?php } ?>              
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Kontak</th>           
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
          url: "<?=base_url('konsul/detail')?>",
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