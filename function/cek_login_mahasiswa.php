<?
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



$cekquery2= "SELECT *from simpan_pin where nim='$nim' and no_pin='$no_pin' and th_akademik='$th_akademik' and id_jurusan='$data_prodi[id_prodi]' and id_kurikulum='$data_mecek_kurikulum[id_kurikulum]'";
$hacekquery2=mysql_query($cekquery2);
$data2 = mysql_fetch_array($hacekquery2);

if (mysql_num_rows($hacekquery2) == 0) 
 {
 echo"<br><b><font color=red><center>Login ERROR ...!!!!</center></font></b>";
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=index.php'></head><body></body></html>";
 exit;
     }
$c2= "SELECT *from kelas where kelas='$data2[kelas]' ";
$h2=mysql_query($c2);
$d2 = mysql_fetch_array($h2);
	
		
?>

<form name="proses" method="POST" action="index.php?page=proses home mahasiswa">
<center>
<table width="50%" border="1" align="center" bgcolor="#CCC">
	<tr>		
      <td align="center" colspan="3"><strong><font color="#000000">CEK DATA KRS ANDA </font></strong></td>
	</tr>
	<tr>
		<td align="right" width="25%">Nama</td>
		<td align="center" width="3%">:</td>
		<td align="left" width="70%"><? echo $data2[nama];?></td>
	</tr>
  <tr>
    <td align="right">NIM</td>
    <td align="center">:</td>
    <td align="left"><? echo $data2[nim];?></td>
  </tr>
  <tr>
    <td align="right">Program Studi</td>
    <td align="center">:</td>
    <td align="left"><? echo $data_prodi[jenjang];?>&nbsp;<? echo $data_prodi[nama_prodi];?></td>
</tr>
<tr>
    <td align="right">KRS Semester</td>
    <td align="center">:</td>
    <td align="left"><? echo $data2[semester];?></td>
</tr>
  <tr>
    <td align="right">Tahun Akademik</td>
    <td align="center">:</td>
    <td align="left"><? echo $th_akademik;?></td>
</tr>

</table>
</center>
<center><tr align="center"><td><input type="submit" value="Lanjutkan">
<input name="token2" type="hidden" value="<? echo $token;?>">
<input name="hq" type="hidden" value="<? echo $no; //ini pasword enkrip ?>"> 
<input name="id_mhs" type="hidden" value="<? echo $data2[id_mhs];?>">
<input name="th_akademik" type="hidden" value="<? echo $th_akademik;?>">
<input name="nim" type="hidden" value="<? echo $nim;?>">
<input name="no_pin" type="hidden" value="<? echo $no_pin;?>">
<input name="id_prodi" type="hidden" value="<? echo $data2[id_jurusan];?>">
<input name="id_kurikulum" type="hidden" value="<? echo $id_kurikulum;?>">
<input name="semester" type="hidden" value="<? echo $data2[semester];?>">
</tr></td> 
<br><a href="login_mahasiswa_d3.php">Cancel</a></center>
</form>

