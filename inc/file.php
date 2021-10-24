<div id="left_h">
                         <?php
$page = (isset($_GET['file']))? $_GET['file'] : "main";
switch ($page) {
case 'halaman pembimbing': include "halaman/ambil_p_a.php"; break;
case 'hasil kuliah mhs': include "halaman/lihat_transkip.php"; break;
case 'hasil lihat krs': include "halaman/lihat_krs_mhs.php"; break;
case 'hasil lihat uts': include "halaman/lihat_uts_mhs.php"; break;
case 'lihat krs': include "halaman/lihat_detail_krs.php"; break;
case 'lihat uts': include "halaman/lihat_detail_uts.php"; break;
case 'input krs Paket': include "halaman/input_krs.php"; break;
case 'input krs NonPaket': include "halaman/input_krsxx.php"; break;
case 'lihat krs cetak': include "halaman/cetak_krs3.php"; break;
case 'cek krs input': include "halaman/cek_krs.php"; break;
case 'cek hapus krs': include "halaman/hapus_krs.php"; break;
case 'lihat nilai khs': include "halaman/lihat_khs_mhs.php"; break;
case 'lihat pin khs': include "halaman/lihat_pin_mhs.php"; break;
case 'tes': include "halaman/buat_pin.php"; break;
	case 'main' :
	default : include 'inc/index.php';	

}
?>
                        	
                      </div>