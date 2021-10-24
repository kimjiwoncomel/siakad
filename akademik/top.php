<?
require_once("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];

?>
<? echo"
  <div id='buttons'>
	  <a href='home_admin.php?file=menu akademik&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but but_t'><span>Akademik</span></a>
	  <a href='home_admin.php?file=status mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but'><span>Kemahasiswaan</span></a>
       <a href='home_admin.php?file=input nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but'><span>KRS dan KHS</span></a>
	  <a href='./logout.php' class='but'><span>Logout</span></a>
	
    </div>
  
  
  
  
  ";?>