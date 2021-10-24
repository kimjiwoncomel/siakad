<?
include("server.php");
if ($_POST[proses]=="Ubah"){
$id_kurikulum2=$_POST[id_kurikulum2];
$id_prodi=$_POST[id_prodi];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$nama_kurikulum = addslashes (stripslashes (strip_tags ($_POST[nama_kurikulum])));
mysql_query("update kurikulum set nama_kurikulum='$nama_kurikulum' where id_kurikulum='$id_kurikulum2'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur kurikulum&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
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
<form name="form1" method="post" action="">
  <?
$id_prodi=$_GET[id_prodi];
$id_kurikulum=$_GET[id_kurikulum];
$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);
$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
$perintah="select *from kurikulum where id_kurikulum='$id_kurikulum'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="1" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>EDIT KURIKULUM<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Program Studi</td>
      <td>&nbsp;</td>
      <td> <?echo $data3[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?>,&nbsp;<strong>diubah menjadi</strong> <?include "id_prodi.php";?></td>
    </tr>
    <tr> 
      <td nowrap>Nama Kurikulum</td>
      <td>&nbsp;</td>
      <td><input name="nama_kurikulum" type="text" class="unnamed1" id="nama_kurikulum" value="<? echo $data[nama_kurikulum];?>" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Ubah">&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur kurikulum&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
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
