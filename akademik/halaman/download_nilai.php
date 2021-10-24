<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=document_name.xls");
header("Pragma: no-cache");
header("Expires: 0"); 
include ("server.php");
$id_kelas=$_GET[id_kelas];
$id_smt=$_GET[id_smt];
$id_mk=$_GET[id_mk];
$th_akademik=$_GET[th_akademik];
$id_kurikulum=$_GET[id_kurikulum];
$id_prodi=$_GET[id_prodi];

$mk= "SELECT * FROM matkul where id_mk='$id_mk'";
		$mkcek=mysql_query($mk);

$mklis = mysql_fetch_array($mkcek);

$ambil_data= "SELECT *from prodi where id_prodi='$id_prodi' order by jenjang";
$ambil_datanya=mysql_query($ambil_data);
$data1 = mysql_fetch_array($ambil_datanya);

$perintah3="select *from jenjang where id_jenjang='$data1[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p align="center"><strong>DATA KRS SEMESTER <? echo $id_smt;?> TAHUN AKADEMIK <? echo $th_akademik;?><br>MATA KULIAH <? echo $mklis[matkul];?><br />PRODI <?echo $data3[jenjang]?>&nbsp;&nbsp;<?echo $data1[nama_prodi]?></p>
<table width="75%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr > 
	<td align="center"><strong>no</font></strong></td>
      <td align="center"><strong>id_krs_keperawatan</font></strong></td>
      <td align="center"><strong>nim</strong></td>
      <td align="center"><strong>nama</strong></td>
       <td align="center"><strong>nilai_khs_bobot</strong></td>
	   <td align="center"><strong>nilai_khs_huruf</strong></td>
    </tr>
    <?
	
$cekquery= "SELECT * FROM krs_khs where id_prodi='$id_prodi' and id_kelas='$id_kelas' and id_smt='$id_smt' and th_akademik='$th_akademik' and id_mk='$id_mk'";
		$hacekquery=mysql_query($cekquery);

while ($data = mysql_fetch_array($hacekquery)){
$cek= "SELECT * FROM tb_mahasiswa where id_mhs='$data[id_mhs]'and id_kelas='$id_kelas' order by id_mhs asc";
		$hacek=mysql_query($cek);

while ($kelas = mysql_fetch_array($hacek))
{
$no++;
 ?>  
   <tr > 
   <td align="center"><strong><? echo $no;?></font></strong></td>
      <td align="center"><strong><? echo $data['id_krs_perawat'];?></font></strong></td>
      <td align="center"><strong><? echo $kelas['nim'];?></font></strong></td>
      <td align="center"><strong><? echo $kelas['nama'];?></font></strong></td>
      <td align="center"><strong><? echo $data['nilai_khs_bobot'];?></font></strong></td>
	     <td align="center"><strong><? echo $data['nilai_khs_huruf'];?></font></strong></td>
  </tr>
   <?
}
}
?>
</table>
</body>
</html>
