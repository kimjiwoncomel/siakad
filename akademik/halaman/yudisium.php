<?
include ("server.php");
$id_mhs=$_GET[id_mhs];
 $id_kelas=$_GET[id_kelas];
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
$id_prodi = $_GET['id_prodi'];
$id_kelas = $_GET['id_kelas'];
$id_kurikulum = $_GET['id_kurikulum'];
$th_masuk = $_GET['th_masuk'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$ambil_data= "SELECT *from tb_mahasiswa where id_mhs='$id_mhs'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2 = mysql_fetch_array($ambil_datanya);
if ($_POST[proses]=="proses"){
$token2=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kelas = $_POST['id_kelas'];
$id_kurikulum = $_POST['id_kurikulum'];
$th_masuk = $_POST['th_masuk'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
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
$nilai =  addslashes (stripslashes (strip_tags($_POST[nilai])));
$ambil_data= "SELECT *from tb_mahasiswa where id_mhs='$id_mhs'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2 = mysql_fetch_array($ambil_datanya);
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
	no_ijazah,nilai)
				VALUES ('$data2[nim]', 
				'$data2[nama]', 
				'$data2[kelas]', 
				'$data2[th_masuk]', 
				'$jdl_karya_tulis', 
				'$tempat$koma $tgl-$bln-$thn', 
				'$tgl_yudisium-$bln_yudisium-$thn_yudisium', 
				'$no_seri_ijazah', 
				'$no_ijazah','$nilai')") ;
				echo mysql_error();
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=cek berkas mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_masuk=$th_masuk'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
}
?>


<html>
<head>
<title>Input Mata Kuliah</title>
</head>
<body>
<h3 align="center">Input Data Yudisium</h3>
<form method="post" action="">
<center>
<table align="center" width="70%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCC">
<tr>
<td>Nim : </td>
<td><?echo $data2[nim]?></td>
</tr>
<tr>
<td>Nama : </td>
<td><?echo $data2[nama]?></td>
</tr>
<tr>
<td>Kelas : </td>
<td><?echo $data2[kelas]?></td>
</tr>
<tr>
<td>Tahun Masuk : </td>
<td><?echo $data2[th_masuk]?></td>
</tr>
<tr>
<td>Tempat Tanggal Lahir : </td>
<td><input type="text" name="tempat" size="20" maxlength="20"> Tanggal <input type="text" maxlength="2" name="tgl" size="2"> Bulan <input type="text" name="bln" size="2" maxlength="3"> Tahun <input type="text" name="thn" size="4" maxlength="4"></td>
</tr>
<tr>
<td>Tanggal Yudisium : </td>
<td>Tanggal <input type="text" name="tgl_yudisium" size="2" maxlength="2"> Bulan <input type="text" name="bln_yudisium" size="2" maxlength="2"> Tahun <input type="text" name="thn_yudisium" size="4" maxlength="4"></td>
</tr>
<tr>
<td>Nomor Ijazah : </td>
<td><input type="text" name="no_ijazah" size="60"></td>
</tr>
<tr>
<td>Nomor Seri Ijazah : </td>
<td><input type="text" name="no_seri_ijazah" size="60"></td>
</tr>
<tr>
<td>Judul Karya Tulis : </td>
<td><textarea name="jdl_karya_tulis" cols="54" rows="2"></textarea></td>
</tr>
<tr>
<td>Nilai KTI : </td>
<td><input type="text" name="nilai" size="60"></td>
</tr>
</table>
</center>
<center><input type="submit"  name="proses"value="proses">
<input name="id_mhs" type="hidden" value="<?echo $data2[id_mhs]?>">
<input name="sinyal" type="hidden" value="<? echo $sinyal;?>">
<input name="token" type="hidden" value="<? echo $token;?>">
<input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>">
<input name="kategori" type="hidden" value="<? echo $kategori;?>" />
<input name="id_kelas" type="hidden" value="<? echo $id_kelas;?>">
<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
<input name="id_kurikulum" type="hidden" value="<? echo $id_kurikulum;?>">
<input name="th_masuk" type="hidden" value="<? echo $th_masuk;?>" />
&nbsp; &nbsp;<input type="reset" value="Reset">
</center>
</form>
</body>
</html>
