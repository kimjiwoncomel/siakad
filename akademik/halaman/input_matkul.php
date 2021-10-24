<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<?
include("server.php");
$id_prodi=$_GET[id_prodi];
$id_kurikulum=$_GET[id_kurikulum];
if ($_POST[proses]=="Simpan"){
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
$kode_mk=addslashes (stripslashes (strip_tags ($_POST['kode_mk'])));
$matkul=addslashes (stripslashes (strip_tags ($_POST['matkul'])));
$sks=addslashes (stripslashes (strip_tags ($_POST['sks'])));
$id_smt=$_POST['id_smt'];
$kata_ganjil=$_POST['kata_ganjil'];
$pengampu=addslashes (stripslashes (strip_tags ($_POST['pengampu'])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
$data_smt=mysql_fetch_array($ambil_smt);

if ((empty($kode_mk))or (empty($matkul))or (empty($sks)))
{
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul_tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum'></head><body><center><strong><font color='#FF0000'>Data tidak lengkap</font></strong></center></body></html>";
exit;
}
else
{
$cek_mk=mysql_query("SELECT *FROM matkul where kode_mk='$kode_mk' and id_prodi='$id_prodi2' and id_kurikulum='$id_kurikulum2' and id_smt='$id_smt'");
$data_mk1=mysql_fetch_array($cek_mk);
$data_mk=mysql_num_rows($cek_mk);

if ($data_mk>=1){
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul_tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum'></head><body><center><strong><font color='#FF0000'>Maaf kode MK $kode_mk sudah ada</font></strong></center></body></html>";
exit;
}
mysql_query("insert into matkul (id_prodi,id_kurikulum,id_smt,kode_mk,matkul,sks,pengampu,kata_ganjil) values ('$id_prodi2','$id_kurikulum2','$id_smt','$kode_mk','$matkul','$sks','$pengampu','$kata_ganjil')")
or die ("<center>Maaf, kode mata kuliah ($kode_mk) sudah ada<br>[<a href=\"home_admin.php?file=atur matkul tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum\">Ulang</a>]</center>");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum'></head><body><center><strong><font color='#0000FF'>Input berhasil</font></strong></center></body></html>";
exit;
}
}
?>
<? echo include "akademik.php";?>
<?
$ambil_prodi=mysql_query("SELECT *FROM prodi where id_prodi='$id_prodi'");
$data_prodi=mysql_fetch_array($ambil_prodi);

$ambil_kurikulum=mysql_query("SELECT *FROM kurikulum where id_kurikulum='$id_kurikulum'");
$data_kurikulum=mysql_fetch_array($ambil_kurikulum);
$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

?>
<h3 align="center">INPUT MATA KULIAH PRODI <? echo $data3[jenjang];?> <? echo $data_prodi[nama_prodi];?> KURIKULUM <? echo $data_kurikulum[nama_kurikulum];?></h3>
<form method="post" action=""><center>
<table align="center" width="90%" border="0" bordercolor="#000000" cellpadding="0" cellspacing="0">
<tr>
<td width="43%">Kode Mata Kuliah : </td>
<td width="57%"><input type="text" name="kode_mk" size="60" maxlength="100"></td>
</tr>
<tr>
<td>Nama Mata Kuliah : </td>
<td><input type="text" name="matkul" size="60" maxlength="100"></td>
</tr>
<tr>
<td>Jumlah SKS :</td>
<td><input type="text" name="sks" size="6" maxlength="4"></td>
</tr>
<tr>
<td>Semester Mata Kuliah : </td>
<td><?include "id_semester.php";?></td>
</tr>
<tr>
<td>kata Semester : </td>
<td><select name="kata_ganjil">
  <option value="Ganjil">Ganjil</option>
  <option value="Genap">Genap</option>
</select></td>
</tr>
<tr>
<td>Pengampu Mata Kuliah : </td>
<td><input type="text" name="pengampu" size="60" maxlength="100"></td>
</tr>
</table>
</center>
<center><input type="submit" value="Simpan" name="proses">
	  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
<input type="reset" value="Reset">&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kurikulum=$id_kurikulum&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]<br>
</center>
</form>
