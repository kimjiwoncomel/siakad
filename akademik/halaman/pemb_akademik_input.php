<?
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
include("server.php");
$id_prodi=$_GET[id_prodi];
if ($_POST[proses]=="Input"){
$id_prodi2=$_POST[id_prodi2];
$nama=addslashes (stripslashes (strip_tags ($_POST['nama'])));
$nip=addslashes (stripslashes (strip_tags ($_POST['nip'])));
$jabatan=addslashes (stripslashes (strip_tags ($_POST['jabatan'])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$xxx = mysql_query("select * from pembimbing_akademik where id_prodi='$id_prodi2' and nip='$nip'");
if ($cek = mysql_num_rows($xxx) != 0){
$data=mysql_fetch_array($xxx);
echo "<center>Maaf, Pembimbing dengan NIP ($data[nip]) sudah ada.<br><a href='home_admin.php?file=atur pembimbing tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_prodi=$id_prodi2'>Ulang</a></center>";
exit;
}
else
mysql_query("insert into pembimbing_akademik (id_prodi, nama, nip, jabatan) values ('$id_prodi2', '$nama', '$nip', '$jabatan')");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_prodi=$id_prodi2'></head><body><center>berhasil</center></body></html>";
exit();
}
?>
<? echo include "akademik.php";?>
<form name="form1" method="post" action="">
<?
$ambil_data= "SELECT *from prodi where id_prodi='$id_prodi' order by jenjang";
$ambil_datanya=mysql_query($ambil_data);
$data1 = mysql_fetch_array($ambil_datanya);

$perintah3="select *from jenjang where id_jenjang='$data1[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
?><center>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>INPUT NAMA PEMBIMBING PRODI <?echo $data3[jenjang]?>&nbsp;<?echo $data1[nama_prodi]?><br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>NIP</td>
      <td>&nbsp;</td>
      <td><input name="nip" type="text" class="unnamed1" id="nip" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td nowrap>Nama</td>
      <td>&nbsp;</td>
      <td><input name="nama" type="text" class="unnamed1" id="nama" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td nowrap>Tugas</td>
      <td>&nbsp;</td>
      <td><input name="jabatan" type="text" class="unnamed1" size="50" maxlength="100"></td>
    </tr>	
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Input">
	  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]      </td>
    </tr>	
  </table>
  </center>
</form>

