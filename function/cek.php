<?
session_start();
if(isset($_POST['Admin'])) {
require_once("server.php");
include ("enkripsian/function.php");
 $status=addslashes (stripslashes (strip_tags ($_POST[status])));
 $username=addslashes (stripslashes (strip_tags ($_POST[username])));
 $password=addslashes (stripslashes (strip_tags ($_POST[password])));


$token2=$_POST['token2'];
$kuncinya2=date ('YmdA');
$key2="st1ke5y0";
$cek_token2 = md5(md5($kuncinya2).md5("$key2"));

///mbuat token lagi
$kuncinya=date ('YmdA');
$key="st1ke5y0";
$token = md5(md5($password).md5("$kuncinya$key"));

if ($token2==$cek_token2){

		$cekAngg_up="SELECT *FROM user where username='$username' and password='$password' and status='$status'";
		$up_Angg=mysql_query($cekAngg_up);
		echo mysql_error();
		$data_up=mysql_fetch_array($up_Angg);
		$data_up2=mysql_num_rows($up_Angg);
		if($data_up2=="0")
		{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=./logout.php'></head><body></body></html>";
		exit;
		}
if($data_up2!="0")
{
		if($status=="0")
		{
	  $_SESSION['user'] = $data_up[username]; 
     $_SESSION['pass'] = $data_up[password];
	 ?>
	 <script language="JavaScript">
	 	alert('Anda berhasil login');
     </script>
	
	
	<?
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<center><font size=3 color=#990000>ADMINISTRATOR </font></center>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php'></head><body></body></html>";
			exit;
		}
		if($status=="1")
		{
include "kop_lengkap.php";
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<center><font size=3 color=#990000>ADMIN KEMAHASISWAAN</font></center>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_kema.php?".paramEncrypt("username=$username&password=$password&status=$status&token=$token&id_kurikulum=$id_kurikulum")."'></head><body></body></html>";
			exit;
		}
		if($status=="2")
		{
include "kop_lengkap.php";
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<center><font size=3 color=#990000>BAGIAN KEUANGAN</font></center>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_keu.php?".paramEncrypt("username=$username&password=$password&status=$status&token=$token&id_kurikulum=$id_kurikulum")."'></head><body></body></html>";
			exit;
		}
	else
	{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=./home/login_admin.php'></head><body></body></html>";
		exit;
	}
	}
} //tutup kurung untuk token2	
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=./home/login_admin.phpp'></head><body></body></html>";
		exit;	
}
if(isset($_POST['Akademik'])) {
session_start();
	require_once("server.php");
include ("enkripsian/function.php");
 $status=addslashes (stripslashes (strip_tags ($_POST[status])));
 $username=addslashes (stripslashes (strip_tags ($_POST[username])));
 $password=addslashes (stripslashes (strip_tags ($_POST[password])));
  $id_prodi=addslashes (stripslashes (strip_tags ($_POST[id_prodi])));

		$cekAngg_up="SELECT *FROM user where id_prodi='$id_prodi' and username='$username' and password='$password' and status='$status'";
		$up_Angg=mysql_query($cekAngg_up);
		echo mysql_error();
		$data_up=mysql_fetch_array($up_Angg);
		$data_up2=mysql_num_rows($up_Angg);
		if($data_up2=="0")
		{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=akademik_login'></head><body></body></html>";
		exit;
		}
if($data_up2!="0")
{
		
		if($status=="1")
		{
	 $_SESSION['user'] = $data_up[username]; 
     $_SESSION['pass'] = $data_up[password];
	  $_SESSION['status'] = $data_up[status];
	  $_SESSION['prodi'] = $data_up[id_prodi];
?>
	 <script language="JavaScript">
	 	alert('Anda berhasil login');
     </script>
	
	
	<?
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<center><font size=3 color=#990000>ADMIN KEMAHASISWAAN</font></center>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=akademik/home_admin.php'></head><body></body></html>";
			exit;
		}
		
	else
	{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=akademik_login'></head><body></body></html>";
		exit;
	}
	}
	
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=akademik _ogin'></head><body></body></html>";
		exit;	
}
if(isset($_POST['mhskhs'])) {
session_start();
require_once("server.php");
include ("enkripsian/function.php");
 $nim=addslashes (stripslashes (strip_tags ($_POST[nim])));
 $paswrd=addslashes (stripslashes (strip_tags ($_POST[paswrd])));
  $id_prodi=addslashes (stripslashes (strip_tags ($_POST[id_prodi])));


		$cekAngg_up="select * from paswrd_khs where id_prodi='$id_prodi' and nim='$nim' and paswrd='$password'";
		$up_Angg=mysql_query($cekAngg_up);
		echo mysql_error();
		$data_up=mysql_fetch_array($up_Angg);
		$data_up2=mysql_num_rows($up_Angg);
		if($data_up2=="0")
		{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=login_krs_mahasiswa.php'></head><body></body></html>";
		exit;
		}
if($data_up2!="0")
{
		
		if($status=="1")
		{
	 $_SESSION['id_kelas'] = $data_up[id_kelas]; 
     $_SESSION['nim'] = $data_up[nim];
	  $_SESSION['nama'] = $data_up[nama];
	  $_SESSION['id_prodi'] = $data_up[id_prodi];
	  $_SESSION['paswrd'] = $data_up[paswrd];
	  
?>
	 <script language="JavaScript">
	 	alert('Anda berhasil login');
     </script>
	
	
	<?
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<center><font size=3 color=#990000>Halaman KHS</font></center>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=akademik/cek.php'></head><body></body></html>";
			exit;
		}
		
	else
	{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=login_krs_mahasiswa.php'></head><body></body></html>";
		exit;
	}
	}
	
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=login_krs_mahasiswa.php'></head><body></body></html>";
		exit;	
}
if(isset($_POST['Mahasiswa'])) {
include ("server.php");

 $no_pin=addslashes (strtolower (stripslashes (strip_tags ($_POST[no_pin]))));

  $nim = addslashes (stripslashes (strtoupper (strip_tags ($_POST[nim]))));
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));

   $th_akademik=addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
   $id_kurikulum=addslashes (stripslashes (strip_tags ($_POST[id_kurikulum]))); 

  $id_prodi=addslashes (stripslashes (strip_tags ($_POST[id_prodi])));

//awal pengaman
$kuncinya=date ('YmdH');
$key="s3t1k35y0";
$token = md5(md5($no_pin).md5("$kuncinya$key"));
$no = base64_encode($no_pin);
//akhir pengaman


$cek_kurikulum= "SELECT *from kurikulum where id_kurikulum='$id_kurikulum'";
$mecek_kurikulum=mysql_query($cek_kurikulum);
echo mysql_error();
$data_mecek_kurikulum = mysql_fetch_array($mecek_kurikulum);

$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);

$cek_kelas= "SELECT *from kelas where id_kelas='$id_kelas'";
$mecek_kelas=mysql_query($cek_kelas);
echo mysql_error();
$data_mecek_kelas = mysql_fetch_array($mecek_kelas);


$cekquery2= "SELECT *from simpan_pin where nim='$nim' and no_pin='$no_pin' and th_akademik='$th_akademik' and id_prodi='$data_prodi[id_prodi]' and id_kelas='$data_mecek_kelas[id_kelas]' and id_kurikulum='$data_mecek_kurikulum[id_kurikulum]'";
$hacekquery2=mysql_query($cekquery2);
$data2 = mysql_fetch_array($hacekquery2);

if (mysql_num_rows($hacekquery2) == 0) 
 {
 echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php'></head><body></body></html>";
 exit;
     }
if (mysql_num_rows($hacekquery2) == 1) 
	{
	  $_SESSION['user'] = $data2[nim]; 
     $_SESSION['pass'] = $data2[no_pin];
	 $_SESSION['prodi'] = $data2[id_prodi]; 
     $_SESSION['tahun'] = $data2[th_akademik];
     $_SESSION['kurikulum'] = $data2[id_kurikulum];
	  $_SESSION['kelas'] = $data2[id_kelas];
	 ?>
	 <script language="JavaScript">
	 	alert('Anda berhasil login');
     </script>
	
	
	<?
 echo"<br><b><font color=red><center>Login SUKSES ...!!!!</center></font></b>";
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=krs_login'></head><body></body></html>";
 exit;
     }
}
if(isset($_POST['Dosen'])) {
include ("server.php");

 $username=addslashes (strtolower (stripslashes (strip_tags ($_POST[username]))));
  $id_mk = addslashes (stripslashes (strtoupper (strip_tags ($_POST[id_mk]))));
 $password = addslashes (stripslashes (strip_tags ($_POST[password])));

//awal pengaman
$kuncinya=date ('YmdH');
$key="s3t1k35y0";
$token = md5(md5($no_pin).md5("$kuncinya$key"));
$no = base64_encode($no_pin);
//akhir pengaman


$cekquery2= "SELECT *from userm where username='$username' and password='$password' and id_mk='$id_mk'";
$hacekquery2=mysql_query($cekquery2);
$data2 = mysql_fetch_array($hacekquery2);

if (mysql_num_rows($hacekquery2) == 0) 
 {
 echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php'></head><body></body></html>";
 exit;
     }
if (mysql_num_rows($hacekquery2) == 1) 
	{
	  $_SESSION['user'] = $data2[username]; 
     $_SESSION['pass'] = $data2[password];
	 $_SESSION['mk'] = $data2[id_mk]; 
	  $_SESSION['prodi'] = $data2[id_prodi]; 
	 ?>
	 <script language="JavaScript">
	 	alert('Anda berhasil login');
     </script>
	
	
	<?
 echo"<br><b><font color=red><center>Login SUKSES ...!!!!</center></font></b>";
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=akademik/file.php'></head><body></body></html>";
 exit;
     }
}
if(isset($_POST['mhskrs'])) {
date_default_timezone_set('Asia/Jakarta');
//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['prodi']) ||  !isset($_SESSION['kelas']) || !isset($_SESSION['tahun']) || !isset($_SESSION['kurikulum'])){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="index.php"
        </script>
  <? 
	}else{
	 $nim=$_SESSION['user'];
     $pin=$_SESSION['pass'];
	  $pro=$_SESSION['prodi'];
     $th=$_SESSION['tahun'];
	  $idkr=$_SESSION['kurikulum'];
	  $idk=$_SESSION['kelas'];
	   $semester=$_POST[semester];
if ((empty($pin)) || (empty($nim)) || (empty($pro)) || (empty($idkr)) || (empty($idk))|| (empty($th)) || (empty($semester)))
{

    // jika kode captcha salah
    echo "<center><p><b>Data tidak lengkap</b></p>";
echo "<p><a href='index.php'>Ulangi Entri</a></p></center>";
exit;
}



include "server.php";
//awal pengaman
$kuncinya=date ('YmdA');
$key="p0ltekke5";
$token = md5(md5($password).md5("$kuncinya$key"));
$q=base64_encode($password);
$m=base64_encode($nim);
$lum=base64_encode($id_kurikulum);
$san=base64_encode($id_jurusan);
$ter=base64_encode($semester);
$aka=base64_encode($th_akademik);
	$prt="select * from simpan_pin where id_kelas='$idk' and id_kurikulum='$idkr' and th_akademik='$th' and semester='$semester' and nim='$nim' and id_prodi='$pro' and no_pin='$pin'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	$hasilnya=mysql_fetch_array($hasil);
	if($ada<=0)
	{
		
			echo"<center><font size=3 color=#990000>LOGIN GAGAL !!!!!</font></center><br>";
		echo "<center><p><a href='index.php'>Klik Disini Untuk Mendaftar</a></p></center>";
		exit;
	}
	if($ada>=1)
	{
	$_SESSION['user'] = $hasilnya[nim]; 
     $_SESSION['pass'] = $hasilnya[no_pin];
	 $_SESSION['prodi'] = $hasilnya[id_prodi]; 
     $_SESSION['tahun'] = $hasilnya[th_akademik];
     $_SESSION['kurikulum'] = $hasilnya[id_kurikulum];
	  $_SESSION['kelas'] = $hasilnya[id_kelas];
	  $_SESSION['sms'] = $hasilnya[semester];
	 ?>
	 <script language="JavaScript">
	 	alert('Anda berhasil login');
     </script>
	
	
	<?
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_mhs.php?aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'></head><body></body></html>";
			exit;
	}
	}
	}
?>
