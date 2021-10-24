<html>
<head>
<title>Tambah User</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
if ((empty($_POST[nim]))or (empty($_POST[password])))
{
include ("tambah_user_mahasiswa_khs.php");
echo '<center>Tolong Diisi Semua Data</center>';
}
if ((!empty($_POST[nim])) and(!empty($_POST[password])))
{
include ("server.php");
//$password = md5($password);
// strtoupper = besar semua, ucwords = beasr awalnya

$cekquery= "SELECT *from jurusan";
$hacekquery=mysql_query($cekquery);
echo mysql_error();
$data = mysql_fetch_array($hacekquery);
 $id_prodi= addslashes (stripslashes (strip_tags ($_POST[id_prodi])));
 $nim = addslashes (stripslashes (strip_tags ($_POST[nim])));
 $password = addslashes (stripslashes (strip_tags ($_POST[password])));
$garing='/';
$cek_mhs = mysql_query("SELECT *from paswrd_khs where id_prodi='$id_prodi' and nim='$nim'");
$data_jml_mhs = mysql_num_rows($cek_mhs);			
$data_mhs = mysql_fetch_array($cek_mhs);
if ($data_jml_mhs!=0){
echo "<center>Nim ($nim) sudah mendaftar <br><a href='tambah_user_mahasiswa_khs1.php'>Ulang</a></center>";
exit;
}
if ($data_jml_mhs==0){
$cek_mhs2 = mysql_query("SELECT *from tb_mahasiswa where id_program='$id_prodi' and nim='$nim'");
$data_mhs2 = mysql_fetch_array($cek_mhs2);
	$data_jml_mhs2 = mysql_num_rows($cek_mhs2);			
	if ($data_jml_mhs2==0){
		echo "<center>Nim ($nim) bukan mahasiswa jurusan $data[jurusan]<br><a href='tambah_user_mahasiswa_khs.php'>Ulang</a></center>";
		exit;
		}
		if ($data_jml_mhs2!=0){
	
$nama = addslashes (stripslashes (strip_tags ($data_mhs2[nama])));

mysql_query("insert into paswrd_khs (
id_password,
id_prodi, 
id_mhs, 
id_kelas, 
id_program, 
id_kurikulum,
program,
jurusan,
nama,
nim, 
kelas, 
paswrd) 
values (
'',
'$data_mhs2[id_program]', 
'$data_mhs2[id_mhs]', 
'$data_mhs2[id_kelas]', 
'$data_mhs2[id_program]', 
'$data_mhs2[id_kurikulum]',
'$data_mhs2[program]',
'$data_mhs2[jurusan]',
'$data_mhs2[nama]',
'$data_mhs2[nim]', 
'$data_mhs2[kelas]', 
'$password')") ;
mysql_error;

echo "<center><strong><font color='#FF0000'>Input berhasil</font></strong></center>";
	$time=1;$page="index.php";
	echo "<meta http-equiv='refresh' content='{$time}; url={$page}' />"; 
}
}
/*
else{// or die ("<center><font color='#FF0000'>Maaf, NIM (<strong>$nim</strong>) sudah ada</font><br><a href='tambah_user_mahasiswa_khs1.php'>Ulang</a></center>");			
echo "<center><strong><font color='#FF0000'>Nim $nim tidak ada</font></strong></center>";
	$time=1;$page="tambah_user_mahasiswa_khs1.php";
	echo "<meta http-equiv='refresh' content='{$time}; url={$page}' />"; 
}
*/
}
?>
</body>
</html>
