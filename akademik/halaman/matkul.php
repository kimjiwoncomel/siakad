<?php session_start();include "server.php";?>
  <?
	
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['status']) || !isset($_SESSION['prodi'])){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="../index.php"
        </script>
  <? 
	}else{

 $password=$_SESSION['pass'];
  $status=$_SESSION['status'];
  $username=$_SESSION['user'];
    $id_prodi=$_SESSION['prodi'];
	$prt="SELECT *FROM user where id_prodi='$id_prodi' and username='$username' and password='$password' and status='$status'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	if($ada>=1)
	{

if ($_POST[proses]=="proses"){
$token2=$_POST[token];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=set_atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>
<div align="center"><strong>PILIH PROGRAM STUDI / PRODI</strong> </div>
<form method="post" action="">
<br><center><table align="center" width="40%" cellpadding="0" cellspacing="0">
<tr>
<td>Program Studi : </td>
<td><? include "id_prodi.php"; ?></td>
</tr>
    <tr> 
      <td colspan="2" align="center"><input type="submit" value="proses" name="proses"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" /></td>
    </tr>
</table>
</center>
</form>
<?
}
}
?>