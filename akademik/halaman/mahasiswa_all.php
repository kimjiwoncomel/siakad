<?
include ("tgl_indo.php");
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
if ($_POST[proses]=="proses"){
$token2=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kelas = $_POST['id_kelas'];
$id_kurikulum = $_POST['id_kurikulum'];
$th_masuk = $_POST['th_masuk'];
$id_smt = $_POST['id_smt'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=tampil tahun masuk mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_smt=$id_smt&th_masuk=$th_masuk&id_kelas=$id_kelas'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "mahasiswa.php";?>
<form name="proses" method="post" action="">
<center>
<table width="50%" border="0" align="center" bgcolor="#CC9933">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#FFFFFF">PILIH PROGRAM STUDI</font></strong></td>
	</tr>
  <tr>
    <td align="right">Program Studi</td>
    <td align="center">:</td>
      <td align="left"><?include "id_prodi.php";?></td>
</tr>
<tr>
    <td align="right">Kelas</td>
    <td align="center">:</td>
    <td align="left"><?include "id_kelas.php";?></td>
</tr>
<tr>
    <td align="right">Kurikulum</td>
    <td align="center">:</td>
    <td align="left"><select name="id_kurikulum">
<?
include ("server.php");
		$ambil_smt="SELECT *FROM kurikulum ";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_kurikulum];?>"><? echo $data_smt[nama_kurikulum];?></option>
	<?}?>
        </select></td>
</tr>
  <tr>
    <td align="right">Tahun Masuk </td>
    <td align="center">:</td>
    <td align="left"><input type="text" size="9" maxlength="9" name="th_masuk" ></td>
</tr>
</table>
</center>
<center><tr align="center"><td><input type="submit" value="proses" name="proses"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">
&nbsp; &nbsp;<input type="reset" value="Reset"></tr></td></center>
</form>
</body>
</html>
