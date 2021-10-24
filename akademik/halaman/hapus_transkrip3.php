<?
include("server.php");
$id_kurikulum=$_GET['id_kurikulum'];
 $th_masuk=$_GET[th_masuk];
 $id_kelas=$_GET[id_kelas];
  $id_mhs=$_GET[id_mhs];
 $nim=$_GET['nim'];
  $kelas=$_GET[kelas];
 $id_kelas=$_GET[id_kelas];
   $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$cekquery_status= mysql_query("SELECT * from tb_mahasiswa where id_mhs='$id_mhs' ");
$data_status = mysql_fetch_array($cekquery_status);

mysql_query("delete from transkrip where nim='$data_status[nim]' ");
mysql_query("delete from karya_tulis where nim='$data_status[nim]' ");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=hasil lihat mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_masuk&id_smt=$id_smt'></head><body>Data Terhapus...</body></html>";
echo mysql_error();
exit();

?>
