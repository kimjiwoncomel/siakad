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
     <a href='user.php?file=lihat krs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but but_t'><span>LIHAT KHS</span></a>
	 <a href='user.php?file=lihat uts&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but but_t'><span>LIHAT UTS</span></a>
	  <a href='user.php?file=hasil kuliah mhs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' class='but but_t'><span> TRANSKIP</span></a>
     <a href='./logout.php' class='but'><span>Logout</span></a>
  </div>";?>