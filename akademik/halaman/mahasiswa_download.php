<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=data_mahasiswa.xls");
header("Pragma: no-cache");
header("Expires: 0"); 
require("server.php");
$id_kurikulum=$_GET[id_kurikulum];
 $th_akademik=$_GET[th_akademik];
  $id_kelas=$_GET[id_kelas];
 $id_smt=$_GET[id_smt];
  $id_prodi=$_GET[id_prodi];
$cekquery_smt= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_smt = mysql_fetch_array($cekquery_smt);

$perintah3="select *from jenjang where id_jenjang='$data_smt[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.unnamed1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<div align="center" class="unnamed1"><strong><br>
  <font color="#FF0000">DATA MAHASISWA PRODI <?echo $data3[jenjang]?>&nbsp;<?echo $data_smt[nama_prodi]?> TAHUN AKADEMIK <?echo $th_akademik?></font> SEMESTER <?echo $id_smt?><br>
    </strong></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">NIM</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nama</font></strong></td>
	 
      <td align="center"><strong><font color="#FFFFFF">Kelas</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Tahun Masuk </font></strong></td>
    </tr>
    <?
$no=0;
$cekquery_status= mysql_query("SELECT distinct (id_mhs) from krs_khs where id_prodi='$id_prodi' and id_kurikulum='$id_kurikulum' and th_akademik= '$th_akademik' and id_smt='$id_smt' ");
while($data_status = mysql_fetch_array($cekquery_status)){
$cek= mysql_query("SELECT * from tb_mahasiswa where id_mhs='$data_status[id_mhs]' and id_kelas='$id_kelas' ");
while($data= mysql_fetch_array($cek)){


$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo  $no;?> &nbsp;</td>
      <td align="center"><? echo  $data[nim]; ?></td>
      <td align="left"><? echo  $data[nama]; ?></td>
	
      <td align="center"><? echo  $data[kelas];?></td>
	  
      <td align="center"><? echo  $data[th_masuk]; ?></td>
    </tr>
    <?
  }
  }
  ?>
    <tr> 
      <td colspan="10" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
</body>
</html>
