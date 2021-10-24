<? include("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_user=$_GET['id_user'];
$id_prodi=$_GET['id_prodi'];

if ($_POST[proses]=="Tambah"){
$tahun = addslashes (stripslashes (strip_tags ($_POST[tahun])));
$kode = addslashes (stripslashes (strip_tags ($_POST[kode])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi=$_POST['id_prodi'];
mysql_query("insert into akademik (akademik) values ('$tahun')");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur akademik tahun&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";
echo mysql_error();
exit();
}
?>

<? echo include "akademik.php";?>
<div align="center">
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Tambah"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"> <input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur akademik tahun&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]      </td>
    </tr>	
  </table>
</form>
</div>
