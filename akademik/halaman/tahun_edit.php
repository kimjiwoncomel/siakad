<? include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
$id_user=$_GET['id_user'];
if ($_POST[proses]=="Ubah"){
$id=$_POST[id];
$tahun=$_POST[tahun];
$kode=$_POST[kode];
 $sinyal = $_POST['sinyal'];
 $id_prodi=$_POST['id_prodi'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
mysql_query("update akademik set akademik='$tahun' where id_akademik='$id'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL='home_admin.php?file=atur akademik tahun&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <?
$id=$_GET[id];
$perintah="select *from akademik where id_akademik='$id'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();
$data=mysql_fetch_array($tampil);
?>
  <table width="50%" border="1" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>EDIT Tahun AKademik <br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nama Tahun</td>
      <td>&nbsp;</td>
      <td><input name="tahun" type="text" class="unnamed1" id="tahun" value="<? echo $data[akademik];?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Ubah"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur akademik tahun&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id" type="hidden" value="<? echo $id;?>">  <input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">     </td>
    </tr>	
  </table>

</form>
</div>
