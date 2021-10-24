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

$ambil_krs= mysql_query("SELECT *from krs_khs where id_smt='$id_smt' and id_kelas='$id_prodi' and th_akademik='$th_akademik'");
$data_krs=mysql_fetch_array($ambil_krs);

$ambil_semester= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$data_semester=mysql_fetch_array($ambil_semester);

$ambil_data= "SELECT *from prodi where id_prodi='$id_prodi' order by jenjang";
$ambil_datanya=mysql_query($ambil_data);
$data1 = mysql_fetch_array($ambil_datanya);

$perintah3="select *from jenjang where id_jenjang='$data1[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

?>
<? echo include "khs_krs.php";?>
<center>
  <strong>DATA MATA PELAJARAN SEMESTER <? echo $data_semester[semester];?> PRODI <? echo $data3[jenjang];?> <? echo $data1[nama_prodi];?></strong>
</center>
 <form name="form_edit_khs1" method="get" action=""> 			
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Kode Matkul</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Mata Kuliah</strong></div></td>
				  <td class="kotak"><div align="center"><strong>Keterangan</strong></div></td>
<?


$cekquery= "SELECT *from uts where id_prodi='$id_prodi' and  id_kelas='$id_kelas' and id_smt='$id_smt' and th_akademik='$th_akademik' group by id_mk order by id_smt asc";
$hacekquery=mysql_query($cekquery);
echo mysql_error();
$noUrut = 0;
while ($data = mysql_fetch_array($hacekquery)){
	$ambil_mk= mysql_query("select * from matkul where id_mk='$data[id_mk]' order by id_smt asc");
	$data_mk = mysql_fetch_array($ambil_mk);
	
	$noUrut++;

	?>
	
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$noUrut" ?></td>				  
				  <td class="kiribawah" align="left"><? echo"$data_mk[kode_mk]";?></td>
				  <td class="kiribawah" align="left"><? echo"$data_mk[matkul]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"<a href='home_admin.php?file=hasil input nilai uts&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas&id_mk=$data[id_mk]'><strong><font color='#0000FF'> Edit / Input Nilai UTS / Upload Nilai UTS</font></strong></a>";?></td>    
    <? 
//	}
	}
	?>	 
	</tr>
  </table>
 </form> 
