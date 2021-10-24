<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];

if ($_POST[proses]=="proses"){
$token2=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST[id_prodi];
 $th_akademik=$_POST[th_akademik];
  $id_kelas=$_POST[id_kelas];
 $id_kurikulum=$_POST[id_kurikulum];
  $semester=$_POST[semester];
    $id_smt=$_POST[id_smt];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=hasil lihat mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&th_akademik=$th_akademik&id_smt=$id_smt'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<form name="proses" method="post" action="">
<center>
<table width="50%" border="0" align="center" bgcolor="#CC9933">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#FFFFFF">PILIH PROGRAM STUDI</font></strong></td>
	</tr>
  <tr>
    <td align="right">Prodi Jurusan  </td>
    <td align="center">:</td>
      <td align="left"><?include "id_prodi.php";?></td>
</tr>
<tr>
    <td align="right">Kelas</td>
    <td align="center">:</td>
    <td align="left"><?include "id_kelas.php";?></td>
</tr>
<tr>
    <td align="right">Semester</td>
    <td align="center">:</td>
    <td align="left"><?include "id_semester.php";?></td>
</tr>
  <tr>
    <td align="right">Tahun Akademik</td>
    <td align="center">:</td>
    <td align="left"><select name="th_akademik">
<?
include "server.php";
		$ambil_smt="SELECT *FROM akademik ";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[akademik];?>"><? echo $data_smt[akademik];?></option>
	<?}?>
        </select></td>
</tr>
</table>
<tr > 
      <td align="center"><input name="proses"  value="proses" type="submit" /><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>"></td>
    </tr>
</center>
</form>

