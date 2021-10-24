
<?php session_start();include "server.php";?>
  <?
	include ("tgl_indo.php");
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['prodi']) || !isset($_SESSION['sms']) || !isset($_SESSION['kelas']) || !isset($_SESSION['tahun']) || !isset($_SESSION['kurikulum'])){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="logout.php"
        </script>
  <? 
	}else{
	 $nim=$_SESSION['user'];
   $pin=$_SESSION['pass'];
  $pro=$_SESSION['prodi'];
  $th=$_SESSION['tahun'];
  $idkr=$_SESSION['kurikulum'];
  $idk=$_SESSION['kelas'];
    $sms=$_SESSION['sms'];

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$sms'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil=mysql_query("select * from simpan_pin where id_prodi='$pro' and id_kurikulum='$idkr' and th_akademik='$th' and semester='$sms' and nim='$nim' and no_pin='$pin' and id_kelas='$idk'");
echo mysql_error();
$dat=mysql_fetch_array($ambil);

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$dat[nim]'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

if ($_POST[proses]=="Proses"){
include("server.php");
$id_pemb_akademik = $_POST[id_pemb_akademik];
$nim2 = addslashes (stripslashes (strip_tags ($_POST[nim2])));
$kelas2 = addslashes (stripslashes (strip_tags ($_POST[kelas2])));
$semester2 = addslashes (stripslashes (strip_tags ($_POST[semester2])));
$th_akademik2 = addslashes (stripslashes (strip_tags ($_POST[th_akademik2])));
  $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];

$ambil_mhs2= mysql_query("SELECT * from tb_mahasiswa where nim='$nim2'");
echo mysql_error();
$data_mhs2 = mysql_fetch_array($ambil_mhs2);

$ambil_smt2=mysql_query("SELECT *FROM semester_berapa where semester='$semester2'");
echo mysql_error();
$data_smt2=mysql_fetch_array($ambil_smt2);

mysql_query("update tabel_semester set id_pemb_akademik='$id_pemb_akademik' where id_mhs='$data_mhs2[id_mhs]' and th_akademik='$th_akademik2' and id_smt='$data_smt2[id_smt]'");
mysql_query("update krs_khs set id_pemb_akademik='$id_pemb_akademik' where id_mhs='$data_mhs2[id_mhs]' and nim='$data_mhs2[nim]' and th_akademik='$th_akademik2' and id_smt='$data_smt2[id_smt]'");
		echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_mhs.php?file=cek krs input&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'></head><body><center>Data diproses...</center</body></html>";

}

?>

<form name="form1" method="post" action="">
<center>
  <div align="center" class="unnamed1"><strong><br>
    <font color="#FF0000">PEMBIMBING AKADEMIK<br>
    </font> </strong></div>
  <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr bgcolor="#993300"> 
      <td width="5%" align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td width="40%"><strong><font color="#FFFFFF">Nama</font></strong></td>
      <td width="20%"><strong><font color="#FFFFFF">NIP</font></strong></td>
      <td width="10%"> <div align="center"><strong><font color="#FFFFFF">Pilih</font></strong></div></td>
    </tr>
    <?
//============

$perintah=mysql_query ("select *from pembimbing_akademik where id_prodi='$pro'");


while($data=mysql_fetch_array($perintah))
{
$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td height="24" align="center"><? echo"$no"; ?>&nbsp;&nbsp;</td>
      <td height="24"><? echo"$data[nama]"; ?>&nbsp;&nbsp;</td>
      <td><? echo"$data[nip]"; ?>&nbsp;</td>
	  <td align="center"><? echo "<input name='id_pemb_akademik' type=radio value=$data[id_pemb_akademik]>"; ?>&nbsp;</td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" align="center"><input type="submit" name="proses" value="Proses">
	  <input name="nim2" type="hidden" value="<? echo $dat[nim];?>">
<input name="kelas2" type="hidden" value="<? echo $dat[kelas];?>">
<input name="semester2" type="hidden" value="<? echo $data_smt[semester];?>">
<input name="th_akademik2" type="hidden" value="<? echo $th;?>">
	  <input name="q" type="hidden" value="<? echo"$q";?>">
	 <input name="m" type="hidden" value="<? echo"$m";?>">
	 <input name="lum" type="hidden" value="<? echo"$lum";?>">
	<input name="san" type="hidden" value="<? echo $san;?>">
	<input name="ter" type="hidden" value="<? echo $ter;?>">
	<input name="aka" type="hidden" value="<? echo $aka;?>">
	<input name="token" type="hidden" value="<? echo $token;?>">
</td>
    </tr>
  </table>
  </center>
</form>  
<?
}
?>
