<?
require_once("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];


?>
<? echo"
  <div id='buttons'>
      <a href='home_admin.php?file=atur sistem&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token' class='but but_t'><span>Setting Login</span></a>
	  <a href='home_admin.php?file=atur akademik&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token' class='but but_t'><span>Setting Akademik</span></a>
      <a href='home_admin.php?file=tahun masuk mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token' class='but but_t'><span>TT/MHS-KRS/Transkrip</span></a>
       <a href='home_admin.php?file=menu pin krs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token' class='but'><span>PIN dan Upload MHS</span></a>
       <a href='home_admin.php?file=input nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token' class='but'><span>KHS-Password-UAP</span></a>
	  <a href='./logout.php' class='but'><span>Logout</span></a>
	
    </div>
  
  
  
  
  ";?>