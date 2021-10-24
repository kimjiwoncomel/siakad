<?
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
?>
