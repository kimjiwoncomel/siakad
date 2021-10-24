<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
  $id_prodi = addslashes (stripslashes (strip_tags ($_GET[id_prodi])));
 $id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
$id_smt = addslashes (stripslashes (strip_tags ($_GET[id_smt])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));

$ambil_mhs1= mysql_query("SELECT *from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas'");
$data_mhs1 = mysql_fetch_array($ambil_mhs1);

$ambil_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi=mysql_fetch_array($ambil_prodi);


$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

$ambil_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas=mysql_fetch_array($ambil_kelas);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_akademik=mysql_query("SELECT *FROM akademik where id_akademik='$id_akademik'");
echo mysql_error();
$data_akademik=mysql_fetch_array($ambil_akademik);
?>
<? echo include "khs_krs.php";?>
<div align="center"><font size="+2"><strong>Data Mahasiswa Prodi <? echo "$data3[jenjang]" ?>&nbsp;<? echo "$data_prodi[nama_prodi]" ?> 
  Kelas <? echo "$data_kelas[nama_kelas]" ?> Tahun Akademik <? echo "$th_akademik" ?> 
  </strong></font><br>
  <br>
</div>
<div align="right"></div>
<center>
<center>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>NIM</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nama</strong></div></td>
				  <td class="kotak"><div align="center"><strong>Aksi</strong></div></td>
<?
$ambil_mhs= mysql_query("SELECT *from krs_khs where id_prodi='$id_prodi' and th_akademik='$th_akademik' and id_smt='$data_smt[id_smt]'  group by id_mhs order by id_krs_perawat asc");
$noUrut = 0;
while ($data_mhs = mysql_fetch_array($ambil_mhs))
{

$mhs= mysql_query("SELECT *from tb_mahasiswa where id_mhs='$data_mhs[id_mhs]'");
$mhs2 = mysql_fetch_array($mhs);

$noUrut++;

	?>
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$noUrut" ?></td>				  
				  <td class="kiribawah" align="left"><? echo"$mhs2[nim]";?></td>
				  <td class="kiribawah" align="left"><? echo"$mhs2[nama]";?></td>
				  
      <td class="kiribawahkanan" align="center">
	<? echo"<a href='home_admin.php?file=cek hasil cetak nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&nim=$mhs2[nim]&semester=$data_smt[semester]&id_kelas=$id_kelas&th_akademik=$th_akademik&id_prodi=$id_prodi&id_smt=$id_smt'><strong><font color='#0000FF'> [Lihat KHS]</font></strong></a>";?> 
        &nbsp;&nbsp&nbsp; <? echo"<a href='./halaman/cetak_khs.php?nim=$mhs2[nim]&semester=$data_smt[semester]&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik' target='_blank'><strong><font color='#0000FF'>[Cetak KHS]</font></strong></a>";?> 
        &nbsp;&nbsp&nbsp; <? echo"<a href=./halaman/khs_excel_download.php?nim=$mhs2[nim]&semester=$data_smt[semester]&id_kelas=$id_kelas&th_akademik=$th_akademik><strong><font color='#0000FF'>[Download Permahasiswa]</font></strong></a>";?> 
      </td>    
    <? 
	}
	?>	 
	</tr>
</table>
