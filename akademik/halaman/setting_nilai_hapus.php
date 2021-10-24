<?
include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
if ($_POST[proses]=="Hapus"){
$id_bobot2=$_POST[id_bobot2];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];
mysql_query("delete from bobot_nilai where id_bobot='$id_bobot2'");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur nilai tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
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
      <td colspan="3"><strong>HAPUS NILAI<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Huruf</td>
      <td>&nbsp;</td>
      <td><input name="huruf" type="text" class="unnamed1" size="2" maxlength="2" value="<? echo $data[huruf];?>" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Minimal</td>
      <td>&nbsp;</td>
      <td><input name="bobot_min" type="text" class="unnamed1" size="6" maxlength="6" value="<? echo $data[bobot_min];?>" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Nilai Maksimal</td>
      <td>&nbsp;</td>
      <td><input name="bobot_max" type="text" class="unnamed1" size="6" maxlength="6" value="<? echo $data[bobot_max];?>" disabled></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Hapus">&nbsp;&nbsp;<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur nilai&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id_bobot2" type="hidden" value="<? echo $id_bobot;?>">
      </td>
    </tr>	
  </table>
  <?
  }
  ?>
</form>
</div>
