<?php session_start();include "server.php";?>
  <?
	
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['nim']) || !isset($_SESSION['nama']) || !isset($_SESSION['paswrd']) || !isset($_SESSION['id_kelas']) || !isset($_SESSION['id_prodi']) ){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="logout.php"
        </script>
  <? 
	}else{
	 $nim=$_SESSION['nim'];
   $nama=$_SESSION['nama'];
  $id_prodi=$_SESSION['id_prodi'];
 $paswrd=$_SESSION['paswrd'];
  $id_kelas=$_SESSION['id_kelas'];


$ambil= "select * from paswrd_khs where id_prodi='$id_prodi' and nim='$nim' and paswrd='$paswrd'";
$datanya=mysql_query($ambil);
$d = mysql_fetch_array($datanya);



$ambil_data= "SELECT * from tb_mahasiswa where id_mhs='$d[id_mhs]'";
$ambil_datanya=mysql_query($ambil_data);
$data2 = mysql_fetch_array($ambil_datanya);

if ($_POST[proses]=="proses"){
  $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];
$id_smt=$_POST[id_smt];
  $nim=$_POST[nim];
 $id_kurikulum=$_POST[id_kurikulum];
 $id_prodi=$_POST[id_prodi];
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=homekhs.php?file=hasil_lihat_uts&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum&nim=$nim&id_smt=$id_smt&id_kurikulum=$id_kurikulum&id_prodi=$id_prodi' ></head><body><center>Data diproses...</center</body></html>";
 }
 
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<form name="proses" method="post" action="">
<center>
<table width="35%" border="0" align="center" bgcolor="#CC9933">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#FFFFFF">PILIH SEMESTER DAN KELAS (UTS) </font></strong></td>
	</tr>
</tr>
  <tr>
    <td align="right">Semester KHS</td>
    <td align="center">:</td>
    <td align="left"><?include ("semester_khs_mhs.php");?></td>
</tr>
<tr>
    <td align="right">Nama</td>
    <td align="center">:</td>
    <td align="left"><input name="nama" type="text" disabled="true" value="<?echo $data2[nama];?>"><input name="id_prodi" type="hidden" disabled="true" value="<?echo $data2[id_program];?>"></td>
  </tr>
  <tr>
    <td align="right">NIM</td>
    <td align="center">:</td>
    <td align="left"><input name="nim" type="text" disabled="true" value="<?echo $data2[nim];?>"></td>
  </tr>
  <tr>
    <td align="right">Jurusan</td>
    <td align="center">:</td>
    <td align="left"><input name="jurusan" type="text" disabled="true" value="<?echo $data2[jurusan];?>"></td>
</tr>
</table>
</center>
<center><tr align="center"><td><input type="submit" value="proses" name="proses">
&nbsp; &nbsp;<input type="reset" value="Reset">
	 <input name="nim" type="hidden" value="<? echo $data2[nim];?>">
	 <input name="id_prodi" type="hidden" value="<? echo $data2[id_program];?>">
	 <input name="id_kurikulum" type="hidden" value="<? echo $data2[id_kurikulum];?>">
	 <input name="token" type="hidden" value="<? echo $token;?>">
	 <input name="p" type="hidden" value="<? echo $p;?>">
	 		  <input name="q" type="hidden" value="<? echo"$q";?>">
	 <input name="m" type="hidden" value="<? echo"$m";?>">
	 <input name="lum" type="hidden" value="<? echo"$lum";?>">
	<input name="san" type="hidden" value="<? echo $san;?>">
	<input name="ter" type="hidden" value="<? echo $ter;?>">
	<input name="aka" type="hidden" value="<? echo $aka;?>">
	<input name="token" type="hidden" value="<? echo $token;?>">
</tr></td></center>
</form>
</body>
</html>
<? 
} 

	?>