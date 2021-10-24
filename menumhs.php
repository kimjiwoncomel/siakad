<?
require_once("server.php");
$q=$_GET['q'];
$m=$_GET['m'];
$lum=$_GET['lum'];
$san=$_GET['san'];
$ter=$_GET ['ter'];
$aka=$_GET['aka'];
$token=$_GET['token'];


?>
<? echo"
  <div id='buttons'>
     <a href='home_mhs.php?file=input krs Paket&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but but_t'><span>KRS Paket</span></a>
	  <a href='home_mhs.php?file=input krs NonPaket&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but but_t'><span>KRS NonPaket</span></a>
	   <a href='home_mhs.php?file=halaman pembimbing&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but but_t'><span>Pemb.Akademik</span></a>
      <a href='home_mhs.php?file=cek hapus krs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but'><span>Hapus KRS</span></a>
      <a href='home_mhs.php?file=cek krs input&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but'><span>Lihat KRS</span></a>
      <a href='./halaman/cetak_krs3.php?&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but' target='_blank'><span>Cetak KRS</span></a>
      <a href='home_mhs.php?file=lihat nilai khs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but'><span>Nilai KHS</span></a>
	  <a href='home_mhs.php?file=lihat pin khs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but'><span>Passw</span></a>
	  <a href='./logout.php' class='but'><span>Logout</span></a>
	
    </div>
  
  
  
  
  ";?>
  
