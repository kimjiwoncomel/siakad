<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<?
include("server.php");
if ($_POST[proses]=="Hapus"){
$id_smt2=$_POST[id_smt2];
$no_urut = addslashes (stripslashes (strip_tags ($_POST[no_urut])));
$semester = addslashes (stripslashes (strip_tags ($_POST[semester])));
$kata = addslashes (stripslashes (strip_tags ($_POST[kata])));
$ganjil_genap = addslashes (stripslashes (strip_tags ($_POST[ganjil_genap])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];
mysql_query("delete from semester_berapa where id_smt='$id_smt2'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur semester&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>

<div align="center">
<form name="form1" method="post" action="">
  <?
$id_smt=$_GET[id_smt];
$perintah="select *from semester_berapa where id_smt='$id_smt'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>HAPUS SEMESTER<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Semester (Dalam Angka Latin)</td>
      <td>&nbsp;</td>
      <td><input name="no_urut" type="text" class="unnamed1" id="no_urut" size="50" maxlength="10" value="<? echo $data[no_urut];?>" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Semester (Dalam Angka Romawi)</td>
      <td>&nbsp;</td>
      <td><input name="semester" type="text" class="unnamed1" id="semester" size="50" maxlength="10" value="<? echo $data[semester];?>" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Semester (Dalam Huruf)</td>
      <td>&nbsp;</td>
      <td><input name="kata" type="text" class="unnamed1" id="kata" size="50" maxlength="20" value="<? echo $data[kata];?>" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Genap / Ganjil</td>
      <td>&nbsp;</td>
      <td><input name="ganjil_genap" type="text" class="unnamed1" id="ganjil_genap" size="50" maxlength="20" value="<? echo $data[ganjil_genap];?>" disabled></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Hapus"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur semester&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id_smt2" type="hidden" value="<? echo $id_smt;?>">
          <input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
      </td>
    </tr>	
  </table>
  <?
  }
  ?>
</form>
</div>
