<?
include "server.php";
$id_prodi=$_GET[id_prodi];
$ambil_data= "SELECT *from prodi where id_prodi='$id_prodi' order by jenjang";
$ambil_datanya=mysql_query($ambil_data);
$data1 = mysql_fetch_array($ambil_datanya);

$perintah3="select *from jenjang where id_jenjang='$data1[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
 $id_prodi = $_GET['id_prodi'];
$token=$_GET['token'];
if ($_POST[proses]=="proses"){
$token2=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<div align="center"><strong>PILIH KURIKULUM PRODI <?echo $data3[jenjang]?>&nbsp;&nbsp;<?echo $data1[nama_prodi]?></strong> </div>
<form method="post" action=""><center>
<br><table align="center" width="40%" cellpadding="0" cellspacing="0">
<tr>
<td>Kurikulum : </td>
<td><select name="id_kurikulum">
<?
		$ambil_smt="SELECT *FROM kurikulum where id_prodi='$id_prodi'";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_kurikulum];?>"><? echo $data_smt[nama_kurikulum];?></option>
	<?}?>
        </select>
</td>
</tr>
</table>
</center>
<center><input type="submit" value="proses" name="proses">
<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>">
<input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" />
</center>
</form>
</body>
</html>
