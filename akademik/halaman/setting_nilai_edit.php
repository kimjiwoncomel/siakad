<?
include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
if ($_POST[proses]=="Ubah"){
$id_bobot2=$_POST[id_bobot2];
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
echo "<center><a href='home_admin.php?file=atur nilai edit&id_prodi=$id_prodi&id_bobot=$id_bobot&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'><strong>Ulang</strong></a></center>";
exit;
}
if($bobot_min>=$bobot_max){
echo "<center><br><br><font color='#FF0000'>Maaf, Nilai Minimal Lebih Besar Dibanding Nilai Maksimal</font><br></center>";
echo "<center><a href='home_admin.php?file=atur nilai edit&id_bobot=$id_bobot&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'><strong>Ulang</strong></a></center>";
exit;
}
mysql_query("update bobot_nilai set huruf='$huruf', bobot_min='$bobot_min',bobot_max='$bobot_max' where id_bobot='$id_bobot2'") or die("<center><br><br><font color='#FF0000'>Maaf, nilai $huruf sudah ada</font><br><a href='home_admin.php?file=atur nilai edit&id_prodi=$id_prodi&id_bobot=$id_bobot&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'><strong>Ulang</strong></a></center>");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur nilai&id_prodi=$id_prodi&id_bobot=$id_bobot&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "khs_krs.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <?
$id_bobot=$_GET[id_bobot];
$perintah="select *from bobot_nilai where id_bobot='$id_bobot'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="1" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>EDIT NILAI<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Huruf</td>
      <td>&nbsp;</td>
      <td><input name="huruf" type="text" class="unnamed1" size="2" maxlength="2" value="<? echo $data[huruf];?>"></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Minimal</td>
      <td>&nbsp;</td>
      <td><input name="bobot_min" type="text" class="unnamed1" size="6" maxlength="6" value="<? echo $data[bobot_min];?>"></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Maksimal</td>
      <td>&nbsp;</td>
      <td><input name="bobot_max" type="text" class="unnamed1" size="6" maxlength="6" value="<? echo $data[bobot_max];?>"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Ubah">&nbsp;&nbsp;<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur nilai&id_prodi=$id_prodi&id_bobot=$id_bobot&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id_bobot2" type="hidden" value="<? echo $id_bobot;?>">
      </td>
    </tr>	
  </table>
  <?
  }
  ?>
</form>
</div>
