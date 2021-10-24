<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<? echo include "akademik.php";?>
  <div align="center"><font color="#FF0000">DATA TAHUN AKADEMIK </font></div>
      <br>
    </strong>
  <div align="center">[<? echo"<a href='home_admin.php?file=atur akademik tahun tambah&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Tambah</a>";?>] 
</div>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
<center>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
    
      <td width="38%"><strong><font color="#FFFFFF">Tahun Akademik </font></strong></td>
      <td width="62%"> <div align="center"><strong><font color="#FFFFFF">Proses</font></strong></div></td>
    </tr>
    <?
$perintah="select *from akademik ";
$tampil=mysql_query($perintah,$link);
$no=0;
while($data=mysql_fetch_array($tampil))
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
  
      <td height="24"><? echo"$data[akademik]"; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur akademik tahun edit&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id=$data[id_akademik]'>Edit</a>";?>]&nbsp;&nbsp;[<? echo"<a href='home_admin.php?file=atur akademik tahun hapus&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id=$data[id_akademik]'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>

</center>