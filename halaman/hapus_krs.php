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




$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$nim'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$sms'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_kelas=mysql_query("SELECT *FROM kelas where id_kelas='$data_mhs[id_kelas]'");
echo mysql_error();
$data_kelas=mysql_fetch_array($ambil_kelas);

if ($_POST[proses]=="Hapus"){
 $id_krs=$_POST[id_krs];
   $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];

mysql_query("delete from  krs_khs where id_krs_perawat='$id_krs'");
 echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_mhs.php?file=cek hapus krs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
//echo"<center><a href='tampil_penandatangan_khs.php'>Proses Sukses</a></center>";

}
?>

<form name="form_input_krs1" method="post" action="">	
<table width="100%" border="0" align="center">  
    <td><center><font size="+2"><strong>FORM HAPUS KARTU RENCANA STUDI (KRS)</strong></font></center></td>
  </tr>
</table>
<table width="100%" border="0" align="center">
<tr><td width="12%"><strong>NIM</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><? echo $nim;?></strong></td>
    <td width="32%" align="right"><strong>KELAS</strong></td>
	<td width="2%" align="center"><strong>:</strong></td>
	  <td width="20%"><strong><? echo $data_kelas[kelas];?></strong></td>
	<td width="18%"></td>
	<td width="0%"></td>
</tr>
<tr><td width="12%"><strong>NAMA</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><? echo $data_mhs[nama]?></strong></td>
	<td width="32%" align="right"><strong>TAHUN AKADEMIK</strong></td>
	<td width="2%"><strong>:</strong></td>
	<td width="20%"><strong><?echo $th;?></strong></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
<tr><td width="12%"><strong>SEMESTER</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%"><strong><?echo"$data_smt[semester]";?>&nbsp;(<?echo"$data_smt[kata]";?>&nbsp;/ <? echo"$data_smt[ganjil_genap]";?>)</strong></td>
	    <td width="32%" align="right"></td>
	<td width="2%" align="center"><strong></strong></td>
	<td width="20%"></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
<tr><td width="12%"></td>
	<td width="2%"></td>
    <td width="16%"></td>
    <td width="12%"></td>
	<td width="2%"></td>
	<td width="20%"></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
</table>
  
<div align="right"><strong><font color="#FF0000">Pilih Mata Kuliah Yang Mau Dihapus</font></strong> 
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas"><div align="center"><strong>NO</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Kode Matkul</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nama Matkul</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Jumlah SKS</strong></div></td>
				  <td class="kotak"><div align="center"><strong>Aksi</strong></div></td>
<?
$ambil_krs= mysql_query("SELECT *FROM krs_khs where nim='$data_mhs[nim]' and th_akademik='$th' and id_smt='$data_smt[id_smt]'");
$nos=0;
while ($data_krs = mysql_fetch_array($ambil_krs))
	{
		$cekquery= mysql_query("select * from matkul where id_mk='$data_krs[id_mk]'");
			while ($data = mysql_fetch_array($cekquery))
				{

$nos++;
	?>
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo $nos; ?></td>
				  <td class="kiribawah" align="left"><? echo"$data[kode_mk]";?></td>
                  <td class="kiribawah" align="left"><? echo"$data[matkul]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data[sks]";?></td>
				  <td class="kiribawahkanan" align="center"><input type="submit" name="proses" value="Hapus">
				  		  <input name="q" type="hidden" value="<? echo"$q";?>">
	 <input name="m" type="hidden" value="<? echo"$m";?>">
	 <input name="lum" type="hidden" value="<? echo"$lum";?>">
	<input name="san" type="hidden" value="<? echo $san;?>">
	<input name="ter" type="hidden" value="<? echo $ter;?>">
	<input name="aka" type="hidden" value="<? echo $aka;?>">
	<input name="token" type="hidden" value="<? echo $token;?>">
	 <input name="id_krs" type="hidden" value="<? echo"$data_krs[id_krs_perawat]";?>"></td>                                
    <? 
	}
	}
	?>	 
  </table>
  </form>
<?
}
?>
