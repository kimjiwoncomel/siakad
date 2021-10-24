<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
$id_prodi = $_GET['id_prodi'];
$id_kelas = $_GET['id_kelas'];
$id_kurikulum = $_GET['id_kurikulum'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];

$ambil_mhs= mysql_query("SELECT *from tb_mahasiswa where id_kurikulum='$id_kurikulum' and id_program='$id_prodi' and id_kelas='$id_kelas'");
$data_mhs=mysql_fetch_array($ambil_mhs);

$ambil_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi=mysql_fetch_array($ambil_prodi);

$ambil_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas=mysql_fetch_array($ambil_kelas);

$ambil_semester= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$data_semester=mysql_fetch_array($ambil_semester);
?>
<html>
<head>
<title></title>
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body bgProperties="fixed">
<table width="100%" border="0" align="center">  
    <td>&nbsp;</td>
    <td><center><font size="4"><p class="tnr"><strong>MAHASISWA PRODI <? echo $data_prodi[jenjang];?> <? echo $data_prodi[nama_prodi];?> KELAS <? echo $data_kelas[nama_kelas];?> SEMESTER <? echo $data_semester[semester];?> TAHUN AKADEMIK <? echo $th_akademik;?> YANG SUDAH KRS</strong></p></font></center></td>
    <td>&nbsp;</td>
  </tr>
</table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nim</strong></div></td>
                  <td class="kotak"><div align="center"><strong>Nama</strong></div></td>
				    <td class="kotak"><div align="center"><strong>Proses Transkip</strong></div></td>
<?
$tampil_krs= "SELECT DISTINCT id_mhs, id_smt, th_akademik from krs_keperawatan_d3 where id_smt='$id_smt' and th_akademik='$th_akademik' ";
$hacekquery=mysql_query($tampil_krs);
echo mysql_error();
$nos=0;
while ($data_krs = mysql_fetch_array($hacekquery)){
$ambil_mhs2= mysql_query("SELECT *from tb_mahasiswa_d3 where id_mhs='$data_krs[id_mhs]' and id_kurikulum='$data_mhs[id_kurikulum]' and id_kelas='$data_mhs[id_kelas]'");
while ($data_mhs2=mysql_fetch_array($ambil_mhs2)){
$nos++;
	?>

                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$nos"; ?></td>
				  <td class="kiribawah" align="center"><? echo"$data_mhs2[nim]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"$data_mhs2[nama]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"<a href=home_kema.php?file=cek_KHSkema&nim=$data_mhs[nim]&id_kelas=$data_mhs[id_kelas]&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas><strong><font color='#0000FF'> Proses Transkip</font></strong></a>";?></td>
    <? 
	}
	}
	?>	 
	</tr>
  </table>
</body>
</html>
