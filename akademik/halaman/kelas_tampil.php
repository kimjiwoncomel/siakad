<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<? echo include "akademik.php";?>
  <div align="center"><font color="#FF0000">DAFTAR PROGRAM KELAS </font></div>
      <br>
    </strong>
  <div align="center"> <div align="center">[<? echo"<a href='home_admin.php?file=atur kelas tambah&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Tambah Kelas</a>";?>] 
  </div>
</div>
<center>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
    <td><strong><font color="#FFFFFF">ID Kelas </font></strong></td>
      <td><strong><font color="#FFFFFF">Nama Kelas </font></strong></td>
      <td> <div align="center"><strong><font color="#FFFFFF">Proses</font></strong></div></td>
    </tr>
    <?
	$cek_user=mysql_query("select * from kelas ");
 while ($hasilnya=mysql_fetch_array($cek_user))
	
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
   <td height="24"><? echo $hasilnya[id_kelas]; ?>&nbsp;&nbsp;</td>
      <td height="24"><? echo $hasilnya[kelas] ; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur kelas edit&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kelas=$hasilnya[id_kelas]&id_prodi=$id_prodi'>Edit</a>";?>]&nbsp;&nbsp;[<? echo"<a href='home_admin.php?file=atur kelas hapus&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kelas=$hasilnya[id_kelas]'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
</center>