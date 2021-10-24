<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
?>
<? echo include "khs_krs.php";?>
  <div align="center"><font color="#FF0000">DATA KODE TAHUN</font></div>
      <br>
    </strong>
  </div>
  <div align="center">[<? echo"<a href='home_admin.php?file=atur kode tahun tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Tambah</a>";?>] 
</div>
<center>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
    
      <td width="38%"><strong><font color="#FFFFFF">Tahun </font></strong></td>
	  <td width="38%"><strong><font color="#FFFFFF">Kode </font></strong></td>
      <td width="62%"> <div align="center"><strong><font color="#FFFFFF">Proses</font></strong></div></td>
    </tr>
    <?
$perintah="select *from tahun ";
$tampil=mysql_query($perintah,$link);
$no=0;
while($data=mysql_fetch_array($tampil))
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
  
      <td height="24"><? echo"$data[tahun]"; ?>&nbsp;&nbsp;</td>
	    <td height="24"><? echo"$data[kode]"; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur kode tahun edit&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id=$data[id]'>Edit</a>";?>]&nbsp;&nbsp;[<? echo"<a href='home_admin.php?file=atur kode tahun hapus&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id=$data[id]'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>

</center>