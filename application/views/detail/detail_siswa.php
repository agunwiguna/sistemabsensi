
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data Siswa</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">NIS</td>
                            <td width="50px">:</td>
                            <td><?=$d['nis'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Kelas</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_kelas'] ?></td>
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
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Agama</td>
                            <td width="50px">:</td>
                            <td><?=$d['agama'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Orang Tua</td>
                            <td width="50px">:</td>
                            <td><?=$d['parent'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Kontak Orang Tua</td>
                            <td width="50px">:</td>
                            <td><?=$d['kontakp'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Wali Kelas</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_guru'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">ID Absensi</td>
                            <td width="50px">:</td>
                            <td><?=$d['id_rfid'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>