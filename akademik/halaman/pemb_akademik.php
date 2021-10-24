<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
if ($_POST[proses]=="proses"){
$token2=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur pembimbing&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<div align="center"><strong>PILIH PROGRAM STUDI / PRODI</strong> </div>
<form method="post" action=""><center>
<br><table align="center" width="50%" cellpadding="0" cellspacing="0">
<tr>
<td>Program Studi : </td>
<td><? include "id_prodi.php"; ?></td>
</tr>
</table>
</center>
<center><input type="submit" value="proses" name="proses"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>">
<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" />
</center>
</form>

