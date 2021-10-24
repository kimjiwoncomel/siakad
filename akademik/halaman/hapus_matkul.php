<?
require("server.php");
$id_prodi=$_GET[id_prodi];
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
?>
<?
include("server.php");
$id_prodi=$_GET[id_prodi];
$id_kurikulum=$_GET[id_kurikulum];
if ($_POST[proses]=="Hapus"){
$id_mk2=$_POST[id_mk2];
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
mysql_query("delete from matkul where id_mk='$id_mk2'");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2'></head><body><center><strong><font color='#FF0000'>Data Terhapus...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<form name="form1" method="post" action="">
  <?
$id_mk=$_GET[id_mk];
$perintah="select *from matkul where id_mk='$id_mk'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();
$data=mysql_fetch_array($tampil);
?>
<table align="center" width="90%">
<tr>
<td>Kode Mata Kuliah : </td>
<td><input type="text" name="kode_mk" value="<? echo $data[kode_mk];?>" disabled size="50" class="unnamed1"></td>
</tr>
<tr>
<td>Nama Mata Kuliah : </td>
<td><input type="text" name="matkul" value="<? echo $data[matkul];?>" disabled size="50" class="unnamed1"></td>
</tr>
<tr>
<td>Jumlah SKS : </td>
<td><input type="text" name="sks" value="<? echo $data[sks];?>" disabled size="50" class="unnamed1"></td>
</tr>
    
<tr>
<td>Pengampu Mata Kuliah : </td>
      <td><input disabled name="pengampu" type="text" class="unnamed1" value="<? echo $data[pengampu];?>" size="50" maxlength="100"></td>
</tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Hapus">	  
	  <input name="id_mk2" type="hidden" value="<? echo $id_mk;?>">
	  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kurikulum=$id_kurikulum&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]      </td>
    </tr>	
  </table>

</form>


