<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=data_mahasiswa.xls");
header("Pragma: no-cache");
header("Expires: 0"); 

require("server.php");
 $th_akademik=$_GET[th_akademik];
  $id_kelas=$_GET[id_kelas];
  $id_kurikulum=$_GET[id_kurikulum];
   $id_prodi=$_GET[id_prodi];
   $id_smt=$_GET[id_smt];
    $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 

$cekquery_akademik= mysql_query("SELECT *from kurikulum where id_kurikulum='$id_kurikulum'");
$data_akademik = mysql_fetch_array($cekquery_akademik);

$cekquery_smt= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$data_smt = mysql_fetch_array($cekquery_smt);
 $data_smt[semester];
$cekquery_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas = mysql_fetch_array($cekquery_kelas);
 $data_kelas[kelas];
$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);

$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
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
<div align="center" class="unnamed1">
  <div align="center" class="unnamed1"><strong><br>
  <font color="#FF0000">DATA MAHASISWA PRODI <?echo $data_prodi[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?> <BR>
  Tahun Akademik <? echo $th_akademik; ?> Semester <? echo $data_smt[semester]; ?></font><br>
    </strong></div>
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" class="unnamed1">
<tr>
<td align="left">

</td>
<td align="right">

</td>
</tr>
</table>
<br>
<table width="20%" border="1" align="center" >
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">NIM</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nama</font></strong></td>
	       <td align="center"><strong><font color="#FFFFFF">Kelas</font></strong></td>
      
      </tr>
    <?
$cekquery_status= mysql_query("SELECT * from simpan_pin where id_prodi='$id_prodi' and id_kelas='$id_kelas' and semester='$data_smt[semester]' and th_akademik='$th_akademik'");
while($data_status = mysql_fetch_array($cekquery_status)) {

echo mysql_error();

$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo  $no; ?>&nbsp;</td>
      <td align="center"><? echo  $data_status[nim]; ?></td>
      <td align="left"><? echo  $data_status[nama]; ?></td>
	    <td align="center"><? echo  $data_status[kelas]; ?></td>
     
     
    </tr>
    <?
  }
  ?>
  </table>
</body>
</html>
