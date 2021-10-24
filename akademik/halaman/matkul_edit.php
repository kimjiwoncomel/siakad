<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET[id_prodi];
?>
<?
include("server.php");
 $id_prodi=$_GET[id_prodi];
 $id_kurikulum=$_GET[id_kurikulum];
$id_smt=$_GET[id_smt];

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
$data_smt=mysql_fetch_array($ambil_smt);


if ($_POST[proses]=="Ubah"){
$id_mk2=$_POST[id_mk2];
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
$kode_mk = addslashes (stripslashes (strip_tags ($_POST[kode_mk])));
$matkul = addslashes (stripslashes (strip_tags ($_POST[matkul])));
$sks = addslashes (stripslashes (strip_tags ($_POST[sks])));
$id_smt2 = addslashes (stripslashes (strip_tags ($_POST[id_smt])));
$pengampu = addslashes (stripslashes (strip_tags ($_POST[pengampu])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];

mysql_query("update matkul set kode_mk='$kode_mk', matkul='$matkul', sks='$sks', id_smt='$id_smt2', pengampu='$pengampu' where id_mk='$id_mk2'")
or die ("<center>Maaf, kode mata kuliah ($kode_mk) sudah ada<br>[<a href=\"home_admin.php?file=atur_matkul_edit&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2\">Ulang</a>]</center>");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
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

while($data=mysql_fetch_array($tampil))
{
?>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>EDIT MATA KULIAH<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Kode Mata Kuliah</td>
      <td>&nbsp;</td>
      <td><input name="kode_mk" type="text" class="unnamed1" value="<? echo $data[kode_mk];?>" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td nowrap>Nama Mata Kuliah</td>
      <td>&nbsp;</td>
      <td><input name="matkul" type="text" class="unnamed1" value="<? echo $data[matkul];?>" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td nowrap>Jumlah SKS</td>
      <td>&nbsp;</td>
      <td><input name="sks" type="text" class="unnamed1" value="<? echo $data[sks];?>" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td nowrap>Semester Mata Kuliah</td>
      <td>&nbsp;</td>
      <td><? echo "$data_smt[semester] &nbsp; &nbsp; <b>diubah menjadi </b>&nbsp;&nbsp;";include "id_semester.php";?></td>
    </tr>
    <tr> 
      <td nowrap>Dosen Pengampu</td>
      <td>&nbsp;</td>
      <td><input name="pengampu" type="text" class="unnamed1" value="<? echo $data[pengampu];?>" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Ubah"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kurikulum=$id_kurikulum&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
	  <input name="id_mk2" type="hidden" value="<? echo $id_mk;?>">
	  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
      </td>
    </tr>	
  </table>
  <?
  }
  ?>
</form>
</div>
</body>
</html>
