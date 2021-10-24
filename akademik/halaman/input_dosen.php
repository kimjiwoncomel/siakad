<?php session_start();include "server.php";?>
  <?
	
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['mk']) || !isset($_SESSION['prodi']) ){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="../index.php"
        </script>
  <? 
	}else{

 $password=$_SESSION['pass'];
  $id_mk=$_SESSION['mk'];
  $username=$_SESSION['user'];
   $id_prodi=$_SESSION['prodi'];
	$prt="SELECT *from userm where username='$username' and password='$password' and id_mk='$id_mk'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	if($ada>=1)
	{

if ($_POST[proses]=="proses"){
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
$id_smt = addslashes (stripslashes (strip_tags ($_POST[id_smt])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
$token=$_POST[token];
$id_prodi=$_POST['id_prodi'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=file.php?file=hasil input nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<form name="proses" method="post" action="">
<center>
  <table width="35%" border="0" align="center" bgcolor="#CC9933">
    <tr> 
      <td align="center" colspan="3"><strong><font color="#FFFFFF">FORM INPUT 
        NILAI KHS</font></strong></td>
    </tr>
	<tr> 
      <td align="right">Prodi</td>
      <td align="center">:</td>
      <td align="left"> 
        <?include "id_prodi.php";?>      </td>
    </tr>
	 <tr> 
      <td align="right">Kelas</td>
      <td align="center">:</td>
      <td align="left"> 
        <?include "id_kelas.php";?>      </td>
    </tr>
	 <tr> 
      <td align="right">Semester</td>
      <td align="center">:</td>
      <td align="left"> 
        <?include "id_semester.php";?>      </td>
    </tr>
	 <tr> 
      <td align="right">Tahun Akademik</td>
      <td align="center">:</td>
      <td align="left"> 
      <select name="th_akademik">
<?
include "server.php";
		$ambil_smt="SELECT *FROM akademik ";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[akademik];?>"><? echo $data_smt[akademik];?></option>
	<?}?>
        </select>      </td>
    </tr>
    <tr> 
      <td colspan="3" align="center"><input type="submit" value="proses" name="proses">
<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
<input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" /></td>
    </tr>
  </table>
  </center>
</form>
<?
}
}
?>
