<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
if ($_POST[proses]=="proses"){
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$th_akademik = $_POST['th_masuk'];
$id_smt = $_POST['id_smt'];
 $id_kelas = $_POST['id_kelas'];
$id_kurikulum=$_POST['id_kurikulum'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=cek mahasiswa praktek&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&id_smt=$id_smt'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "mahasiswa.php";?>
<p>HALAMAN INPUT UJIAN PRAKTEK</p>
<form name="proses" method="post" action="">
<center>
  <table width="35%" border="0" align="center" bgcolor="#CC9933">
    <tr> 
      <td align="center" colspan="3"><strong><font color="#FFFFFF">PILIH PROGRAM STUDI</font></strong></td>
    </tr>
    <tr> 
      <td align="right">Program Studi</td>
      <td align="center">:</td>
      <td align="left"> 
    <? include "id_prodi.php";?>
      </td>
    </tr>
	 <tr> 
      <td align="right">Kelas</td>
      <td align="center">:</td>
      <td align="left"> 
    <? include "id_kelas.php";?>
      </td>
    </tr>
	 <tr> 
      <td align="right">Kurikulum</td>
      <td align="center">:</td>
      <td align="left"> 
    <? include "id_kurikulum.php";?>
      </td>
    </tr>
	
	 <tr>
    <td align="left">Tahun Masuk</td>
    <td align="center">:</td>
    <td align="left"><input name="th_masuk" type="text" size="4" maxlength="4"></td>
</tr>
    <tr> 
      <td colspan="3" align="center"><input type="submit" value="proses" name="proses"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" /></td>
    </tr>
  </table>
  </center>
</form>

