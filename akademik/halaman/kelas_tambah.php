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

if ($_POST[proses]=="Tambah"){
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];
$kelas = addslashes (stripslashes (strip_tags ($_POST[kelas])));
mysql_query("insert into kelas (kelas) values ('$kelas')");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur kelas&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>

<div align="center">
<form name="form1" method="post" action="">
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>TAMBAH PROGRAM KELAS <br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nama Program Kelas </td>
      <td>&nbsp;</td>
      <td><input name="kelas" type="text" class="unnamed1" id="kelas" size="50" maxlength="20"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Tambah"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"> <input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[[<? echo "<a href=\"home_admin.php?file=atur kelas&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]      </td>
    </tr>	
  </table>
</form>
</div>
