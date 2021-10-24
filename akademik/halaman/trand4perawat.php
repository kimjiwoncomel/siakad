<?
require ("server.php");
include ("includan/uang_huruf.php");
include ("huruf/uang_huruf.php");
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_mhs=$_GET[id_mhs];

$ambil_jur= "SELECT *from tb_mahasiswa where id_mhs='$id_mhs'";
$si_jur=mysql_query($ambil_jur);
echo mysql_error();
$data_jurusan = mysql_fetch_array($si_jur);



$pin_enkrip = base64_decode(stripslashes (strip_tags ($_GET[p])));
$no_pin=$pin_enkrip;
$kuncinya=date ('YmdH');
$key="486";

$token=$_GET['token'];
$cek=md5(md5($no_pin).md5("$kuncinya$key"));


$ambil_data= "SELECT *from transkrip where nim='$data_jurusan[nim]'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2x = mysql_fetch_array($ambil_datanya);

$ambil_data3= "SELECT *from karya_tulis where nim='$data2x[nim]'";
$ambil_datanya3=mysql_query($ambil_data3);
echo mysql_error();
$data3x = mysql_fetch_array($ambil_datanya3);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {font-size: 12px}
.style4 {
	font-size: 14px;
	font-style: italic;
}
-->
</style>
</head>
<body bgProperties="fixed">
    <table width="100%" align="center" border="0" class="tnr"><tr><tr><td align="right"></td></tr><td>
<?
include "kop_kwitansi.php";
?>
        </td></tr></table><br><br>
<table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'> 
<tr>
    <td><center><font size="3"><strong>TRANSKRIP AKADEMIK / ACADEMIC TRANSCRIPT</strong></font></center></td>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding='1' cellspacing='0' class="">
  <td align="center"><font size="-1">&nbsp;</font></td>
</table>
<table width="100%" border="0" align="center" class="hurufarial">
  <tr>
    <td width="22%"><font size="-1">Nama Mahasiswa / <em>Student Name </em></font></td>
    <td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="22%" align="left"><font size="-1"><?echo"$data2x[nama]";?></font></td>
    <td width="2%">&nbsp;</td>
 <td width="20%"><font size="-1">Program Studi : D-IV Keperawatan<br>
    <em>Study Program   :   Diploma IV Nurshing </em></font></td>
    <td width="33%" rowspan="4" valign="top"><font size="-1"><table width="132" height="146" border="1" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</font></td>
  </tr>
  <tr>
    <td width="22%"><font size="-1">Nomor Induk Mahasiswa/<em>Student Registered Number </em></font></td>
    <td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="22%" align="left"><font size="-1"><?echo"$data2x[nim]";?></font></td>
    <td width="2%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="20%"><font size="-1">&nbsp;</font></td>

  </tr>
  <tr>
    <td width="22%"><font size="-1">TEMPAT & TANGGAL LAHIR / Place and Date of Birth&nbsp;</font></td>
    <td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="22%"><font size="-1"><?echo"$data3x[ttl]";?></font></td>
    <td width="2%"><font size="-1"></font></td>
    <td width="20%"><font size="-1"><strong></strong></font></td>
   
  </tr>
  <tr>
    <td width="22%"><font size="-1">Tanggal Lulus / Date of Graduation&nbsp;</font></td>
    <td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="22%"><font size="-1"><?echo"$data3x[tgl_yudisium]";?></font></td>
    <td width="2%"><font size="-1"></font></td>
    <td width="20%"><font size="-1"><strong></strong></font></td>
    
  </tr>
</table>
        <P>A. NILAI UJIAN AKHIR SEMESTER</p>
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="hurufarial">
                <tr bgcolor="#FFFFFF"> 
                  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>NO</strong></div></font></td>
                  
                  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>MATA AJARAN</strong></div></font></td>
				  <td class="kiribawahatas" rowspan="2"><font size="-1"><div align="center"><strong>BOBOT<br>KREDIT</strong></div></font></td>
				  <td class="kiribawahatas" colspan="2"><font size="-1"><div align="center"><strong>NILAI</strong></div></font></td>
				  <td class="kotak" rowspan="2"><font size="-1"><div align="center"><strong>BOBOT X NILAI</strong></div></font></td>
   <tr>
				  <td class="kiribawah"><font size="-1"><div align="center"><strong>LAMBANG</strong></div></font></td>
				  <td class="kiribawah"><font size="-1"><div align="center"><strong>MUTU</strong></div></font></td>	
   </tr> 

<?
		$cekquery= "SELECT *from transkrip where id_mhs='$id_mhs' and semester='I'";
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
	<tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
            <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut" ?></font></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data[matkul]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo(number_format($data[angka],2,chr(44),"."));?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($bobot,2,chr(44),"."));?></font></td>  
	<? 
	}
	?>	       
    

<?
		$cekquery2= "SELECT *from transkrip where id_mhs='$id_mhs' and semester='II'";
		$hacekquery2=mysql_query($cekquery2);
		echo mysql_error();
		$noUrut2 = $noUrut;
		while ($data2 = mysql_fetch_array($hacekquery2)){
		$noUrut2++;
		$tot_sks2+=$data2[sks];
		$bobot2=$data2[sks]*$data2[angka];
		$tot_bobot2+=$bobot2;
		$ip2=$tot_bobot2/$tot_sks2;
?>
	<tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut2" ?></font></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data2[matkul]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data2[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data2[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo(number_format($data2[angka],2,chr(44),"."));?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($bobot2,2,chr(44),"."));?></font></td>  
	<? 
	}
	?>	       
    
 
<?
		$cekquery3= "SELECT *from transkrip where id_mhs='$id_mhs' and semester='III'";
		$hacekquery3=mysql_query($cekquery3);
		echo mysql_error();
		$noUrut3 = $noUrut2;
		while ($data3 = mysql_fetch_array($hacekquery3)){
		$noUrut3++;
		$tot_sks3+=$data3[sks];
		$bobot3=$data3[sks]*$data3[angka];
		$tot_bobot3+=$bobot3;
		$ip3=$tot_bobot3/$tot_sks3;
?>
	<tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut3" ?></font></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data3[matkul]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data3[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data3[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo(number_format($data3[angka],2,chr(44),"."));?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($bobot3,2,chr(44),"."));?></font></td>  
	<? 
	}
	?>	       
    

 
<?
		$cekquery4= "SELECT *from transkrip where id_mhs='$id_mhs' and semester='IV'";
		$hacekquery4=mysql_query($cekquery4);
		echo mysql_error();
		$noUrut4 = $noUrut3;
		while ($data4 = mysql_fetch_array($hacekquery4)){
		$noUrut4++;
		$tot_sks4+=$data4[sks];
		$bobot4=$data4[sks]*$data4[angka];
		$tot_bobot4+=$bobot4;
		$ip4=$tot_bobot4/$tot_sks4;
?>
   <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut4" ?></font></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data4[matkul]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data4[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data4[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo(number_format($data4[angka],2,chr(44),"."));?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($bobot4,2,chr(44),"."));?></font></td>  
	<? 
	}
	?>	       
    
 
<?
		$cekquery5= "SELECT *from transkrip where id_mhs='$id_mhs' and semester='V'";
		$hacekquery5=mysql_query($cekquery5);
		echo mysql_error();
		$noUrut5 = $noUrut4;
		while ($data5 = mysql_fetch_array($hacekquery5)){
		$noUrut5++;
		$tot_sks5+=$data5[sks];
		$bobot5=$data5[sks]*$data5[angka];
		$tot_bobot5+=$bobot5;
		$ip5=$tot_bobot5/$tot_sks5;
?>
   <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut5" ?></font></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data5[matkul]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data5[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data5[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo(number_format($data5[angka],2,chr(44),"."));?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($bobot5,2,chr(44),"."));?></font></td>  
	<? 
	}
	?>	       
    
 
<?
		$cekquery6= "SELECT *from transkrip where id_mhs='$id_mhs' and semester='VI'";
		$hacekquery6=mysql_query($cekquery6);
		echo mysql_error();
		$noUrut6 = $noUrut5;
		while ($data6 = mysql_fetch_array($hacekquery6)){
		$noUrut6++;
		$tot_sks6+=$data6[sks];
		$bobot6=$data6[sks]*$data6[angka];
		$tot_bobot6+=$bobot6;
		$ip6=$tot_bobot6/$tot_sks6;
?>
   <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center"><font size="-1"><? echo "$noUrut6" ?></font></td>
				  <td class="kiribawah" align="left"><font size="-2">&nbsp;&nbsp;<? echo"$data6[matkul]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data6[sks]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo"$data6[huruf]";?></font></td>
				  <td class="kiribawah" align="center"><font size="-1"><? echo(number_format($data6[angka],2,chr(44),"."));?></font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($bobot6,2,chr(44),"."));?></font></td>  
	<? 
	}
	?>	       
    
	<?
	$jum_sks=$tot_sks+$tot_sks2+$tot_sks3+$tot_sks4+$tot_sks5+$tot_sks6;
	$jum_bobot_tot=$tot_bobot+$tot_bobot2+$tot_bobot3+$tot_bobot4+$tot_bobot5+$tot_bobot6;
	$ip_komulatif=$jum_bobot_tot/$jum_sks;
	?>	
   <tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
				  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;JUMLAH SKS DAN NILAI </font></td>  
				  <td class="kiribawah" align="center"><font size="-1"><? echo $jum_sks;?></font></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($jum_bobot_tot,2,chr(44),"."));?></font></td>   
   </tr> 
	<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
				  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;INDEXS PRESTASI KUMULATIF SEMESTER 1 S/D 6 </font></td>  
				  <td class="kiribawah" align="center">&nbsp;</td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font color="#FFFFFF">&nbsp;</font></td>   
	</tr> 
	</table>
<?
		$cekquerye= "SELECT *from tanggal_ttd where kat='2' and id_prodi='$data_jurusan[id_program]'";
		$hacekquerye=mysql_query($cekquerye);
		echo mysql_error();
		$datae = mysql_fetch_array($hacekquerye)
		//=================
?>
<?
	$kajure=mysql_query("SELECT *FROM penandatangan where id_arsip='1' and kategori='3' and id_prodi='$data_jurusan[id_program]' ");
		echo mysql_error();
		$data_kajur = mysql_fetch_array($kajure);
		
			$kajure1=mysql_query("SELECT *FROM jabatan where id='$data_kajur[kategori]' ");
		echo mysql_error();
		$data_kajur1 = mysql_fetch_array($kajure1);
?>
<?
	$kajure2=mysql_query("SELECT *FROM penandatangan where id_arsip='1' and kategori='4' and id_prodi='$data_jurusan[id_program]' ");
		echo mysql_error();
		$data_kajur2 = mysql_fetch_array($kajure2);
		
			$kajure21=mysql_query("SELECT *FROM jabatan where id='$data_kajur2[kategori]' ");
		echo mysql_error();
		$data_kajur21 = mysql_fetch_array($kajure21);
		
	
?>
<br>
<table width="100%" border="0" align="center" class="hurufarial">
  <tr>
    <td width="34%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1"><? echo"$datae[tempat_tanggal]"; ?></font></td>
  </tr>
  <tr>
    <td width="34%" align="center">&nbsp;</td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"></td>
  </tr>
  <tr>
    <td width="34%" align="center"><div align="center"><? echo"$data_kajur1[jabatan]"; ?></div></td>
	<td width="2%" align="center"><div align="center"></div></td>
	<td width="24%" align="left"><div align="center"></div></td>
	<td width="2%" align="center"><div align="center"></div></td>
    <td width="4%" align="center"><div align="center"></div></td>
    <td width="34%" align="left"><div align="center"><? echo"$data_kajur21[jabatan]";?></div></td>
  </tr>
    <tr>
	<td width="34%" align="center"><font size="-1">(<? echo"$data_kajur1[position]"; ?>)</font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1">(<? echo"$data_kajur21[position]";?>)</font></td>
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
    <td width="34%" align="left"><font size="-1">&nbsp;</font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="2%" align="left">&nbsp;</td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td width="34%" align="left"><font size="-1">&nbsp;</font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="center"></td>
    <td width="2%" align="left">&nbsp;</td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td width="34%" align="center"><font size="-1"><? echo"$data_kajur[nama]"; ?></font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1"><? echo"$data_kajur2[nama]"; ?></font></td>
  </tr>
  <tr>
    <td width="34%" align="center"><font size="-1">NIK : <? echo"$data_kajur[nip]"; ?></font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1">NIK : <? echo"$data_kajur2[nip]"; ?></font></td>
  </tr>
</table>
       <p align="center"><strong>Y U D I S I U M  <br>
       <em>Proficiency</em>
       </strong>
</p>
        <?
		$ambil_p= "SELECT *from praktek where nim='$nim'";
		$ambil_pp=mysql_query($ambil_p);
		echo mysql_error();
		$ambil_pnya = mysql_fetch_array($ambil_pp)
		//=================
?>
        <p>Judul Penulisan Karya Tulis ILmiah (KTI):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
	   &nbsp;&nbsp;&nbsp;<span class="style3">&nbsp;<span class="style4">Title of Scientific Paper &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></p>
	           <?
		$ambil_judul= "SELECT *from karya_tulis where nim='$data_jurusan[nim]'";
		$ambil_judull=mysql_query($ambil_judul);
		echo mysql_error();
		$ambil_judulnya = mysql_fetch_array($ambil_judull)
		//=================
?>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      
  <tr>
      <td class="kotak"><div align="center"><? echo $ambil_judulnya[judul];?><br></div></td>
  </tr>
</table>
       <p align="center"><strong>PERHITUNGAN YUDISIUM <br>
       <em>proficiency System of Grade Point Calculation </em>
       </strong><br>
</p>
<p>1. Nilai A = Indeks Prestasi Kumulatif Semester 1 s/d 6 (Bobot 70%) :<br>
  &nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Grade A = Semester Grade Point Avarange on Study </span></p>
        <?
		$ambil_p= "SELECT *from praktek where nim='$nim'";
		$ambil_pp=mysql_query($ambil_p);
		echo mysql_error();
		$ambil_pnya = mysql_fetch_array($ambil_pp);
		 $titik = number_format($ip_komulatif,2,chr(44),".");
		//=================
?>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      
  <tr>
      <td class="kotak"><div align="center"><? echo(number_format($ip_komulatif,2,chr(44),"."));?><br>
          (<? echo terbilang($titik);?>)<br>
          <? echo(number_format($ip_komulatif,2,chr(44),"."));?><br>
          (<? echo terbilang2($titik);?>)</div></td>
  </tr>
</table>

<p>2. Nilai B = Nilai Ujian Jenjang (Bobot 15 %) :<br>
  &nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Grade B = Exam Test Study </span></p>
        <?
		$ambil_p1= "SELECT *from ujian where nim='$data_jurusan[nim]'";
		$ambil_pp1=mysql_query($ambil_p1);
		echo mysql_error();
		$ambil_pnya1 = mysql_fetch_array($ambil_pp1);
		//=================
?>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
    <?
	  $kuala = $ambil_pnya1[nilai];
	  $kualanya=15*$kuala;
	 $kurla=$kualanya/100;
	 $kur = number_format($kurla,1,chr(44),".");
	  
	  ?>   
  <tr>
      <td class="kotak"><div align="center">15 % dari <? echo(number_format($ambil_pnya1[nilai],2,chr(44),"."));?> = <? echo $kurla;?><br>
          (<? echo terbilang($kur);?>)<br>
          15 % from <? echo(number_format($ambil_pnya1[nilai],2,chr(44),"."));?> = <? echo $kurla;?><br>
          (<? echo terbilang2($kur);?>)</div></td>
  </tr>
</table>
<p>3. Nilai C = Nilai Karya Tulis ilmiah (15%) :<br>
  &nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Grade C = Exam Scientific Paper </span></p>
        <?
		$ambil_p2= "SELECT *from karya_tulis where nim='$data_jurusan[nim]'";
		$ambil_pp2=mysql_query($ambil_p2);
		echo mysql_error();
		$ambil_pnya2 = mysql_fetch_array($ambil_pp2);
		//=================
?>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      <?
	  $kuala2 = $ambil_pnya2[nilai];
	  $kualanya2=15*$kuala2;
	 $kurla2=$kualanya2/100;
	 $kur2 = number_format($kurla2,1,chr(44),".");
	  
	  ?>  
  <tr>
      <td class="kotak"><div align="center">15 % dari <? echo $ambil_pnya2[nilai];?> = <? echo $kurla2;?><br>
                (<? echo terbilang($kur2);?>)<br>
          15 % from <? echo(number_format($ambil_pnya2[nilai],2,chr(44),"."));?> = <? echo $kurla2;?><br>
          (<? echo terbilang2($kur2);?>)</div></td>
  </tr>
</table>
<p>4.  Indeks Prestasi Kumulatif (IPK) Akhir Progam : Nilai A + Nilai B + Nilai C <br>
  &nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Final Grade Point of Study Program </span></p>
        <?
		$total=$kurla+$kurla2+$titik;
?>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      
  <tr>
      <td class="kotak"><div align="center">Nilai A + Nilai B + Nilai C <br>
        <? echo $titik;?> +  <? echo $kurla;?> +  <? echo $kurla2;?> = <? echo $total;?><br>
          Grade A + Grade B + Grade C <br>
           <? echo $titik;?> +  <? echo $kurla;?> +  <? echo $kurla2;?> = <? echo $total;?></div></td>
  </tr>
</table>
<p>Predikat Keberhasilan Akhir Program Pendidikan :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Achivement Proficienty of Final Study Program &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
        <br>
		
<p>4. Sistem Penilaian <br>
  &nbsp;&nbsp;&nbsp;<span class="style3">&nbsp;<span class="style4">Grading System</span></span></p>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
  
      
  <tr>
     <td width="15%">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A : 4<BR>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B : 3<BR>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C : 2<BR>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D : 1<BR>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E : 0</td>
      <td width="85%" valign="top"> <table width="51%" height="96" border="0" align="left" cellpadding='1'>
        <tr>
          <td class="kotak">2,76 - 3,00 </td>
          <td class="kotak">Memuaskan</td>
          <td class="kotak">Satisfaction</td>
        </tr>
        <tr>
          <td class="kotak">3,01 - 3,50 </td>
          <td class="kotak">Sangat Memuaskan </td>
          <td class="kotak">Very Satisfaction </td>
        </tr>
        <tr>
          <td class="kotak">3,51 - 4,00 </td>
          <td class="kotak">Dengan Pujian </td>
          <td class="kotak">Excellence</td>
        </tr>
    </table></td>
  </tr>
</table>
 <?
		$cekquerye= "SELECT *from tanggal_ttd where kat='2' and id_prodi='$data_jurusan[id_program]'";
		$hacekquerye=mysql_query($cekquerye);
		echo mysql_error();
		$datae = mysql_fetch_array($hacekquerye)
		//=================
?>
<?
	$kajure=mysql_query("SELECT *FROM penandatangan where id_arsip='1' and kategori='3' and id_prodi='$data_jurusan[id_program]' ");
		echo mysql_error();
		$data_kajur = mysql_fetch_array($kajure);
		
			$kajure1=mysql_query("SELECT *FROM jabatan where id='$data_kajur[kategori]' ");
		echo mysql_error();
		$data_kajur1 = mysql_fetch_array($kajure1);
?>
<?
	$kajure2=mysql_query("SELECT *FROM penandatangan where id_arsip='1' and kategori='4' and id_prodi='$data_jurusan[id_program]' ");
		echo mysql_error();
		$data_kajur2 = mysql_fetch_array($kajure2);
		
			$kajure21=mysql_query("SELECT *FROM jabatan where id='$data_kajur2[kategori]' ");
		echo mysql_error();
		$data_kajur21 = mysql_fetch_array($kajure21);
		
	
?>
<br>
<table width="100%" border="0" align="center" class="hurufarial">
  <tr>
    <td width="34%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1"><? echo"$datae[tempat_tanggal]"; ?></font></td>
  </tr>
  <tr>
    <td width="34%" align="center">&nbsp;</td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"></td>
  </tr>
  <tr>
    <td width="34%" align="center"><div align="center"><? echo"$data_kajur1[jabatan]"; ?></div></td>
	<td width="2%" align="center"><div align="center"></div></td>
	<td width="24%" align="left"><div align="center"></div></td>
	<td width="2%" align="center"><div align="center"></div></td>
    <td width="4%" align="center"><div align="center"></div></td>
    <td width="34%" align="left"><div align="center"><? echo"$data_kajur21[jabatan]";?></div></td>
  </tr>
    <tr>
	<td width="34%" align="center"><font size="-1">(<? echo"$data_kajur1[position]"; ?>)</font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1">(<? echo"$data_kajur21[position]";?>)</font></td>
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
    <td width="34%" align="left"><font size="-1">&nbsp;</font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="2%" align="left">&nbsp;</td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td width="34%" align="left"><font size="-1">&nbsp;</font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="center"></td>
    <td width="2%" align="left">&nbsp;</td>
    <td width="4%" align="center"></td>
    <td width="34%"></td>
  </tr>
  <tr>
    <td width="34%" align="center"><font size="-1"><? echo"$data_kajur[nama]"; ?></font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1"><? echo"$data_kajur2[nama]"; ?></font></td>
  </tr>
  <tr>
    <td width="34%" align="center"><font size="-1">NIK : <? echo"$data_kajur[nip]"; ?></font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1">NIK : <? echo"$data_kajur2[nip]"; ?></font></td>
  </tr>
</table>

<br>
<br>
<br>

</body>
</html>
