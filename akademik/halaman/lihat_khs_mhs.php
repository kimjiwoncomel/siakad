<?

require ("server.php");
include ("tgl_indo.php");



$sk=$_POST[sk];
$th_sekarang=date ("Y");
$ambil_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas = mysql_fetch_array($ambil_kelas);

$ambil_semester= mysql_query("SELECT *from semester_berapa where semester='$semester'");
$data_semester=mysql_fetch_array($ambil_semester);

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$nim'");
$data_mhs = mysql_fetch_array($ambil_mhs);
$id_mhs = addslashes (stripslashes (strip_tags ($data_mhs[id_mhs])));

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$data_semester[semester]'");
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_prodi=mysql_query("SELECT *FROM prod where id_prodi='$data_mhs[id_program]'");
$data_prodi=mysql_fetch_array($ambil_prodi);

$ambil_pa=mysql_query("select *from pembimbing_akademik where id_prodi='$data_mhs[id_kelas]'");
$data_pa=mysql_fetch_array($ambil_pa);

$ambil_khs=mysql_query("select *from tabel_semester where status_khs='1'");
$data_khs=mysql_fetch_array($ambil_khs);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body bgProperties="fixed">
<table width="100%" border="0" align="center" class="tnr_huruf_kecil" >  
    <td>&nbsp;</td>
    <td><center><p class="tnr"><strong><font size="3"><u>KARTU HASIL STUDI KOMULATIF</u></font><br>T.A <?echo $th_akademik;?></strong></p></center></td>
    <td>&nbsp;</td>
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil" bgcolor="#CCCCCC">
  <tr> 
    <td width="15%">No. Mhs</td>
    <td width="2%"><strong>:</strong></td>
    <td width="30%" align="left"><?echo $data_mhs[nim]?></td>
    <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td width="20%" align="left">Program Studi</td>
    <td width="2%" align="center"><strong>:</strong></td>
    <td width="30%"><?echo $data_mhs[jurusan]?></td>
  </tr>
  <tr> 
    <td width="15%">Nama</td>
    <td width="2%"><strong>:</strong></td>
    <td width="30%" align="left"><?echo $data_mhs[nama]?></td>
    <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td width="20%" align="left">Jenjang</td>
    <td width="2%" align="center"><p class="" align="center"><strong>:</strong></p></td>
    <td width="30%"><?echo $data_mhs[program]?></td>
  </tr>
</table>
<br><br>
 <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tnr_huruf_kecil">
                <tr bgcolor="#FFFFFF"> 
                  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>NO</strong></div></td>
                  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>KODE</strong></div></td>
                  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>MATA KULIAH</strong></div></td>
				  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>SKS</strong></div></td>
				  <td class="kiribawahatas" colspan="2" height="30"><div align="center"><strong>NILAI</strong></div></td>
				  <td class="kotak" rowspan="2"><div align="center"><strong>TOTAL</strong></div></td>
                  <tr>
				  <td class="kiribawah" height="30"><div align="center"><strong>HURUF</strong></div></td>
				  <td class="kiribawah"><div align="center"><strong>BOBOT</strong></div></td>
<?
$ambil_smt2=mysql_query("SELECT *FROM semester_berapa where semester='$data_semester[semester]'");
while ($data_smt2=mysql_fetch_array($ambil_smt2)){
$batas_smt=$data_smt2[no_urut];
}

	$batas_smt2=max($batas_smt,$batas_smt,$batas_smt);

		$ambil_krs_komulatif= "SELECT *from krs_khs where id_mhs='$data_khs[id_mhs]' and th_akademik='$th_akademik' and id_smt<='$batas_smt2'";
		$krs1=mysql_query($ambil_krs_komulatif);
		echo mysql_error();
		$noUrut = 0;
		while ($data_krs = mysql_fetch_array($krs1))
			{
				$cekquery= mysql_query("select * from matkul where id_mk='$data_krs[id_mk]' order by id_smt asc");
					while ($data = mysql_fetch_array($cekquery))
						{
							$noUrut++;
							$tot_sks+=$data[sks];
							$bobot=$data[sks]*$data_krs[nilai_khs_bobot];
							$tot_bobot+=$bobot;
							$ip=$tot_bobot/$tot_sks;
?>
	</tr><tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center" height="30"><? echo "$noUrut" ?></td>
				  <td class="kiribawah" align="center">&nbsp;&nbsp;<? echo"$data[kode_mk]";?></td>
				  <td class="kiribawah" align="left">&nbsp;&nbsp;<? echo"$data[matkul]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data[sks]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data_krs[nilai_khs_huruf]";?></td>
				  <td class="kiribawah" align="center"><? echo (number_format($data_krs[nilai_khs_bobot],2,chr(44),"."));?></td>
				  <td class="kiribawahkanan" align="center"><? echo (number_format($bobot,2,chr(44),"."));?></td>  
	<? 
	}
	}
	?>	       
	<tr>
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>  
				  <td class="kiribawah" align="center" colspan="2" height="30"><strong>Jumlah</strong></td>  
				  <td class="kiribawah" align="center"><strong><? echo"$tot_sks";?></strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><strong><? echo(number_format($tot_bobot,2,chr(44),"."));?></strong></td>   
	</tr> 
  </table>
<table width="30%" border="0" cellspacing="0" cellpadding="0" class="tnr_huruf_kecil">
  <tr>
    <td>&nbsp;Jumlah Bobot Nilai</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo(number_format($tot_bobot,2,chr(44),"."));?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;Jumlah SKS</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo"$tot_sks";?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;Indek Prestasi Komulatif</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo(number_format($ip,2,chr(44),"."));?></strong></td>
  </tr>
</table>
<hr>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil" >  
    <td>&nbsp;</td>
    <td><center><p class="tnr"><strong><font size="3"><u>KARTU HASIL STUDI PERSEMESTER</u></font><br>T.A <?echo $th_akademik;?></strong></p></center></td>
    <td>&nbsp;</td>
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil" bgcolor="#CCCCCC">
        <tr> 
          <td width="12%">No. Mhs</td>
          <td width="2%"><strong>:</strong></td>
          <td width="16%" align="left"><?echo $data_mhs[nim]?></td>
          <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
          <td width="20%" align="left">Program Studi</td>
          <td width="2%" align="center"><strong>:</strong></td>
          <td width="30%"><?echo $data_mhs[jurusan]?></td>
        </tr>
        <tr> 
          <td width="15%">Nama</td>
          <td width="2%"><strong>:</strong></td>
          <td width="30%" align="left"><?echo $data_mhs[nama]?></td>
          <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
          <td width="12%" align="left">Semester</td>
          <td width="2%" align="center"><p class="" align="center"><strong>:</strong></p></td>
          <td width="20%"><? echo $data_smt[semester]?> (<? echo $data_smt[kata]?>) / <? echo $data_smt[ganjil_genap]?></td>
        </tr>
        <tr>
          <td width="12%">Dosen  P.A</td>
          <td width="2%"><strong>:</strong></td>
          <td width="16%"><?echo $data_pa[nama]?></td>
          <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
          <td width="12%" align="left">Jenjang</td>
          <td width="2%" align="center"><strong>:</strong></td>
          <td width="20%"><?echo $data_prodi[jenjang]?></td>
        </tr>
</table><br><br>
 <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tnr_huruf_kecil">
                <tr bgcolor="#FFFFFF"> 
                  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>NO</strong></div></td>
                  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>KODE</strong></div></td>
                  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>MATA KULIAH</strong></div></td>
				  <td class="kiribawahatas" rowspan="2"><div align="center"><strong>SKS</strong></div></td>
				  <td class="kiribawahatas" colspan="2" height="30"><div align="center"><strong>NILAI</strong></div></td>
				  <td class="kotak" rowspan="2"><div align="center"><strong>TOTAL</strong></div></td>
                  <tr>
				  <td class="kiribawah" height="30"><div align="center"><strong>HURUF</strong></div></td>
				  <td class="kiribawah"><div align="center"><strong>BOBOT</strong></div></td>
<?
		$ambil_krs2= "SELECT *from krs_khs where id_mhs='$data_khs[id_mhs]' and id_smt='$data_smt[id_smt]' and th_akademik='$th_akademik'";
		$krs12=mysql_query($ambil_krs2);
		echo mysql_error();
		$noUrut2 = 0;
		while ($data_krs2 = mysql_fetch_array($krs12))
			{
				$cekquery2= mysql_query("select * from matkul where id_mk='$data_krs2[id_mk]' order by id_smt asc");
					while ($data2 = mysql_fetch_array($cekquery2))
						{
							$noUrut2++;
							$tot_sks2+=$data2[sks];
							$bobot2=$data2[sks]*$data_krs2[nilai_khs_bobot];
							$tot_bobot2+=$bobot2;
							$ip2=$tot_bobot2/$tot_sks2;
?>
	</tr><tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center" height="30"><? echo "$noUrut2" ?></td>
				  <td class="kiribawah" align="center">&nbsp;&nbsp;<? echo"$data2[kode_mk]";?></td>
				  <td class="kiribawah" align="left">&nbsp;&nbsp;<? echo"$data2[matkul]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data2[sks]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data_krs2[nilai_khs_huruf]";?></td>
				  <td class="kiribawah" align="center"><? echo (number_format($data_krs2[nilai_khs_bobot],2,chr(44),"."));?></td>
				  <td class="kiribawahkanan" align="center"><? echo (number_format($bobot2,2,chr(44),"."));?></td>  
	<? 
	}
	}
	?>	       
	<tr>
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>  
				  <td class="kiribawah" align="center" colspan="2" height="30"><strong>Jumlah</strong></td>  
				  <td class="kiribawah" align="center"><strong><? echo"$tot_sks2";?></strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><strong><? echo(number_format($tot_bobot2,2,chr(44),"."));?></strong></td>   
	</tr> 
  </table>
<table width="30%" border="0" cellspacing="0" cellpadding="0" class="tnr_huruf_kecil">
  <tr>
    <td>&nbsp;Jumlah Bobot Nilai</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo(number_format($tot_bobot2,2,chr(44),"."));?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;Jumlah SKS</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo"$tot_sks2";?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;Indek Prestasi Komulatif</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo(number_format($ip2,2,chr(44),"."));?></strong></td>
  </tr>
</table>  
</body>
</html>
