<div class="pad">
						
						 <?php
$page = (isset($_GET['page']))? $_GET['page'] : "main";
switch ($page) {
case 'proses_home': include "function/cek.php"; break;
case 'akademik_login': include "inc/login_akademik.php"; break;
	  case 'proses_akademik': include "function/cek.php"; break;
   case 'mahasiswa_login': include "inc/login_mahasiswa.php"; break;
	  case 'proses_mahasiswa': include "function/cek.php"; break;
	    case 'selek_proses_mahasiswa': include "inc/selek.php"; break;
     case 'administrator_login': include "login.php"; break;
	  case 'proses_admin': include "function/cek.php"; break;
	  case 'proses_admin': include "inc/cekrs.php"; break;
	  case 'proses_cek_login': include "function/cek.php"; break;
	    case 'krs_login': include "inc/cekkrs.php"; break;
	case 'main' :
	default : include 'include/index.php';	

}
?>			
							
					</div>