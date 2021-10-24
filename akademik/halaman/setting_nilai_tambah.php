<?
include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];

if ($_POST[proses]=="Tambah"){
$huruf = addslashes (stripslashes (strip_tags ($_POST[huruf])));
$bobot_min = addslashes (stripslashes (strip_tags ($_POST[bobot_min])));
$bobot_max = addslashes (stripslashes (strip_tags ($_POST[bobot_max])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];

if ((empty($huruf)) or (empty($bobot_min)) or (empty($bobot_max))){
echo "<center><br><br><font color='#FF0000'>Maaf, data belum lengkap</font><br></center>";
echo "<center><a href='home_admin.php?file=atur nilai tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'><strong>Ulang</strong></a></center>";
exit;
}
if($bobot_min>=$bobot_max){
echo "<center><br><br><font color='#FF0000'>Maaf, Nilai Minimal Lebih Besar Dibanding Nilai Maksimal</font><br></center>";
echo "<center><a href='home_admin.php?file=atur nilai tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'><strong>Ulang</strong></a></center>";
exit;
}
$cek_no_urut = mysql_query("select * from bobot_nilai where huruf='$huruf'");
$no_urutnya = mysql_num_rows($cek_no_urut);
if ($no_urutnya != 0){
echo "<center><br><br><font color='#FF0000'>Maaf, nilai $huruf sudah ada</font><br></center>";
echo "<center><a href='home_admin.php?file=atur nilai tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'><strong>Ulang</strong></a></center>";
exit;
}
else {
mysql_query("insert bobot_nilai (huruf,bobot_min,bobot_max) values ('$huruf','$bobot_min','$bobot_max')");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur nilai&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
}
?>
<? echo include "khs_krs.php";?>

<form name="form1" method="post" action="">

<center>
  <table width="50%" border="1" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>TAMBAH NILAI<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Huruf</td>
      <td>&nbsp;</td>
      <td><input name="huruf" type="text" class="unnamed1" size="2" maxlength="2"></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Minimal</td>
      <td>&nbsp;</td>
      <td><input name="bobot_min" type="text" class="unnamed1" size="6" maxlength="6"></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Maksimal</td>
      <td>&nbsp;</td>
      <td><input name="bobot_max" type="text" class="unnamed1" size="6" maxlength="6"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Tambah"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur nilai&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
      </td>
    </tr>	
  </table>
  </center>
</form>

