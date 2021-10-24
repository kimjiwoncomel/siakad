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
 $no_pin=addslashes (strtolower (stripslashes (strip_tags ($_POST[no_pin]))));

  $nim = addslashes (stripslashes (strtoupper (strip_tags ($_POST[nim]))));
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));

   $th_akademik=addslashes (stripslashes (strip_tags ($_POST[th_akademik])));

  $id_prodi=addslashes (stripslashes (strip_tags ($_POST[id_prodi])));
?>

<form name="proses" method="post" action="index.php?page=proses_mahasiswa">
<center>
 <table width="50%" align="center" bordercolor="#0000FF" bgcolor="#33CCCC">
  <tr>
    <td align="right"><font color="#FFFFFF">KURIKULUM</font></td>
    <td align="center">:</td>
    <td align="left"><select name="id_kurikulum">
<?
include "server.php";
		$ambil_smt="SELECT *FROM kurikulum where id_prodi='$id_prodi'";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_kurikulum];?>"><? echo $data_smt[nama_kurikulum];?></option>
	<?}?>
        </select></td>
  </tr>
 
</table>
<center><tr align="center"><td><input type="submit" value="Login">
	<input name="Mahasiswa" type="hidden" value="Mahasiswa">
	<input name="no_pin" type="hidden" value="<? echo $no_pin;?>">
	<input name="id_kelas" type="hidden" value="<? echo $id_kelas;?>">
	<input name="th_akademik" type="hidden" value="<? echo $th_akademik;?>">
	<input name="nim" type="hidden" value="<? echo $nim;?>">
	<input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
&nbsp; &nbsp;<input type="reset" value="Reset"></tr></td> 
<br><a href="index.php">Kembali</a> |  <a href="login_krs_mahasiswa.php">KRS / KHS</a></center>
</center>
</form>


