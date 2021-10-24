<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$th_sekarang=date ("Y");
$th_masuk_mhs=$th_sekarang;

if ($_POST[proses]=="proses"){
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_masuk])));
$token=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses nilai uap input&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "khs_krs.php";?>
<form name="proses" method="post" action="">
<center>
<table width="35%" border="0" align="center" bgcolor="#CC9933">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#FFFFFF">PILIH KELAS MAHASISWA</font></strong></td>
	</tr>
  <tr>
    <td align="left">Prodi / Jurusan</td>
    <td align="center">:</td>
    <td align="left"><?include ("id_prodi.php");?></td>
</tr>
  <tr>
    <td align="left">Kelas</td>
    <td align="center">:</td>
    <td align="left"><?include ("id_kelas.php");?></td>
</tr>
  <tr>
    <td align="left">Tahun Masuk</td>
    <td align="center">:</td>
    <td align="left"><input name="th_masuk" type="text" size="4" maxlength="4"></td>
</tr>
</table>
</center>
<center><td colspan="3" align="center"><input type="submit" value="proses" name="proses">
<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>">
<input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" /></td></center>
</form>
</body>
</html>
