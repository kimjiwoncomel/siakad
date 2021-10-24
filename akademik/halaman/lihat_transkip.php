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


$ambil_data= "SELECT *from transkrip where nim='$nim'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2 = mysql_fetch_array($ambil_datanya);

$ambil_data3= "SELECT *from karya_tulis where nim='$data2[nim]'";
$ambil_datanya3=mysql_query($ambil_data3);
echo mysql_error();
$data3 = mysql_fetch_array($ambil_datanya3);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?echo"$data2[nama]";?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
if (typeof document.onselectstart!="undefined") {
document.onselectstart=new Function ("return false");
}
else{
document.onmousedown=new Function ("return false");
document.onmouseup=new Function ("return true");
}
</script>
</head>
<body bgProperties="fixed">

<table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'> 
<tr><?
$am_jur= "SELECT *from prodi where id_prodi='$data_jurusan[id_prodi]'";
$s_jur=mysql_query($am_jur);
echo mysql_error();
$d_jurusan = mysql_fetch_array($s_jur);

$perintah3="select *from jenjang where id_jenjang='$d_jurusan[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
?>
    <td><center>
      <font size="4"><strong>TRANSKRIP AKADEMIK PRODI <? echo $data3[jenjang];?> <? echo $d_jurusan[nama_prodi];?></strong></font>
    </center></td>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding='1' cellspacing='0' class="">
  <td align="center"><font size="-1"><em>&nbsp;</em></font></td>
</table>
<table width="100%" border="0" align="center" cellpadding='2' cellspacing='2' class="garisbawah">
<tr>
<td></td>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding='0' cellspacing='0' class="garisputih">
<tr>
<td></td>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding='2' cellspacing='2' class="garisatasbesar">
<tr>
<td></td>
</tr>
</table>
<table width="100%" border="0" align="center" class="hurufarial">
<tr><td width="30%"><font size="-1">NAMA LENGKAP&nbsp;<em>(Full Name)</em></font></td>
	<td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="19%" align="left"><font size="-1"><?echo"$data2[nama]";?></font></td>
	<td width="22%"><font size="-1">TANGGAL YUDISIUM&nbsp;<br><em>(Date of Graduation)</em></font></td>
	<td width="2%"><font size="-1"><strong>:</strong></font></td>
	<td width="26%"><font size="-1"><?echo"$data3[tgl_yudisium]";?></font></td>
</tr>
<tr><td width="30%"><font size="-1">NO. INDUK MAHASISWA&nbsp;<br><em>(Student Registration Number)</em></font></td>
	<td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="19%" align="left"><font size="-1"><?echo"$data2[nim]";?></font></td>
    <td width="22%" align="left"><font size="-1">NOMOR IJAZAH&nbsp;<br><em>(Certification Number)</em></font></td>
	<td width="2%"><font size="-1"><strong>:</strong></font></td>
	<td width="26%"><font size="-1"><?echo"$data3[no_ijazah]";?></font></td>
</tr>
<tr><td width="30%"><font size="-1">TEMPAT DAN TANGGAL LAHIR&nbsp;<br><em>(Date and Place Birth)</em></font></td>
	<td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="19%"><font size="-1"><?echo"$data3[ttl]";?></font></td>
    <td width="22%"><font size="-1">NOMOR SERI IJAZAH&nbsp;<br><em>(Certification Serie Number)</em></font></td>
	<td width="2%"><font size="-1"><strong>:</strong></font></td>
	<td width="26%"><font size="-1"><?echo"$data3[no_seri_ijazah]";?></font></td>
</tr>
<tr><td width="30%"><font size="-1">TAHUN MASUK&nbsp;<em>(Year of Entry)</em></font></td>
	<td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="19%"><font size="-1"><?echo"$data3[th_masuk]";?></font></td>
    <td width="22%"></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
</table>
<table width="100%" class="hurufarial"><tr><td><font size="-1"><strong>NILAI UJIAN SEMESTER <em>(Grades in Semester Examinations)</em></strong></font></td></tr></table>
 <table width="101%" border="1" cellpadding="0" cellspacing="0" class="hurufarial">
                <tr bgcolor="#FFFFFF"> 
                  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>NO</strong></div></font></td>
                  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>KODE<BR>MATA KULIAH</strong></div></font></td>
                  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>MATA AJARAN</strong></div></font></td>
				  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>NILAI<br>KREDIT SKS</strong></div></font></td>
				  <td class="kiribawahatas" colspan="2"><font size="-1"><div align="center"><strong>NILAI</strong></div></font></td>
				  <td class="kotak" rowspan="2"><font size="-1"><div align="center"><strong>NILAI X BOBOT</strong></div></font></td>
   <tr>
				  <td class="kiribawah"><font size="-1"><div align="center"><strong>HURUF</strong></div></font></td>
				  <td class="kiribawah"><font size="-1"><div align="center"><strong>ANGKA</strong></div></font></td>
<?
		$cekquery= "SELECT *from transkrip where nim='$nim' order by semester asc";
		$hacekquery=mysql_query($cekquery);
		echo mysql_error();
		$noUrut = 0;
		while ($data = mysql_fetch_array($hacekquery)){
		$noUrut++;
		$tot_sks+=$data[sks];
		$bobot=$data[sks]*$data[angka];
		$tot_bobot+=$bobot;
		$ip=$tot_bobot/$tot_sks;
?>
   </tr><tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut" ?></font></td>
                  <td class="kiribawah" align="center"><font size="-1"><? echo"$data[kode_mk]";?></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data[matkul]";?>&nbsp;&nbsp;<em><? echo"$data[matkul_inggris]";?></em></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data[angka]";?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo"$bobot";?></font></td>  
	<? 
	}
	?>	         
</table>
  
  
<?
		$cekquerye= "SELECT *from tanggal_ttd_transkrip";
		$hacekquerye=mysql_query($cekquerye);
		echo mysql_error();
		$datae = mysql_fetch_array($hacekquerye);
		//=================
?>
<?
		$kajure= "SELECT *from pudir";
		$kajure1=mysql_query($kajure);
		echo mysql_error();
		$data_kajur = mysql_fetch_array($kajure1);
?>
<br>
<table width="100%" border="0" align="center" class="hurufarial">
  <tr>
    <td width="34%" align="left"><font size="-1">Jumlah bobot kredit &nbsp;<em>Credit Values</em></font></td>
	<td width="2%" align="center"><font size="-1"><strong>:</strong></font></td>
	<td width="24%" align="left"><font size="-1"><strong><? echo"$tot_sks";?></strong>&nbsp;SKS / credits</font></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"><font size="-1"><? echo"$datae[tempat_tanggal]"; ?></font></td>
  </tr>
    <tr>
	<td width="34%" align="left"><font size="-1">Jumlah (Bobot x Nilai)&nbsp;<em>Total Points</em></font></td>
	<td width="2%" align="center"><font size="-1"><strong>:</strong></font></td>
	<td width="24%" align="left"><font size="-1"><strong><? echo"$tot_bobot";?></strong></font></td>
    <td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"><font size="-1"><? echo"$data_kajur[jabatan]";?><br><em>(<? echo"$data_kajur[jabatan_inggris]";?>)</em></font></td>
  </tr>
  <tr>
    <td width="34%" align="center"></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="center"></td>
    <td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td width="34%" align="left"><font size="-1">Index Prestasi Komulatif&nbsp;<em>Grade Point Average</em></font></td>
	<td width="2%" align="center"><font size="-1"><strong>:</strong></font></td>
	<td width="24%" align="left"><font size="-1"><strong><? echo(number_format($ip,2,chr(44),"."));?></strong></font></td>
    <td width="2%" align="left">&nbsp;</td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td width="34%" align="left"><font size="-1">Judul Karya Tulus Ilmiah&nbsp;<em>Title of Final Paper</em></font></td>
	<td width="2%" align="center"><font size="-1"><strong>:</strong></font></td>
	<td width="24%" align="center"></td>
    <td width="2%" align="left">&nbsp;</td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td align="left" colspan="4" rowspan="2"><font size="-1"><? echo"$data3[judul]"; ?></font></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"><font size="-1"><? echo"$data_kajur[nama]";?></font></td>
  </tr>
  <tr>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"><font size="-1">NIP . <? echo"$data_kajur[nip]";?></font></td>
  </tr>
</table>
</body>
</html>
<? 
} 

	?>