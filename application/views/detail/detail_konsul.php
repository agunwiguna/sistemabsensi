
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Konsultasi</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $i){?>                 
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?=$i['nama'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?=$i['kontak'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Pesan</td>
                            <td width="50px">:</td>
                            <td><?=$i['pesan'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>