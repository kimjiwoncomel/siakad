<?
include("server.php");

if ($_POST[proses]=="Tambah"){
$id_prodi = addslashes (stripslashes (strip_tags ($_POST[id_prodi])));
$nama_kurikulum = addslashes (stripslashes (strip_tags ($_POST[nama_kurikulum])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$ambil_kurikulum = "SELECT *from kurikulum where nama_kurikulum='$nama_kurikulum'";
$ambil_kurikulumnya=mysql_query($ambil_kurikulum);
$kurikulum = mysql_num_rows($ambil_kurikulumnya);
if ($kurikulum>=1){
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur kurikulum tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#0000FF'>Maaf, data sudah ada...</font></strong></center></body></html>";
exit;
}

mysql_query("insert into kurikulum (nama_kurikulum,id_prodi) values ('$nama_kurikulum','$id_prodi')");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur kurikulum&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<? echo include "akademik.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>TAMBAH KURIKULUM<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>Pilih Program Studi</td>
      <td>&nbsp;</td>
      <td><?include "id_prodi.php";?></td>
    </tr>
    <tr> 
      <td nowrap>Nama Kurikulum</td>
      <td>&nbsp;</td>
      <td><input name="nama_kurikulum" type="text" class="unnamed1" id="nama_kurikulum" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Tambah"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur kurikulum&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]
      </td>
    </tr>	
  </table>
</form>
</div>
