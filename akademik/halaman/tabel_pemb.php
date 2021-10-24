<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=tabel_pembimbing.xls");
header("Pragma: no-cache");
header("Expires: 0"); 
include ("server.php");
$id_prodi=$_GET['id_prodi'];

?>

<table width="75%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr > 
      <td align="center"><strong>id_pemb_akademik</font></strong></td>
      <td align="center"><strong>id_prodi</strong></td>
      <td align="center"><strong>nama</strong></td>
	   <td align="center"><strong>nip</strong></td>
	   <td align="center"><strong>jabatan</strong></td>
    </tr>
    <?
	
$no=0;
$cekquery= "SELECT * FROM pembimbing_akademik WHERE id_prodi='$id_prodi'";
		$hacekquery=mysql_query($cekquery);
$data = mysql_fetch_array($hacekquery);
 ?>  
   <tr > 
      <td align="center"><strong><? echo $data['id_pemb_akademik'];?></font></strong></td>
      <td align="center"><strong><? echo $data['id_prodi'];?></font></strong></td>
      <td align="center"><strong><? echo $data['nama'];?></font></strong></td>
	   <td align="center"><strong><? echo $data['nip'];?></font></strong></td>
	   <td align="center"><strong><? echo $data['jabatan'];?></font></strong></td>
  </tr>

</table>

