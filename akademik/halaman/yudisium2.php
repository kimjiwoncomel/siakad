<?
include ("server.php");
$id_kurikulum=addslashes (stripslashes (strip_tags ($_POST['id_kurikulum'])));
$th_masuk=$_POST[th_masuk];
$id_program=$_POST[id_program];
$id_kelas=$_POST[id_kelas];
$id_mhs=$_POST[id_mhs];
$tempat = addslashes (stripslashes (strip_tags ($_POST[tempat])));
$tgl = addslashes (stripslashes (strip_tags ($_POST[tgl])));
$bln = addslashes (stripslashes (strip_tags ($_POST[bln])));
$thn = addslashes (stripslashes (strip_tags ($_POST[thn])));
$tgl_yudisium = addslashes (stripslashes (strip_tags ($_POST[tgl_yudisium])));
$bln_yudisium = addslashes (stripslashes (strip_tags ($_POST[bln_yudisium])));
$thn_yudisium = addslashes (stripslashes (strip_tags ($_POST[thn_yudisium])));
$no_ijazah = addslashes (stripslashes (strip_tags ($_POST[no_ijazah])));
$no_seri_ijazah = addslashes (stripslashes (strip_tags ($_POST[no_seri_ijazah])));
$jdl_karya_tulis =  addslashes (stripslashes (strip_tags($_POST[jdl_karya_tulis])));
$ambil_data= "SELECT *from tb_mahasiswa_d3 where id_mhs='$id_mhs'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2 = mysql_fetch_array($ambil_datanya);

?>
<html>
<head>
<title>Input Mata Kuliah</title>
</head>

<body>
<?
	$koma=',';
	$cek_mhs=mysql_query("SELECT *from karya_tulis where nim='$data2[nim]'");
	
	if (mysql_fetch_row($cek_mhs)==0){
	mysql_query("INSERT INTO karya_tulis (nim, 
	nama, 
	kelas, 
	th_masuk, 
	judul, 
	ttl, 
	tgl_yudisium, 
	no_seri_ijazah, 
	no_ijazah)
				VALUES ('$data2[nim]', 
				'$data2[nama]', 
				'$data2[kelas]', 
				'$data2[th_masuk]', 
				'$jdl_karya_tulis', 
				'$tempat$koma $tgl-$bln-$thn', 
				'$tgl_yudisium-$bln_yudisium-$thn_yudisium', 
				'$no_seri_ijazah', 
				'$no_ijazah')") ;
				echo mysql_error();
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_kema.php?file=yudisium3&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&id_program=$id_program&th_masuk=$th_masuk'></head><body>Data Tersimpan...</body></html>";
}
?>
</body>
</html>
