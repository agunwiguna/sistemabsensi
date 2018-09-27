<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Info</h4>
      </div>
      <div class="modal-body">
        <?php foreach ($info as $i){ ?>
        <form action="<?=base_url('i/update')?>" method="post" autocomplete="off" class="form-user">
          <input type="hidden" name="id" value="<?=$i['id']?>">
          <div class="form-group col-md-12">
            <label for="waktu">Judul</label>
            <input type="text" class="form-control" name="title" value="<?=$i['title']?>" required>
          </div>
          <div class="form-group col-md-12">
            <label for="matpel">Deskripsi</label>
            <textarea name="description" rows="10" cols="122"><?=$i['description']?></textarea>
          </div>
           <div class="form-group col-md-12">
            <label for="matpel"></label>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
      </div>
        <div class="modal-footer">
        </div>
      </form>
       <?php } ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

