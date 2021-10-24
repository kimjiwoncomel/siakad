<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<? echo include "akademik.php";?>

  <div align="center" class="unnamed1"><strong><br><font color="#FF0000">KURIKULUM</font><br>
    </strong></div>
<div align="center">[<? echo"<a href='home_admin.php?file=atur kurikulum tambah&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Tambah</a>";?>] 
</div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> <td><strong><font color="#FFFFFF">ID Kurikulum</font></strong></td>
      <td><strong><font color="#FFFFFF">Nama Kurikulum</font></strong></td>
      <td> <div align="center"><strong><font color="#FFFFFF">Proses</font></strong></div></td>
    </tr>
    <?
$perintah="select *from kurikulum where id_prodi='$id_prodi'";
$tampil=mysql_query($perintah,$link);
$no=0;
while($data=mysql_fetch_array($tampil))
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">
	<td height="24"><? echo"$data[id_kurikulum]"; ?>&nbsp;&nbsp;</td> 
      <td height="24"><? echo"$data[nama_kurikulum]"; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur kurikulum edit&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kurikulum=$data[id_kurikulum]&id_prodi=$id_prodi'>Edit</a>";?>]&nbsp;&nbsp;[<? echo"<a href='home_admin.php?file=atur kurikulum hapus&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kurikulum=$data[id_kurikulum]'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>

