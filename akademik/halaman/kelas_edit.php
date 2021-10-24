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
if ($_POST[proses]=="Ubah"){
$id_kelas=$_POST[id_kelas];
$kelas=$_POST[kelas];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];
mysql_query("update kelas set kelas='$kelas' where id_kelas='$id_kelas'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur kelas&sinyal=$sinyal&id_prodi=$id_prodi&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <?
$id_kelas=$_GET[id_kelas];
$perintah="select *from kelas where id_kelas='$id_kelas'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="1" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>EDIT Program Kelas <br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nama Kurikulum</td>
      <td>&nbsp;</td>
      <td><input name="kelas" type="text" class="unnamed1" id="kelas" value="<? echo $data[kelas];?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Ubah"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur kelas&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id_kelas" type="hidden" value="<? echo $id_kelas;?>">    <input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">   </td>
    </tr>	
  </table>
  <?
  }
  ?>
</form>
</div>
