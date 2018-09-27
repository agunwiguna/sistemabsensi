
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Jadwal</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tahun</td>
                            <td width="50px">:</td>
                            <td><?=$d['tahun'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Semester</td>
                            <td width="50px">:</td>
                            <td><?=$d['semester'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Mata Pelajaran</td>
                            <td width="50px">:</td>
                            <td><?=$d['matpel'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Hari</td>
                            <td width="50px">:</td>
                            <td><?=$d['hari'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Waktu</td>
                            <td width="50px">:</td>
                            <td><?=date('H:i', strtotime($d['waktu']) );?> - <?=date('H:i', strtotime($d['waktu2']) );?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Kelas</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_kelas'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Guru</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_guru'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>