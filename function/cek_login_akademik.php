<?
require_once("server.php");
include ("enkripsian/function.php");
 $status=addslashes (stripslashes (strip_tags ($_POST[status])));
 $username=addslashes (stripslashes (strip_tags ($_POST[username])));
 $password=addslashes (stripslashes (strip_tags ($_POST[password])));
  $id_prodi=addslashes (stripslashes (strip_tags ($_POST[id_prodi])));


$token2=$_POST['token2'];
$kuncinya2=date ('YmdA');
$key2="st1ke5y0";
$cek_token2 = md5(md5($kuncinya2).md5("$key2"));

///mbuat token lagi
$kuncinya=date ('YmdA');
$key="st1ke5y0";
$token = md5(md5($password).md5("$kuncinya$key"));

if ($token2==$cek_token2){

		$cekAngg_up="SELECT *FROM user where id_kurikulum='$id_prodi' and username='$username' and password='$password' and status='$status'";
		$up_Angg=mysql_query($cekAngg_up);
		echo mysql_error();
		$data_up=mysql_fetch_array($up_Angg);
		$data_up2=mysql_num_rows($up_Angg);
		if($data_up2=="0")
		{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=akademik login'></head><body></body></html>";
		exit;
		}
if($data_up2!="0")
{
		
		if($status=="1")
		{
		$sinyal=base64_encode($password);
			$identifikasi=base64_encode($username);
$kategori=base64_encode($status);
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<center><font size=3 color=#990000>ADMIN KEMAHASISWAAN</font></center>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=akademik/home_admin.php?sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body></body></html>";
			exit;
		}
		
	else
	{
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=akademik login'></head><body></body></html>";
		exit;
	}
	}
} //tutup kurung untuk token2	
		echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";		
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php?page=akademik login'></head><body></body></html>";
		exit;	
?>
