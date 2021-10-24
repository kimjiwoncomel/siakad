<?
require("server.php");
    $id_kurikulum=$_GET[id_kurikulum];
   $id_kelas=$_GET[id_kelas];
  $th_masuk=$_GET[th_akademik];
 $id_smt=$_GET[id_smt];
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];


if(empty($th_masuk)){
	echo "<center>Tahun Akademik tidak boleh kosong<br>";
	echo"<a href='home_admin.php?file=lihat mahasiswa krs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token'>Ulangi</a></center>";
	exit;
} 

$cekquery_smt= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_smt = mysql_fetch_array($cekquery_smt);

$perintah3="select *from jenjang where id_jenjang='$data_smt[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

?>
<? echo include "mahasiswa.php";?>
  <div align="center" class="unnamed1"><strong><br>
  <font color="#FF0000">DATA MAHASISWA PRODI <? echo $data3[jenjang]; ?>&nbsp;<? echo $data_smt[nama_prodi];?> <br />
    </strong></div>
	<center>

<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">NIM</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nama</font></strong></td>
	 
      <td align="center"><strong><font color="#FFFFFF">Kelas</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Tahun Masuk </font></strong></td>
	    <td align="center"><strong><font color="#FFFFFF">PROSES </font></strong></td>
    </tr>
    <?
$no=0;
$cekquery_status= mysql_query("SELECT * from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas' and th_masuk= '$th_masuk' and id_kurikulum='$id_kurikulum' ");
while($data_status = mysql_fetch_array($cekquery_status)){

$cek= mysql_query("SELECT * from transkrip where id_mhs='$data_status[id_mhs]' group by id_mhs  ");
while($data= mysql_fetch_array($cek)){


$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo  $no;?> &nbsp;</td>
      <td align="center"><? echo  $data[nim]; ?>&nbsp;&nbsp;</td>
      <td align="left"><? echo  $data[nama]; ?>&nbsp;&nbsp;</td>
	
      <td align="center"><? echo  $data[kelas];?>&nbsp;&nbsp;</td>
	  
      <td align="center"><? echo  $data[th_masuk]; ?>&nbsp;</td>
	     <td align="center">[<? echo"<a href='home_admin.php?file=proses halaman lihat&id_mhs=$data[id_mhs]&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&idprogram=$data_status[id_program]' target='_blank'>LIHAT</a>";?>] [<? echo"<a href='./halaman/proses_cetak.php?id_mhs=$data[id_mhs]&idprogram=$data_status[id_program]' target='_blank'>CETAK</a>";?>]</td>
    </tr>
    <?
  }
  }
  ?>
    <tr> 
      <td colspan="10" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
</center>
