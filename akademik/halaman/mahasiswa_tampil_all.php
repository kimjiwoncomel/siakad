<?
require("server.php");
$id_prodi=$_GET[id_prodi];
   $th_masuk=$_GET[th_masuk];
  $id_kelas=$_GET[id_kelas];
 $id_kurikulum=$_GET[id_kurikulum];
  $semester=$_GET[semester];
  $reguler=$_GET[reguler];
     $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
  
 
if(empty($th_masuk)){
	echo "<center>Tahun Akademik tidak boleh kosong<br>";
	echo"<a href='home_admin.php?file=tahun masuk mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_smt=$id_smt&th_masuk=$th_masuk&id_kelas=$id_kelas'>Ulangi</a></center>";
	exit;
} 

$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);

$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

$cek= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$dt_smt = mysql_fetch_array($cek);

$cek_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$dt_kelas = mysql_fetch_array($cek_kelas);
?>
<? echo include "mahasiswa.php";?>
  <div align="center" class="unnamed1"><strong><br>
  <font color="#FF0000">DATA MAHASISWA PRODI <?echo $data4[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?> <BR>
  Tahun Masuk <? echo $th_masuk; ?> kelas <strong><font color="#FF0000"><? echo $dt_kelas[kelas];?></font></strong></font><br>
    </strong></div>
<center>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="unnamed1">
<tr>
<td align="left">

</td>
<td align="center">
[<? echo"<a href='./wpadmin/mahasiswa_download2_all.php?id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_masuk=$th_masuk&id_prodi=$id_prodi'>Download Data Mahasiswa</a>";?>]
</td>
</tr>
</table>
<br>
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
      <td align="center"><? echo  $no; ?>&nbsp;</td>
      <td align="center"><? echo  $data_status[nim]; ?>&nbsp;</td>
      <td align="left"><? echo  $data_status[nama]; ?>&nbsp;&nbsp;</td>
	    
     
     
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="10" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
</table>
</center>

