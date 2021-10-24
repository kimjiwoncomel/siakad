<? include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_user=$_GET['id_user'];

if ($_POST[proses]=="Hapus"){
$id=$_POST[id];
$tahun = addslashes (stripslashes (strip_tags ($_POST[tahun])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
mysql_query("delete from tahun where id='$id'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur akademik tahun&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>
<? echo include "khs_krs.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <?
$id=$_GET[id];
$perintah="select *from tahun where id='$id'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>HAPUS KODE Tahun <br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nama Tahun</td>
      <td>&nbsp;</td>
      <td><input name="tahun" type="text" class="unnamed1" id="tahun" value="<? echo $data[tahun];?>" size="50" maxlength="50" disabled></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Hapus"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur kode tahun&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id" type="hidden" value="<? echo $id;?>">      </td>
    </tr>	
  </table>
</form>
</div>