 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input Jadwal</h4>
      </div>
      <div class="modal-body">
        <?php foreach ($content as $j){ ?>
        <form action="<?=base_url('j/update')?>" method="post" autocomplete="off" class="form-user">
          <input type="hidden" name="id_jadwal" value="<?=$j['id_jadwal']?>">
          <div class="form-group col-md-12">
            <label for="matpel">Mata Pelajaran</label>
            <input type="text" class="form-control" value="<?=$j['matpel']?>" name="matpel" placeholder="Masukan Mata Pelajaran.."  required>
          </div>
         <?php } ?>  
           <div class="form-group col-md-6">
            <label for="matpel">Guru</label>
            <select class="form-control" name="nip" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($guru as $g){ ?>
                <option value="<?=$g['nip']?>"><?=$g['nama_guru']?></option>    
              <?php } ?>
            </select> 
          </div>
          <?php foreach ($content as $j){ ?>
          <div class="form-group col-md-6">
            <label for="hari">Hari</label>
            <select class="form-control" name="hari" required>
              <option value="">-- Pilih --</option>
              <option value="Senin" <?php if($j['hari'] == 'Senin'){ echo 'selected'; } ?>>Senin</option>
              <option value="Selasa" <?php if($j['hari'] == 'Selasa'){ echo 'selected'; } ?>>Selasa</option>
              <option value="Rabu" <?php if($j['hari'] == 'Rabu'){ echo 'selected'; } ?>>Rabu</option>
              <option value="Kamis" <?php if($j['hari'] == 'Kamis'){ echo 'selected'; } ?>>Kamis</option>
              <option value="Jum'at" <?php if($j['hari'] == "Jum'at"){ echo 'selected'; } ?>>Jum'at</option>
              <option value="Sabtu" <?php if($j['hari'] == 'Sabtu'){ echo 'selected'; } ?>>Sabtu</option>
            </select> 
          </div>
          <div class="form-group col-md-6">
            <label for="waktu">Waktu</label>
            <input type="time" class="form-control" value="<?=$j['waktu']?>" name="waktu" required>
          </div>
          <div class="form-group col-md-6">
            <label for="waktu2">s/d</label>
            <input type="time" class="form-control" value="<?=$j['waktu2']?>" name="waktu2" required>
          </div>
          <?php } ?>
          <div class="form-group col-md-4">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" name="id_kelas" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($kelas as $k){ ?>
                <option value="<?=$k['id_kelas']?>"><?=$k['nama_kelas']?></option>    
              <?php } ?>
            </select>  
          </div>
           <?php foreach ($content as $j){ ?>
          <div class="form-group col-md-4">
            <label for="tahun">Tahun Akademik</label>
            <input type="text" class="form-control" value="<?=$j['tahun']?>" name="tahun" placeholder="Masukan Tahun.." required>
          </div>
          <div class="form-group col-md-4">
            <label for="semester">Semester</label>
            <select class="form-control" name="semester" required>
              <option value="">-- Pilih --</option>
              <option value="Ganjil" <?php if($j['semester'] == 'Ganjil'){ echo 'selected'; } ?>>Ganjil</option>
              <option value="Genap" <?php if($j['semester'] == 'Genap'){ echo 'selected'; } ?>>Genap</option>
            </select> 
          </div>
          <div class="form-group col-md-12">
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