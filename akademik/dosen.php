
<?
require_once("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
$id_mk=$_GET['id_mk'];
$nama=$_GET['nama'];
?>
<? echo"
  <div id='buttons'>
	  <a href='file.php?file=input nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&nama=$nama' class='but but_t'><span>Proses Nilai KHS</span></a>
	  <a href='file.php?file=input nilai uts dosen&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but'><span>Proses Nilai UTS</span></a>

	  <a href='./logout.php' class='but'><span>Logout</span></a>
	
    </div>
  
  
  
  
  ";?>