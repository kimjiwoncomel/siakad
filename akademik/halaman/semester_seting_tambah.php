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

if ($_POST[proses]=="Tambah"){
$no_urut = addslashes (stripslashes (strip_tags ($_POST[no_urut])));
$semester = addslashes (stripslashes (strip_tags ($_POST[semester])));
$kata = addslashes (stripslashes (strip_tags ($_POST[kata])));
$ganjil_genap = addslashes (stripslashes (strip_tags ($_POST[ganjil_genap])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];
$cek_no_urut = mysql_query("select * from semester_berapa where no_urut='$no_urut'");
$no_urutnya = mysql_num_rows($cek_no_urut);
if ($no_urutnya != 0){
echo "<center><br><br><font color='#FF0000'>Maaf, nomor urut $no_urut sudah ada</font><br></center>";
echo "<center><a href='home_admin.php?file=atur semester tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'><strong>Lihat</strong></a></center>";
exit;
}
else {
mysql_query("insert into semester_berapa (no_urut,semester,kata,ganjil_genap) values ('$no_urut','$semester','$kata','$ganjil_genap')");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur semester&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
}
?>
<? echo include "akademik.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>TAMBAH SEMESTER<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Semester (Dalam Angka Latin)</td>
      <td>&nbsp;</td>
      <td><input name="no_urut" type="text" class="unnamed1" id="no_urut" size="50" maxlength="10"></td>
    </tr>
    <tr> 
      <td nowrap>Semester (Dalam Angka Romawi)</td>
      <td>&nbsp;</td>
      <td><input name="semester" type="text" class="unnamed1" id="semester" size="50" maxlength="10"></td>
    </tr>
    <tr> 
      <td nowrap>Semester (Dalam Huruf)</td>
      <td>&nbsp;</td>
      <td><input name="kata" type="text" class="unnamed1" id="kata" size="50" maxlength="20"></td>
    </tr>
	
    <tr> 
      <td nowrap>Genap / Ganjil</td>
      <td>&nbsp;</td>
      <td><select name="ganjil_genap">
          <option value="Genap">Genap</option>
          <option value="Ganjil">Ganjil</option>
        </select>
</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Tambah"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur semester&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
      </td>
    </tr>	
  </table>
</form>
</div>
