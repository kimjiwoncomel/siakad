<?
include ("server.php");

 $id_mk=$_GET[id_mk];
  $id_krs_perawat=$_GET[id_krs_perawat];
   $id_kurikulum = addslashes (stripslashes (strip_tags ($_GET[id_kurikulum])));
 $id_smt = addslashes (stripslashes (strip_tags ($_GET[id_smt])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));
 $nim = addslashes (stripslashes (strip_tags ($_GET[nim])));
  $id_akademik = addslashes (stripslashes (strip_tags ($_GET[id_akademik])));
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];

 $id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
 
$krs= mysql_query("SELECT * from krs_khs where id_prodi='$id_prodi' and id_krs_perawat='$id_krs_perawat'");
echo mysql_error();
$data_krs2 = mysql_fetch_array($krs);

$matkul= mysql_query("SELECT * from matkul where id_mk='$id_mk'");
echo mysql_error();
$data_kul = mysql_fetch_array($matkul);


$ambil_mhs3= mysql_query("SELECT * from pembimbing_akademik where id_pemb_akademik='$data_krs2[id_pemb_akademik]'");
echo mysql_error();
$data_mhs3 = mysql_fetch_array($ambil_mhs3);

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where  id_program='$id_prodi' and id_kelas='$id_kelas' and id_kurikulum='$id_kurikulum' and nim='$nim' ");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$nama = addslashes (stripslashes (strip_tags ($data_mhs[nama])));
		if($id_mk ==""){
		echo "<center>Mata Kuliah belum di pilih<br></center>";
		echo "<center><a href='home_admin.php?file=proses mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_akademik=$th_akademik&id_smt=$id_smt&nim=$nim&id_mk=$id_mk&id_krs_perawat=$id_krs_perawat&id_akademik=$id_akademik'>Ulangi</a></center>";
		exit;
		}		
	
	
$cek_krs= mysql_query("SELECT * from transkrip where id_mhs='$data_mhs[id_mhs]' and id_mk='$id_mk' and th_akademik='$th_akademik' and id_krs_perawat='$id_krs_perawat'");
echo mysql_error();
$data_krs = mysql_fetch_array($cek_krs);
$krsnya2 = mysql_num_rows($cek_krs);
if ($krsnya2>=1){
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_akademik=$th_akademik&id_smt=$id_smt&nim=$nim&id_mk=$id_mk&id_krs_perawat=$id_krs_perawat&id_akademik=$id_akademik'></head><body><center><br><font color='#FF0000'><b>Maaf, Mata Kuliah $data_mk[matkul] Sudah Di Masuk</b></font><br></center></body></html>";
exit;
}
		mysql_query("INSERT INTO transkrip (id_mhs, id_mk, id_krs_perawat,nim,nama,th_akademik,kode_mk,matkul,sks,program,jurusan,kelas,koor_matkul,huruf,angka,matkul_inggris,th_masuk,semester)
		VALUES ('$data_mhs[id_mhs]', '$id_mk','$id_krs_perawat','$nim','$nama','$th_akademik','$data_kul[kode_mk]','$data_kul[matkul]','$data_kul[sks]','$data_mhs[program]','$data_mhs[jurusan]','$data_mhs[kelas]','$data_mhs3[nama]',
		'$data_krs2[nilai_khs_huruf]','$data_krs2[nilai_khs_bobot]','','$data_mhs[th_masuk]','$data_smt[semester]')");
		echo mysql_error();	
			
		
	
		echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_akademik=$th_akademik&id_smt=$id_smt&nim=$nim&id_mk=$id_mk&id_krs_perawat=$id_krs_perawat&id_akademik=$id_akademik'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
	?>
