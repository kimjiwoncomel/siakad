<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
 $id_prodi = $_GET['id_prodi'];
$th_akademik = $_GET['th_akademik'];
$id_smt = $_GET['id_smt'];

$token=$_GET['token'];
if ($_POST[proses]=="proses"){
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$th_akademik = $_POST['th_akademik'];
$id_smt = $_POST['id_smt'];
 $id_kelas = $_POST['id_kelas'];
$id_kurikulum=$_POST['id_kurikulum'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=hasil lihat mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&id_smt=$id_smt'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "mahasiswa.php";?>
<form name="proses" method="post" action="">
<center>
<table width="50%" border="0" align="center" bgcolor="#CC9933">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#FFFFFF">PILIH KELAS DAN KURIKULUM</font></strong></td>
	</tr>
  <tr>
    <td align="right">Kurikulum</td>
    <td align="center">:</td>
          <td align="left"><select name="id_kurikulum">
<?
include ("server.php");
		$ambil_smt="SELECT *FROM kurikulum where id_prodi='$id_prodi'";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_kurikulum];?>"><? echo $data_smt[nama_kurikulum];?></option>
	<?}?>
        </select></td>
</tr>
<tr>
    <td align="right">Kelas</td>
    <td align="center">:</td>
      <td align="left"><?include "id_kelas.php";?></td>
</tr>
</table>
</center>
<center><tr align="center"><td><input type="submit" value="proses" name="proses">
 <input name="id_smt" type="hidden" value="<? echo $id_smt;?>">
<input name="th_akademik" type="hidden" value="<? echo $th_akademik;?>">
<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" /></tr></td></center>
</form>
</body>
</html>
