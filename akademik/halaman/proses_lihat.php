<?
require ("server.php");
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_mhs=$_GET[id_mhs];
$id_pilihan=$_GET[idprogram];

$ambil_jur= "SELECT *from tb_mahasiswa where id_mhs='$id_mhs'";
$si_jur=mysql_query($ambil_jur);
echo mysql_error();
$data_jurusan = mysql_fetch_array($si_jur);



$pin_enkrip = base64_decode(stripslashes (strip_tags ($_GET[p])));
$no_pin=$pin_enkrip;
$kuncinya=date ('YmdH');
$key="486";

$token=$_GET['token'];
$cek=md5(md5($no_pin).md5("$kuncinya$key"));


$ambil_data= "SELECT *from transkrip where nim='$data_jurusan[nim]'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2 = mysql_fetch_array($ambil_datanya);

$ambil_data3= "SELECT *from karya_tulis where nim='$data2[nim]'";
$ambil_datanya3=mysql_query($ambil_data3);
echo mysql_error();
$data3 = mysql_fetch_array($ambil_datanya3);

	if ($id_pilihan=='3'){
			echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=transkrip d3 gizi&id_mhs=$data_jurusan[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_jurusan[id_program]'></head><body></body></html>";
		}
		if ($id_pilihan=='6'){
			echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=transkrip d4 gizi&id_mhs=$data_jurusan[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_jurusan[id_program]'></head><body></body></html>";
		}
		if ($id_pilihan=='2'){
			echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=transkrip d3 kebidanan&id_mhs=$data_jurusan[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_jurusan[id_program]'></head><body></body></html>";
		}
		if ($id_pilihan=='5'){
			echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=transkrip d4 kebidanan&id_mhs=$data_jurusan[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_jurusan[id_program]'></head><body></body></html>";
		}
		if ($id_pilihan=='1'){
			echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=transkrip d3 keperawatan&id_mhs=$data_jurusan[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_jurusan[id_program]'></head><body></body></html>";
		}
		if ($id_pilihan=='4'){
			echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=transkrip d4 keperawatan&id_mhs=$data_jurusan[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_jurusan[id_program]'></head><body></body></html>";
		}
	?>	