<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
?>
<? echo include "khs_krs.php";?>

  <div align="center" class="unnamed1"><strong><br><font color="#FF0000">SETTING NILAI</font><br>
    </strong></div>
  <div align="center">[<? echo"<a href='home_admin.php?file=atur nilai tambah&id_prodi=$id_prodi&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Tambah User</a>";?>]
  </div>
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nilai Huruf</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nilai Minimal</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nilai Maksimal</font></strong></td>
      <td align="center"> <div align="center"><strong><font color="#FFFFFF">Aksi</font></strong></div></td>
    </tr>
    <?
$perintah="select *from bobot_nilai order by huruf";
$tampil=mysql_query($perintah,$link);
$no=0;
while($data=mysql_fetch_array($tampil))
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo"$no"; ?>&nbsp;</td>
      <td align="center"><? echo"$data[huruf]"; ?>&nbsp;</td>
      <td align="center"><? echo"$data[bobot_min]"; ?>&nbsp;&nbsp;</td>
      <td align="center"><? echo"$data[bobot_max]"; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur nilai edit&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_bobot=$data[id_bobot]&id_prodi=$id_prodi'>Edit</a>";?>]&nbsp;&nbsp;
	  [<? echo"<a href='home_admin.php?file=atur nilai hapus&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&&id_bobot=$data[id_bobot]&id_prodi=$id_prodi'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>

