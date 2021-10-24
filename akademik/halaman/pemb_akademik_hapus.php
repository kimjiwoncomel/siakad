<?
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
include("server.php");
$id_pemb_akademik=$_GET[id_pemb_akademik];
$id_prodi=$_GET[id_prodi];
if ($_POST[proses]=="Hapus"){
$id_prodi2=$_POST[id_prodi2];
$id_pemb_akademik2=$_POST[id_pemb_akademik2];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
mysql_query("delete from pembimbing_akademik where id_pemb_akademik='$id_pemb_akademik2'");
//echo"<center><a href='tampil_penandatangan_krs.php'>Proses Sukses</a></center>";
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2'></head><body><center>Proses Sukses...</center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<div align="center">
<form name="form1" method="post" action="">
  <?
$perintah="select *from pembimbing_akademik where id_pemb_akademik='$id_pemb_akademik'";
$tampil=mysql_query($perintah,$link);
echo mysql_error();

$data=mysql_fetch_array($tampil);
?>
  <table width="50%" border="0" align="center" class="unnamed1">
    <tr> 
      <td colspan="3"><strong>HAPUS PEMBIMBING AKADEMIK<br>
        </strong></td>
    </tr>
    <tr> 
      <td nowrap>NIP</td>
      <td>&nbsp;</td>
      <td><input name="nip" type="text" class="unnamed1" id="nip" value="<? echo $data[nip];?>" size="50" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Nama</td>
      <td>&nbsp;</td>
      <td><input name="nama" type="text" class="unnamed1" id="nama" value="<? echo $data[nama];?>" size="50" disabled></td>
    </tr>
    <tr> 
      <td nowrap>Jabatan</td>
      <td>&nbsp;</td>
      <td><input name="jabatan" type="text" class="unnamed1" id="jabatan" value="<? echo $data[jabatan];?>" size="50" disabled></td>
    </tr>	
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="proses" value="Hapus">
	  <input name="id_pemb_akademik2" type="hidden" value="<? echo $id_pemb_akademik;?>">
	  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
&nbsp;&nbsp;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">&nbsp;&nbsp;[<? echo "<a href=\"home_admin.php?file=atur pembimbing&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi\">&nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>" ?>]     </td>
    </tr>	
  </table>
</form>
</div>
