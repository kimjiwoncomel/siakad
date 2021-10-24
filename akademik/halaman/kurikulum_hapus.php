<?
include("server.php");
if ($_POST[proses]=="Hapus"){
$id_kurikulum2=$_POST[id_kurikulum2];
$id_prodi=$_POST[id_prodi];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$nama_kurikulum = addslashes (stripslashes (strip_tags ($_POST[nama_kurikulum])));
mysql_query("delete from kurikulum where id_kurikulum='$id_kurikulum2'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur kurikulum&id_prodi=$id_prodi&&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>
<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET[id_prodi];
?>
<? echo include "akademik.php";?>
<div align="center">
<form name="form1" method="POST" action="">
  <?
$id_kurikulum=$_GET[id_kurikulum];
$perintah="select *from kurikulum where id_kurikulum='$id_kurikulum'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>HAPUS KURIKULUM<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Program Studi</td>
      <td>&nbsp;</td>
	  <?
	  $perintah2="select *from prodi where id_prodi='$data[id_prodi]'";
$tampil2=mysql_query($perintah2,$link);
echo mysql_error();
$data2=mysql_fetch_array($tampil2);

	  ?>
      <td><input name="id_kurikulum" type="text" class="unnamed1" id="id_kurikulum" value="<? echo $data2[jenjang];?>&nbsp;<? echo $data2[nama_prodi];?>" size="50" maxlength="20" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Nama Kurikulum</td>
      <td>&nbsp;</td>
      <td><input name="nama_kurikulum" type="text" class="unnamed1" id="nama_kurikulum" value="<? echo $data[nama_kurikulum];?>" size="50" maxlength="20" disabled></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Hapus">&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur kurikulum&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
          	  <input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
      </td>
    </tr>	
  </table>
  <?
  }
  ?>
</form>
</div>
