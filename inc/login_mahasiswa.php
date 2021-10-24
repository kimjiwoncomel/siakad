<?
session_start();
include ("server.php");
include ("tgl_indo.php");
$th_sekarang=date ("Y");
if ($bln=='01' or $bln=='02' or $bln=='03' or $bln=='04' or $bln=='05' or $bln=='06' or $bln=='07' or $bln=='08'){	
	$th_akademik=$th_sekarang-1;
}
if ($bln=='09' or $bln=='10' or $bln=='11' or $bln=='12'){	
	$th_akademik=$th_sekarang;
}

?>

<form name="proses" method="post" action="index.php?page=selek_proses_mahasiswa">
<center>
 <table width="50%" align="center" bordercolor="#0000FF" bgcolor="#33CCCC">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#FFFFFF">LOGIN MAHASISWA 
      </font></strong></td>
	</tr>
  <tr>
    <td align="right"><font color="#FFFFFF">NIM</font></td>
    <td align="center">:</td>
    <td align="left"><input type="text" name="nim" size="27" maxlength="40"></td>
  </tr>
  <tr>
    <td align="right"><font color="#FFFFFF">PIN / KODE AKSES</font></td>
    <td align="center">:</td>
    <td align="left"><input type="text" name="no_pin" size="27" maxlength="40"></td>
  </tr>
  <tr>
    <td align="right"><font color="#FFFFFF">PRODI / JURUSAN </font></td>
    <td align="center">:</td>
    <td align="left"><?include ("function/id_prodi.php");?></td>
  </tr>

   <tr>
    <td align="right"><font color="#FFFFFF">KELAS</font></td>
    <td align="center">:</td>
    <td align="left"><?include ("function/id_kelas.php");?></td>
  </tr>
  <tr>
    <td align="right"><font color="#FFFFFF">Tahun Akademik</font></td>
    <td align="center">:</td>
    <td align="left"><?include ("function/th_akademik.php");?></td>
</tr>
</table>
<center><tr align="center"><td><input type="submit" value="Login">
	<input name="Mahasiswa" type="hidden" value="Mahasiswa">
&nbsp; &nbsp;<input type="reset" value="Reset"></tr></td> 
<br><a href="index.php">Kembali</a> |  <a href="login_krs_mahasiswa.php"><h3>Login KHS</h3></a></center>
</center>
</form>


