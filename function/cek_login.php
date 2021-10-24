<?

include "../server.php";
date_default_timezone_set('Asia/Jakarta');
 $nim=$_POST[nim];
 $password=$_POST[paswrd];
 $id_jurusan=$_POST[id_prodi];
  $id_kurikulum=$_POST[id_kurikulum];
   $id_kelas=$_POST[id_kelas];
if ((empty($password)) || (empty($nim)) || (empty($id_jurusan)))
{

    // jika kode captcha salah
    echo "<center><p><b>Data tidak lengkap</b></p>";
echo "<p><a href='index.php'>Ulangi Entri</a></p></center>";
exit;
}
//awal pengaman
$kuncinya=date ('YmdA');
$key="p0ltekke5";
$token = md5(md5($password).md5("$kuncinya$key"));
$q=base64_encode($password);
$m=base64_encode($nim);
$lum=base64_encode($id_kurikulum);
$san=base64_encode($id_jurusan);
$ter=base64_encode($id_kelas);
	$prt="select * from paswrd_khs where id_prodi='$id_jurusan' and id_kelas='$id_kelas' and id_kurikulum='$id_kurikulum' and nim='$nim' and paswrd='$password'";
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
			$q=base64_encode($password);
			$m=base64_encode($nim);
$lum=base64_encode($id_kurikulum);
$san=base64_encode($id_jurusan);
$ter=base64_encode($id_kelas);
	//	session_register("th_akademik");
			echo"<center><font size=3 color=#990000>LOGIN SUKSES</font></center><br>";
			echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=../user.php?aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'></head><body></body></html>";
			exit;
	}
?>