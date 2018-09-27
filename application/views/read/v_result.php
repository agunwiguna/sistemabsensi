<!DOCTYPE html>
<html>
<head>
	<title>Cetak</title>
</head>
<body>
<meta http-equiv="REFRESH" content="5; url=<?=base_url('absensi/report')?>"> 
<center>
	<h4>DAFTAR HADIR SISWA</h4>
	<h4>SMKN 11 BANDUNG</h4>
	<h4>TAHUN AJARAN <?=date('Y')?></h4>
</center>
<table>
	<tr>
		<td><b>Mata Pelajaran</b></td>
		<td>: <?=$matpel?></td>
	</tr>
	<tr>
		<td><b>Kelas</b></td>
		<td>: <?=$nama_kelas?></td>
	</tr>
	<tr>
		<td><b>Pertemuan</b></td>
		<td>: <?=date('d-m-Y', strtotime($tanggal) );?></td>
	</tr>
</table>
<br>
<table border="1" align="center" style="border-collapse: collapse; border: 1px solid black;" width="780">
	<tr>
		<td align="center"><b>No.</b></td>
		<td align="center"><b>NIS</b></td>
		<td>&nbsp;<b>Nama</b></td>
		<td align="center"><b>Tanggal</b></td>
		<td align="center"><b>Waktu</b></td>
		<td align="center"><b>Status</b></td>
	</tr>
	<?php $no=1; foreach ($siswa as $s){ ?>
	<tr>
		<td align="center"><?=$no++?></td>
		<td align="center"><?=$s['nis']?></td>
		<td>&nbsp;<?=$s['nama']?></td>
		<td align="center"><?=date('d-m-Y', strtotime($s['tanggal']) );?></td>
		<td align="center"><?=date('H:i:s', strtotime($s['waktu']) );?></td>
		<td align="center"><?=$s['status']?></td>
	</tr>
	<?php } ?>
</table>
<br/>
<p align="right">
Guru Mata Pelajaran 
<br/>
<br/>
<br/>
<br/>
_________________
</p>
<script>
    window.print();
</script>
</body>
</html>