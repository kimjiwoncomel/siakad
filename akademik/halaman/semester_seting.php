<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<? echo include "akademik.php";?>
  <div align="center" class="unnamed1"><strong><br><font color="#FF0000">SETTING SEMESTER</font><br>
    </strong></div>
  <div align="center">[<? echo"<a href='home_admin.php?file=atur semester tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'>Tambah </a>";?>] 
  </div>
  <center>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No_ID</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Semester (Dalam Angka Romawi)</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Semester (Dalam Huruf)</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Semester (Dalam Angka Latin)</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Ganjil / Genap</font></strong></td>
      <td align="center"> <div align="center"><strong><font color="#FFFFFF">Proses</font></strong></div></td>
    </tr>
    <?
$perintah="select *from semester_berapa order by no_urut";
$tampil=mysql_query($perintah,$link);
$no=0;
while($data=mysql_fetch_array($tampil))
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo"$data[no_urut]"; ?>&nbsp;</td>
      <td align="center"><? echo"$data[semester]"; ?>&nbsp;</td>
      <td align="center"><? echo"$data[kata]"; ?>&nbsp;&nbsp;</td>
      <td align="center"><? echo"$data[no_urut]"; ?>&nbsp;&nbsp;</td>
      <td align="center"><? echo"$data[ganjil_genap]"; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur semester edit&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_smt=$data[id_smt]&id_prodi=$id_prodi'>Edit</a>";?>]&nbsp;&nbsp;[<? echo"<a href='home_admin.php?file=atur semester hapus&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_smt=$data[id_smt]&id_prodi=$id_prodi'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
</center>
