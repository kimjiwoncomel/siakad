<?
require("server.php");
  $id_kurikulum=$_GET[id_kurikulum];
  $id_kelas=$_GET[id_kelas];
  $id_akademik=$_GET[th_akademik];
 $id_smt=$_GET[id_smt];
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 $id_prodi=$_GET['id_prodi'];

$ambil_mhs= mysql_query("SELECT *from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas'");
$data_mhs=mysql_fetch_array($ambil_mhs);

$ambil_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi' ");
$data_prodi=mysql_fetch_array($ambil_prodi);

$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

$ambil_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas=mysql_fetch_array($ambil_kelas);

$ambil_semester= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$data_semester=mysql_fetch_array($ambil_semester);

$ambil_tahun= mysql_query("SELECT *from akademik where id_akademik='$id_akademik'");
$data_tahun=mysql_fetch_array($ambil_tahun);
?>
<? echo include "mahasiswa.php";?>
<center><font size="4"><p class="tnr"><strong>MAHASISWA PRODI <? echo $data3[jenjang];?> <? echo $data_prodi[nama_prodi];?> KELAS <? echo $data_kelas[kelas];?>  TAHUN MASUK <? echo $id_akademik;?></strong></p></font></center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nim</strong></div></td>
                  <td class="kotak"><div align="center"><strong>Nama</strong></div></td>
				    <td class="kotak"><div align="center"><strong>Input Nilai Praktek</strong></div></td>
<?
$a= mysql_query("SELECT *from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas' and id_kurikulum='$id_kurikulum' and th_masuk='$id_akademik'");
while ($d = mysql_fetch_array($a))
{
$noUrut++;
	?>

                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$noUrut"; ?></td>
				  <td class="kiribawah" align="center"><? echo"$d[nim]";?></td>
				  <td class="kiribawahkanan"><? echo"$d[nama]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"<a href='home_admin.php?file=proses mahasiswa praktek&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_akademik=$d[th_masuk]&id_smt=$id_smt&nim=$d[nim]'>proses</a>";?></td>
    <? 
	}
	?>	 
	</tr>
  </table>
</body>
</html>
