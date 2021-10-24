<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=document_name.xls");
header("Pragma: no-cache");
header("Expires: 0"); 
include ("server.php");
$id_prodi=$_GET[id_prodi];
 $id_kurikulum=$_GET[id_kurikulum];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="75%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr > 
      <td align="center"><strong>id_mk</font></strong></td>
      <td align="center"><strong>id_prodi</strong></td>
      <td align="center"><strong>id_kurikulum</strong></td>
	   <td align="center"><strong>id_smt</strong></td>
	   <td align="center"><strong>kode_mk</strong></td>
	   <td align="center"><strong>matkul</strong></td>
	   <td align="center"><strong>matkul(Bhs.Enggris)</strong></td>
       <td align="center"><strong>sks</strong></td>
       <td align="center"><strong>koordinator matkul</strong></td>
	   <td align="center"><strong>kata_ganjil</strong></td>
    </tr>
    <?
$cekquery= "SELECT * FROM matkul WHERE id_prodi='$id_prodi' and id_kurikulum='$id_kurikulum'";
		$hacekquery=mysql_query($cekquery);

$data = mysql_fetch_array($hacekquery);
 ?>  
   <tr > 
      <td align="center"><strong><? echo $data['id_mk'];?></font></strong></td>
      <td align="center"><strong><? echo $data['id_prodi'];?></font></strong></td>
      <td align="center"><strong><? echo $data['id_kurikulum'];?></font></strong></td>
	   <td align="center"><strong><? echo $data['id_smt'];?></font></strong></td>
	   <td align="center"><strong><? echo $data['kode_mk'];?></font></strong></td>
	   <td align="center"><strong><? echo $data['matkul'];?></font></strong></td>
	    <td align="center"><strong><? echo $data['matkul2'];?></font></strong></td>
      <td align="center"><strong><? echo $data['sks'];?></font></strong></td>
      <td align="center"><strong><? echo $data['pengampu'];?></font></strong></td>
	     <td align="center"><strong><? echo $data['kata_ganjil'];?></font></strong></td>
  </tr>

</table>
</body>
</html>
