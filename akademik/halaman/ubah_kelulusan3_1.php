<?
include ("server.php");
$id_mhs=$_GET[id_mhs];
 $id_kelas=$_GET[id_kelas];
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
$id_prodi = $_GET['id_prodi'];
$id_kelas = $_GET['id_kelas'];
$id_kurikulum = $_GET['id_kurikulum'];
$th_masuk = $_GET['th_masuk'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$ambil_semester= "SELECT *from kelas where id_kelas='$id_kelas'";
$ambil_semesternya=mysql_query($ambil_semester);
echo mysql_error();
$ambil_semester = mysql_fetch_array($ambil_semesternya);

$ambil_data= "SELECT *from tb_mahasiswa where id_kelas='$id_kelas' and id_program='$id_prodi' and th_masuk='$th_masuk' and id_mhs='$id_mhs'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data1 = mysql_fetch_array($ambil_datanya);
mysql_query("update tb_mahasiswa set status='BELUM_LULUS' where id_kelas='$id_kelas' and id_program='$id_prodi' and th_masuk='$th_masuk' and id_mhs='$id_mhs'") ;
echo mysql_error();
echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?file=lihat status mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_masuk=$th_masuk'></head><body><strong><font color='#0000FF'><center>Data diproses ...</center></font></strong></body></html>";
//echo"<a href=ubah_kelulusan2.php?kelas=$data1[kelas]><strong><font color='#0000FF'>LULUS</font></strong></a>"; 
?>
