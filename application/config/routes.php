<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['auth'] = 'Auth/index';
$route['auth/lg'] = 'Auth/login';
$route['auth/out'] = 'Auth/login';
$route['auth/up'] = 'Auth/update_akun';
$route['auth/pas'] = 'Auth/update_password';

//Registrasi
$route['auth/regs'] = 'Auth/register_siswa';
$route['auth/reg'] = 'Auth/registrasi_guru';
$route['auth/cekuser'] = 'Auth/cekUsername';
$route['auth/ceknis'] = 'Auth/ceknis';

//Lupa Password
$route['auth/forgot'] = 'Auth/forgotPassword';
$route['auth/as76yhjUio876Kl9876ghfrE'] = 'Auth/resetPassword';
$route['auth/updatepasword'] = 'Auth/updatePassword';

//Dashboard
$route['db'] = 'Welcome/index';

//Master
$route['m/sw'] = 'Master/siswa';
$route['m/kls'] = 'Master/kelas';
$route['m/gr'] = 'Master/guru';
$route['m/csw'] = 'Master/input_siswa';
$route['m/esw/(:any)'] = 'Master/edit_siswa/(:any)';
$route['m/isw'] = 'Master/proses_insert_siswa';
$route['m/igr'] = 'Master/proses_insert_guru';
$route['m/ikls'] = 'Master/proses_insert_kelas';
$route['m/usw'] = 'Master/proses_edit_siswa';
$route['m/ukls'] = 'Master/proses_edit_kelas';
$route['m/ugr'] = 'Master/proses_edit_guru';
$route['m/detgr'] = 'Master/detail_guru';
$route['m/detsw'] = 'Master/detail_siswa';
$route['m/upgr'] = 'Master/edit_guru';
$route['m/delkls/(:any)'] = 'Master/delete_kelas/(:any)';
$route['m/dsw/(:any)'] = 'Master/detail_siswa/(:any)';
$route['m/dels/(:any)'] = 'Master/delete_siswa/(:any)';
$route['m/delgr/(:any)'] = 'Master/delete_guru/(:any)';

//Jadwal
$route['j'] = 'Jadwal/index';
$route['j/add'] = 'Jadwal/add';
$route['j/detail'] = 'Jadwal/detail';
$route['j/edit'] = 'Jadwal/edit';
$route['j/update'] = 'Jadwal/update';
$route['j/delete/(:any)'] = 'Jadwal/delete/(:any)';

//Absensi
$route['absensi/list'] = 'Welcome/absensi';
$route['absensi/report'] = 'Welcome/report';
$route['a/delabsn/(:any)'] = 'Welcome/delete_absensi/(:any)';
$route['absensi/insert'] = 'Welcome/InsertAbsensi';
$route['a/v'] = 'Welcome/tampil_absen';
$route['a/insert'] = 'Welcome/insert_absensi';

//Info
$route['i'] = 'Info/index';
$route['i/add'] = 'Info/add';
$route['i/detail'] = 'Info/detail';
$route['i/edit'] = 'Info/edit';
$route['i/update'] = 'Info/update';
$route['i/delete/(:any)'] = 'Info/delete/(:any)';

//Alat
$route['alat'] = 'Utama/index';
$route['alat/add'] = 'Utama/add';
$route['alat/edit'] = 'Utama/edit';
$route['alat/update'] = 'Utama/update';
$route['alat/delete/(:any)'] = 'Utama/delete/(:any)';

//Setting
$route['setting'] = 'Welcome/setting';

//Konsultasi
$route['konsultasi'] = 'Welcome/konsultasi';
$route['konsul/detail'] = 'Welcome/detail_konsultasi';
$route['konsul/delete/(:any)'] = 'Welcome/delete_konsul/(:any)';

//Android
$route['j/list'] = 'Android/jadwal';
$route['i/list'] = 'Android/info';
$route['k/insert'] = 'Android/add_konseling';

//Settingan 
$route['(:any)'] = 'errors/show_404';
$route['(:any)/(:any)'] = 'errors/show_404';
$route['(:any)/(:any)/(:any)'] = 'errors/show_404';
