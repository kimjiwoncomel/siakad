<? include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_user=$_GET['id_user'];

if ($_POST[proses]=="Tambah"){
$tahun = addslashes (stripslashes (strip_tags ($_POST[tahun])));
$kode = addslashes (stripslashes (strip_tags ($_POST[kode])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
mysql_query("insert into tahun (tahun,kode) values ('$tahun','$kode')");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur akademik tahun&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>


<div align="center">
<? echo include "khs_krs.php";?>
<form name="form1" method="post" action="">
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>TAMBAH KODE TAHUN <br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Tahun   </td>
      <td>&nbsp;</td>
      <td><input name="tahun" type="text" class="unnamed1" id="tahun" size="50" maxlength="20"></td>
    </tr>
	 <tr> 
      <td nowrap>KOde </td>
      <td>&nbsp;</td>
      <td><input name="kode" type="text" class="unnamed1" id="kode" size="50" maxlength="20"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Tambah"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur kode tahun&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]      </td>
    </tr>	
  </table>
</form>
</div>
