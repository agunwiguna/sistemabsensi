<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Info</h4>
      </div>
      <div class="modal-body">
        <?php foreach ($content as $i){ ?>
        <form action="<?=base_url('alat/update')?>" method="post" autocomplete="off" class="form-user">
          <input type="hidden" name="id" value="<?=$i['id']?>">
          <div class="form-group col-md-6">
            <label for="waktu">Key</label>
            <input type="text" class="form-control" name="key" value="<?=$i['key']?>" readonly>
          </div>
          <?php } ?>
          <div class="form-group col-md-6">
            <label for="matpel">Penanggung Jawab</label>
            <select class="form-control" name="nip" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($guru as $g){ ?>
                <option value="<?=$g['nip']?>"><?=$g['nama_guru']?></option>    
              <?php } ?>
            </select> 
          </div>
           <div class="form-group col-md-12">
            <label for="matpel"></label>
            <button type="submit" class="btn btn-info">Ubah</button>
          </div>
      </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

