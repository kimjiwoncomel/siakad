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
	  <a href='homekhs.php?file=menu_khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but but_t'><span>Lihat KHS</span></a>
	  <a href='homekhs.php?file=menu_uts&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but'><span>Lihat UTS</span></a>
       <a href='homekhs.php?file=menu_transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi' class='but'><span>Transkip</span></a>
	  <a href='./logout.php' class='but'><span>Logout</span></a>
	
    </div>
  
  
  
  
  ";?>