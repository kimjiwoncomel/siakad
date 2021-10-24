<?
session_start(); 
require_once("server.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>SIAKAD - POLTEKKES KENDARI</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<script src="lib/jquery-1.4.2.js" type="text/javascript"></script>
<script src="lib/js-func.js" type="text/javascript"></script>
<script src="lib/jquery.jcarousel.js" type="text/javascript"></script>
</head>
<body>
<div id="bg">
    <? 
	include ("include/logo.php");
	?>
<div id="main">
<!-- header begins -->
     <? 
	include ("include/header.php");
	?> 
<!-- header ends -->
<!-- content begins -->
<div id="content_bg">
   <? 
	include ("include/sidebar.php");
	?> 
	
	<div class="marg_top2">
				
				<div class="col2 pad_left1">
	<div class="pad">
	<form name="proses" method="post" action="tambah_user_mahasiswa_khs1.php">
<center>
<table width="44%" border="0" align="center" bgcolor="#3D59AB">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#9999FF">FORM DAFTAR USER KHS 
      </font></strong></td>
	</tr>
	<tr>
    <td align="right"><font color="#FFFFFF">PRODI</font></td>
    <td align="center">:</td>
    <td align="left"><select name="id_prodi">
<?
$ambil_data= "SELECT *from prodi ";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
$ambil= "SELECT *from jenjang where id_jenjang='$data1[jenjang]' ";
$hasil=mysql_query($ambil);
$lihat = mysql_fetch_array($hasil);
?>
          <option value="<? echo $data1[id_prodi];?>"><? echo $lihat[jenjang];?> <? echo $data1[nama_prodi];?></option>
<?
}
?>
        </select></td>
  </tr>
  <tr>
    <td align="right"><font color="#FFFFFF">NIM</font></td>
    <td align="center">:</td>
    <td align="left"><input type="text" name="nim" size="27" maxlength="40"></td>
  </tr>
  <tr>
    <td align="right"><p><font color="#FFFFFF">Password</font></p>      </td>
    <td align="center">:</td>
    <td align="left"><input type="password" name="password" size="27" maxlength="40"></td>
  </tr>
</table>
</center>
<center><tr align="center"><td><input type="submit" value="Simpan">
&nbsp; &nbsp;<input type="reset" value="Reset"><br><a href="login_krs_mahasiswa.php">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;
</tr></td></center>
</form>
	</div>
				</div>
	  </div>
	<div class="clearall"></div>
   </div><div class="clearall"></div>
  </div>
<!-- content ends -->
<!-- footer begins -->
				<? 
	include ("include/footer.php");
	?> 
<!-- footer ends -->


</div>
</body>
</html>