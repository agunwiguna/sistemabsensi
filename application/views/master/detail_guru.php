
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data Guru</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">NIP</td>
                            <td width="50px">:</td>
                            <td><?=$d['nip'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_guru'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Jenis Kelamin</td>
                            <td width="50px">:</td>
                            <td><?=$d['jk'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Alamat</td>
                            <td width="50px">:</td>
                            <td><?=$d['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?=$d['kontak'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Email</td>
                            <td width="50px">:</td>
                            <td><?=$d['email'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>