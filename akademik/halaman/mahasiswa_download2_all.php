<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=data_mahasiswa.xls");
header("Pragma: no-cache");
header("Expires: 0"); 
require("server.php");
$id_prodi=$_GET[id_prodi];
 $th_masuk=$_GET[th_masuk];
 $id_kelas=$_GET[id_kelas];
 $id_kurikulum=$_GET[id_kurikulum];
 
$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);

$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

$cek_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$dt_kelas = mysql_fetch_array($cek_kelas);
?>
  <div align="center" class="unnamed1"><strong><br><font color="#FF0000">DATA MAHASISWA PRODI <?echo $data3[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?>  <br>
  Tahun Masuk <? echo $th_masuk; ?> kelas <strong><font color="#FF0000"><? echo $dt_kelas[kelas];?></font><br>
    </strong></div>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
     <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">NIM</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nama</font></strong></td>
	      
    </tr>
    <?

$cekquery_status= mysql_query("SELECT * from tb_mahasiswa where id_kurikulum='$id_kurikulum' and id_kelas='$id_kelas' and id_program='$id_prodi' and th_masuk='$th_masuk'
");
while($data_status = mysql_fetch_array($cekquery_status)) {

echo mysql_error();

$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td><? echo  $no; ?></td>
      <td><? echo  $data_status[nim]; ?></td>
      <td><? echo  $data_status[nama]; ?></td>
	    
     
    </tr>
    <?
  }
   ?>
  </table>

