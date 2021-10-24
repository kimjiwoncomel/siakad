<?
require ("server.php");
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
$data2 = mysql_fetch_array($ambil_datanya);

$ambil_data3= "SELECT *from karya_tulis where nim='$data2[nim]'";
$ambil_datanya3=mysql_query($ambil_data3);
echo mysql_error();
$data3 = mysql_fetch_array($ambil_datanya3);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
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
    <td width="10%"><font size="-1">Nama Mahasiswa / Awaded To</font></td>
    <td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="25%" align="left"><font size="-1"><?echo"$data2x[nama]";?></font></td>
    <td width="20%"><font size="-1">&nbsp;</font></td>
    <td width="2%"><font size="-1"><strong></strong></font></td>
    <td width="30%"><font size="-1"></font></td>
  </tr>
  <tr>
    <td width="10%"><font size="-1">NIM</font></td>
    <td width="1%"><font size="-1"><strong>:</strong></font></td>
    <td width="19%" align="left"><font size="-1"><?echo"$data2x[nim]";?></font></td>
    <td width="22%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="2%"><font size="-1">&nbsp;</font></td>
    <td width="26%"><font size="-1">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="30%"><font size="-1">TEMPAT & TANGGAL LAHIR / Place and Date of Birth&nbsp;</font></td>
    <td width="2%"><font size="-1"><strong>:</strong></font></td>
    <td width="30%"><font size="-1"><?echo"$data3x[ttl]";?></font></td>
    <td width="%"><font size="-1"></font></td>
    <td width="1%"><font size="-1"><strong></strong></font></td>
    <td width="25%" align="left"><font size="-1"></font></td>
  </tr>
  <tr>
    <td width="20%"><font size="-1">Program Studi / Study Program&nbsp;</font></td>
    <td width="2%"><font size="-1"><strong>:</strong></font></td>
    <td width="30%"><font size="-1"><?echo"$data3x[ttl]";?></font></td>
    <td width="10%"><font size="-1"></font></td>
    <td width="1%"><font size="-1"><strong></strong></font></td>
    <td width="25%" align="left"><font size="-1"></font></td>
  </tr>
  <tr>
    <td width="20%"><font size="-1">Tanggal Terdaftar / Date of Enrollment&nbsp;</font></td>
    <td width="2%"><font size="-1"><strong>:</strong></font></td>
    <td width="30%"><font size="-1"><?echo"$data3x[ttl]";?></font></td>
    <td width="10%"><font size="-1"></font></td>
    <td width="1%"><font size="-1"><strong></strong></font></td>
    <td width="25%" align="left"><font size="-1"></font></td>
  </tr>
  <tr>
    <td width="20%"><font size="-1">Tanggal Lulus / Date of Graduation&nbsp;</font></td>
    <td width="2%"><font size="-1"><strong>:</strong></font></td>
    <td width="30%"><font size="-1"><?echo"$data3x[ttl]";?></font></td>
    <td width="10%"><font size="-1"></font></td>
    <td width="1%"><font size="-1"><strong></strong></font></td>
    <td width="25%" align="left"><font size="-1"></font></td>
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

	  	  		<tr>
				  <td class="kiribawah" align="center">&nbsp;</td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>SEMESTER I</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1">&nbsp;</font></td>   
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
	
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>IP SEMESTER I</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip,2,chr(44),"."));?></font></td>   
	</tr> 
  		<tr>
				  <td class="kiribawah" align="center">&nbsp;</td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;S<strong>SEMESTER II</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1">&nbsp;</font></td>   
	</tr> 

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
	
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>IP SEMESTER II</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip2,2,chr(44),"."));?></font></td>   
	</tr> 
  		<tr>
				  <td class="kiribawah" align="center">&nbsp;</td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>SEMESTER III</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1">&nbsp;</font></td>   
	</tr> 
 
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
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>IP SEMESTER III</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip3,2,chr(44),"."));?></font></td>   
	</tr> 

  		<tr>
				  <td class="kiribawah" align="center">&nbsp;</td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>SEMESTER IV</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1">&nbsp;</font></td>   
	</tr> 
 
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
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>IP SEMESTER IV</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip4,2,chr(44),"."));?></font></td>   
	</tr> 

  		<tr>
				  <td class="kiribawah" align="center">&nbsp;</td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>SEMESTER V</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1">&nbsp;</font></td>   
	</tr> 
 
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
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>IP SEMESTER V</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip5,2,chr(44),"."));?></font></td>   
	</tr> 

  		<tr>
				  <td class="kiribawah" align="center">&nbsp;</td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>SEMESTER VI</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1">&nbsp;</font></td>   
	</tr> 
 
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
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
                                  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;<strong>IP SEMESTER VI</strong></font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip6,2,chr(44),"."));?></font></td>   
	</tr> 
	<?
	$jum_sks=$tot_sks+$tot_sks2+$tot_sks3+$tot_sks4+$tot_sks5+$tot_sks6;
	$jum_bobot_tot=$tot_bobot+$tot_bobot2+$tot_bobot3+$tot_bobot4+$tot_bobot5+$tot_bobot6;
	$ip_komulatif=$jum_bobot_tot/$jum_sks;
	?>	
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
				  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;JUMLAH</font></td>  
				  <td class="kiribawah" align="center"><font size="-1"><? echo $jum_sks;?></font></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($jum_bobot_tot,2,chr(44),"."));?></font></td>   
	</tr> 
		<tr>
				  <td class="kiribawah" align="center"><font size="-1">&nbsp;</font></td>
				  <td class="kiribawah" align="left"><font size="-1">&nbsp;&nbsp;IP KUMULATIF</font></td>  
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><font size="-1"><? echo(number_format($ip_komulatif,2,chr(44),"."));?></font></td>   
	</tr> 

  </table>
       <p> B. NILAI UJIAN AKHIR PROGRAM (UAP)</p>
        <p>&nbsp;&nbsp;1. LOKAL (LOCAL)</p>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      <tr>
        <td class="kiribawahatas">No</td>
    <td class="kiribawahatas">Materi</td>
    <td class="kotak">Nilai</td>
  </tr>
  <tr>
    <td class="kiribawah">&nbsp;</td>
    <td class="kiribawah">&nbsp;</td>
    <td class="kotak">&nbsp;</td>
  </tr>
  <tr>
    <td class="kiribawah">&nbsp;</td>
    <td class="kiribawah">Indeks Prestasi Ujian Lokal (Grade Point Local Examination)</td>
    <td class="kotak">&nbsp;</td>
  </tr>
</table>
        <br>
        <p>&nbsp;&nbsp;1. NASIONAL (NATIONAL)</p>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      <tr>
        <td class="kiribawahatas">No</td>
    <td class="kiribawahatas">Materi</td>
    <td class="kotak">Nilai</td>
  </tr>
  <tr>
    <td class="kiribawah">&nbsp;</td>
    <td class="kiribawah">&nbsp;</td>
    <td class="kotak">&nbsp;</td>
  </tr>
  <tr>
    <td class="kiribawah">&nbsp;</td>
    <td class="kiribawah">Indeks Prestasi Ujian Nasional (Grade Point National Examination)</td>
    <td class="kotak">&nbsp;</td>
  </tr>
</table>
        <p>Indexs Prestasi Ujian Akhir Program (Grade Point Avarage Of Last Examination)</p>
                <br>
        <p>Judul Karya Tulis ILmiah (Title of Scientific Paper Writing)</p>
        <?
		$ambil_judul= "SELECT *from karya_tulis where nim='$nim'";
		$ambil_judul1=mysql_query($ambil_judul);
		echo mysql_error();
		$ambil_judulnya = mysql_fetch_array($ambil_judul1)
		//=================
?>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      
  <tr>
      <td colspan="2" class="kotak"><? echo $ambil_judulnya[judul];?></td>
    
  </tr>
  <tr>
      <td width="60%" class="kiribawah"class="kiribawahatas"><strong>Indexs Prestasi Kumulatif (Cummulative Grade Point Avarage)</strong></td>
      <td width="10%" class="kotak">=</td>
  </tr>
</table>
        <br>
<table width="100%" border="0" align="center" class="hurufarial">
    
  <tr>
    <td width="10%"></td>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td width="10%"></td>
    <td width="1%"><font size="-1"></font></td>
    <td width="19%" align="left"><font size="-1"></font></td>
    <td width="22%" align="left">&nbsp;</td>
    <td width="2%"><font size="-1">&nbsp;</font></td>
    <td width="26%"><font size="-1">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="10%"></td>
    <td width="1%"><font size="-1">&nbsp;</font></td>
    <td width="19%" align="left"><font size="-1"></font></td>
    <td width="22%" align="left">&nbsp;</td>
    <td width="2%"><font size="-1">&nbsp;</font></td>
    <td width="26%"><font size="-1">&nbsp;</font></td>
  </tr>

  <tr>
    <td width="10%"></td>
    <td width="1%"><font size="-1">&nbsp;</font></td>
    <td width="19%" align="left" colspan="3"><font size="-1"><? echo"$ambil_judulnya[judul]"; ?></font></td>
    <td width="2%"><font size="-1">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="10%"></td>
    <td width="1%"><font size="-1">&nbsp;</font></td>
    <td width="19%" align="left">&nbsp;</font></td>
    <td width="2%"><font size="-1"></font></td>
    <td width="2%"><font size="-1">&nbsp;</font></td>
    <td width="2%"><font size="-1">&nbsp;</font></td>
  </tr>
</table>
<?
		$cekquerye= "SELECT *from tanggal_ttd";
		$hacekquerye=mysql_query($cekquerye);
		echo mysql_error();
		$datae = mysql_fetch_array($hacekquerye)
		//=================
?>
<?
	$kajure2=mysql_query("SELECT *FROM penandatangan where id_arsip='1' and id_prodi='$data_jurusan[id_program]' ");
		$kajure1=mysql_query($kajure);
		echo mysql_error();
		$data_kajur = mysql_fetch_array($kajure1)
?>
<?
		$kajure2=mysql_query("SELECT *FROM penandatangan where id_arsip='3' and id_prodi='$data_jurusan[id_program]' ");
		$kajure2=mysql_query($kajure2);
		echo mysql_error();
		$data_kajur2 = mysql_fetch_array($kajure2)
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
    <td width="34%" align="center"><font size="-1">Mengetahui</font></td>
	<td width="2%" align="center"></td>
	<td width="24%" align="left"></td>
	<td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="left"></td>
  </tr>
    <tr>
	<td width="34%" align="center"><font size="-1"><? echo"$data_kajur[jabatan]"; ?></font></td>
	<td width="2%" align="center"><font size="-1">&nbsp;</font></td>
	<td width="24%" align="left"><font size="-1">&nbsp;</font></td>
    <td width="2%" align="center"></td>
    <td width="4%" align="center"></td>
    <td width="34%" align="center"><font size="-1"><? echo"$data_kajur2[jabatan]";?></font></td>
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
<p>Keterangan / Notes :</p>
  <table width="100%" border="0" class="garisbawah, hurufarial" align="center" cellpadding='1'>
      
  <tr>
    <td><table width="75%" border="1">
  <tr>
    <td>Huruf mutu / Mark</td>
    <td>Angka mutu / Score</td>
    <td>Sebutan / Profincy</td>
  </tr>
  <?
		$nilai= "SELECT *from nilai_transkip";
		$nilai1=mysql_query($nilai);
		
		while($data_nilai = mysql_fetch_array($nilai1))
                {
?>
  <tr>
    <td><? echo $data_nilai[huruf];?></td>
    <td><? echo $data_nilai[angka];?></td>
    <td><? echo $data_nilai[sebutan];?>&nbsp;</td>
  </tr>
  <? 
  }
  ?>
</table></td>
     <td><table width="75%" border="1">
  <tr>
    <td>Idexs Prestasi Kumulatif (IPK) / Grade Point Avarege (GPA)</td>
    <td>Yudisium Kelulusan  / Pronficieny Status</td>
   
  </tr>
  <?
		$tran= "SELECT *from nilai_index";
		$tran1=mysql_query($tran);
		
		while($data_tran = mysql_fetch_array($tran1))
                {
?>
  <tr>
    <td><? echo $data_tran[indexs];?></td>
    <td><? echo $data_tran[yudisium];?></td>
 
  </tr>
  <? 
  }
  ?>
</table></td>
  </tr>
  </table>

<br>

</body>
</html>
