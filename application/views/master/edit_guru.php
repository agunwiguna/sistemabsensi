 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">Ubah Data</h4>
    </div>
    <div class="modal-body">  
     <form action="<?=base_url('m/ugr')?>" method="post" autocomplete="off" class="form-user">
      <?php foreach($content as $d){?> 
      <div class="form-group col-md-6">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" value="<?=$d['nip'] ?>" name="nip" readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="nama_guru">Nama Guru</label>
        <input type="text" class="form-control" value="<?=$d['nama_guru'] ?>" name="nama_guru" placeholder="Masukan Nama.."  required>
      </div>
      <div class="form-group col-md-6">
        <label for="kontak">Kontak</label>
        <input type="text" class="form-control" value="<?=$d['kontak'] ?>" name="kontak" placeholder="Masukan Kontak.."  required>
      </div>
      <div class="form-group col-md-6">
        <label for="jk">Jenis Kelamin</label>
        <select class="form-control" name="jk" required>
          <option value="Laki-Laki" <?php if($d['jk'] == 'Laki-Laki' || $d['jk'] == 'L') { echo 'selected'; } ?>>Laki-Laki</option>
          <option value="Perempuan" <?php if($d['jk'] == 'Perempuan' || $d['jk'] == 'P') { echo 'selected'; } ?>>Perempuan</option>
        </select>  
      </div>
      <div class="form-group col-md-12">
        <label for="quantity">Email</label>
        <input type="text" class="form-control" value="<?=$d['email'] ?>" name="email" placeholder="Masukan Email.."  required>
      </div>
      <div class="form-group col-md-12">
        <label>Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukan Alamat ..." required><?=$d['alamat'] ?></textarea>
      </div>
      <div class="form-group col-md-2">
        <button type="submit" class="btn btn-primary">Simpan</button>     
      </div>
    </div>
    <div class="modal-footer">

    </div>
  </form>    
<?php } ?>  
</div>
</div>
</div>