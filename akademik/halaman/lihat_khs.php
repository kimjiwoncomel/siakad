<?
include("server.php");
include ("tgl_indo.php");
$th_sekarang=date ("Y");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$nim = addslashes  (strip_tags ($_GET[nim]));
$id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
$semester = addslashes (stripslashes (strip_tags ($_GET[semester])));
$th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));
$id_prodi = addslashes (stripslashes (strip_tags ($_GET[id_prodi])));
$id_smt = addslashes (stripslashes (strip_tags ($_GET[id_smt])));
$id_kurikulum = addslashes (stripslashes (strip_tags ($_GET[id_kurikulum])));
$id_akademik = addslashes (stripslashes (strip_tags ($_GET[id_akademik])));

$ambil_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas = mysql_fetch_array($ambil_kelas);

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$nim'");
$data_mhs = mysql_fetch_array($ambil_mhs);
$id_mhs = addslashes (stripslashes (strip_tags ($data_mhs[id_mhs])));

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$semester'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_prodi=mysql_query("SELECT *FROM prodi ");
echo mysql_error();
$data_prodi=mysql_fetch_array($ambil_prodi);


$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);


$ambil_pa=mysql_query("select *from pembimbing_akademik where id_prodi='$data_mhs[id_kurikulum]'");
$data_pa=mysql_fetch_array($ambil_pa);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body bgProperties="fixed">
<table width="100%" border="0">
<tr><td align="left">
<? echo"<a href='home_admin.php?file=hasil cetak nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'><strong><font color='#0000FF'>Kembali</font></strong></a>";?>
</td><td align="right">
<? echo"<a href='./halaman/cetak_khs.php?nim=$nim&semester=$semester&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik' target='_blank'><strong><font color='#0000FF'>Cetak Nilai KHS</font></strong></a>";?>
</td></tr>
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">  
    <td>&nbsp;</td>
    <td><center><p class="tnr"><strong><font size="3"><u>KARTU HASIL STUDI KOMULATIF</u></font><br>T.A <?echo $th_akademik;?></strong></p></center></td>
    <td>&nbsp;</td>
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">
  <tr> 
    <td width="15%">No. Mhs</td>
    <td width="2%"><strong>:</strong></td>
    <td width="30%" align="left"><?echo $data_mhs[nim]?></td>
    <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td width="20%" align="left">Program Studi</td>
    <td width="2%" align="center"><strong>:</strong></td>
    <td width="30%"><?echo $data_prodi[nama_prodi]?></td>
  </tr>
  <tr> 
    <td width="15%">Nama</td>
    <td width="2%"><strong>:</strong></td>
    <td width="30%" align="left"><?echo $data_mhs[nama]?></td>
    <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td width="20%" align="left">Jenjang</td>
    <td width="2%" align="center"><p class="" align="center"><strong>:</strong></p></td>
    <td width="30%"><?echo $data3[jenjang]?></td>
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
$ambil_smt2=mysql_query("SELECT *FROM semester_berapa where semester='$semester'");
while ($data_smt2=mysql_fetch_array($ambil_smt2)){
$batas_smt=$data_smt2[no_urut];
}

	$batas_smt2=max($batas_smt,$batas_smt,$batas_smt);

		$ambil_krs_komulatif= "SELECT *from krs_khs where id_mhs='$id_mhs' and th_akademik='$th_akademik' and id_smt='$id_smt'";
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
    <td>&nbsp;Indek Prestasi Semester</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><? echo(number_format($ip,2,chr(44),"."));?></strong></td>
  </tr>
</table>
<hr>
<?
		$ceksks= "SELECT *from krs_khs where id_mhs='$id_mhs'";
		$haceksks=mysql_query($ceksks);
		echo mysql_error();
		$noUrut = 0;
		while ($sks = mysql_fetch_array($haceksks)){
		$cek= "SELECT *from matkul where id_mk='$sks[id_mk]' ";
		$hacek=mysql_query($cek);
		echo mysql_error();
		$noUrut = 0;
		while ($sks2 = mysql_fetch_array($hacek)){
		$noUrut++;
		$jum_sks+=$sks2[sks];
		$berat=$sks2[sks]*$sks[nilai_khs_bobot];
		$jum_bobot+=$berat;
		$ipk=$jum_bobot/$jum_sks;
?>
	
	<? 
	}
	}
	?>	
	
<br>
<br>
</body>
</html>
