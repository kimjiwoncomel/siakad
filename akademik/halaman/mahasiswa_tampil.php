<?
require("server.php");
  $id_prodi=$_GET[id_prodi];
 $th_akademik=$_GET[th_akademik];
  $id_kelas=$_GET[id_kelas];
 $id_kurikulum=$_GET[id_kurikulum];
  $semester=$_GET[semester];
    $id_smt=$_GET[id_smt];
	$sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 

if(empty($th_akademik)){
	echo "<center>Tahun Akademik tidak boleh kosong<br>";
	echo"<a href='home_admin.php?file=lihat mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Ulangi</a></center>";
	exit;
} 

$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);

$cek= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$dt_smt = mysql_fetch_array($cek);
$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
?>
<? echo include "akademik.php";?>
  <div align="center" class="unnamed1"><strong><br>
  <font color="#FF0000">DATA MAHASISWA PRODI <?echo $data3[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?></font><br>
    </strong></div>
	<center>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="unnamed1">
<tr>
<td align="left">

</td>
<td align="center">
[<? echo"<a href='./halaman/mahasiswa_download2.php?id_prodi=$id_prodi&th_akademik=$th_akademik&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&id_smt=$id_smt'>Download Data Mahasiswa</a>";?>]
</td>
</tr>
</table>
<br>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">NIM</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nama</font></strong></td>
	       <td align="center"><strong><font color="#FFFFFF">Kelas</font></strong></td>
    
      </tr>
    <?
$cekquery_status= mysql_query("SELECT * from simpan_pin where id_prodi='$id_prodi' and id_kelas='$id_kelas' and semester='$dt_smt[semester]' and th_akademik='$th_akademik'");
while($data_status = mysql_fetch_array($cekquery_status)) {

echo mysql_error();

$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo  $no; ?>&nbsp;</td>
      <td align="center"><? echo  $data_status[nim]; ?>&nbsp;&nbsp;</td>
      <td align="left"><? echo  $data_status[nama]; ?>&nbsp;&nbsp;</td>
	    <td align="center"><? echo  $data_status[kelas]; ?>&nbsp;&nbsp;</td>
  
     
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="10" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
  </center>

