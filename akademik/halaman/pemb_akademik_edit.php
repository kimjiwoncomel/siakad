<?
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
include("server.php");
$id_pemb_akademik=$_GET[id_pemb_akademik];
$id_prodi=$_GET[id_prodi];
if ($_POST[proses]=="Ubah"){
$id_prodi2=$_POST[id_prodi2];
$id_pemb_akademik2=$_POST[id_pemb_akademik2];
$nama=addslashes (stripslashes (strip_tags ($_POST['nama'])));
$nip=addslashes (stripslashes (strip_tags ($_POST['nip'])));
$jabatan=addslashes (stripslashes (strip_tags ($_POST['jabatan'])));
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];

$ambil_data= "SELECT *from prodi where id_prodi='$id_prodi2' order by jenjang";
$ambil_datanya=mysql_query($ambil_data);
$data1 = mysql_fetch_array($ambil_datanya);


$xxx = mysql_query("select * from pembimbing_akademik where id_prodi='$id_prodi2' and nip='$nip'");
if ($cek = mysql_num_rows($xxx) >= 1){
mysql_query("update pembimbing_akademik set nama='$nama', jabatan='$jabatan' where id_pemb_akademik='$id_pemb_akademik2'");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_prodi=$id_prodi2'></head><body><center>Proses Sukses...</center></body></html>";
exit;
}
else{
mysql_query("update pembimbing_akademik set nama='$nama', nip='$nip', jabatan='$jabatan' where id_pemb_akademik='$id_pemb_akademik2'");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_prodi=$id_prodi2'></head><body><center>Proses Sukses...</center></body></html>";
echo mysql_error();
exit();
}
}
?>
<? echo include "akademik.php";?>
<form name="form1" method="post" action="">
  <?
$perintah="select *from pembimbing_akademik where id_pemb_akademik='$id_pemb_akademik'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

$data=mysql_fetch_array($tampil);
?>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>EDIT PEMBIMBING AKADEMIK<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>NIP</td>
      <td>&nbsp;</td>
      <td><input name="nip" type="text" class="unnamed1" id="nip" value="<? echo $data[nip];?>" size="50"></td>
    </tr>
    <tr> 
      <td nowrap>Nama</td>
      <td>&nbsp;</td>
      <td><input name="nama" type="text" class="unnamed1" id="nama" value="<? echo $data[nama];?>" size="50"></td>
    </tr>
    <tr> 
      <td nowrap>Jabatan</td>
      <td>&nbsp;</td>
      <td><input name="jabatan" type="text" class="unnamed1" id="jabatan" value="<? echo $data[jabatan];?>" size="50"></td>
    </tr>	
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Ubah">
	  <input name="id_pemb_akademik2" type="hidden" value="<? echo $id_pemb_akademik;?>">
	  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]       </td>
    </tr>	
  </table>
</form>


