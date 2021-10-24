<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=document_name.xls");
header("Pragma: no-cache");
header("Expires: 0"); 
include ("server.php");
include ("tgl_indo.php");
$th_sekarang=date ("Y");
$nim = addslashes  (strip_tags ($_GET[nim]));
$id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
$semester = addslashes (stripslashes (strip_tags ($_GET[semester])));
$th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));

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

$ambil_pa=mysql_query("select *from pembimbing_akademik where id_prodi='$data_mhs[id_prodi]'");
$data_pa=mysql_fetch_array($ambil_pa);

$cekquery7= "SELECT *from kop where baris_kop<'5'";
$hacekquery7=mysql_query($cekquery7);
?>
<html>
<head>
<title>KARTU HASIL STUDI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body bgProperties="fixed">
<table width="100%" border="0" align="center" class="tnr_huruf_sedang">
    <tr>
	
	  <td colspan="6"><? while ($data = mysql_fetch_array($hacekquery7)){
 echo "$data[isi_kop]<br>";
}
?></td>	
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">  
    <td colspan="7"><center><p class="tnr"><strong><font size="3"><u>KARTU HASIL STUDI KOMULATIF</u></font><br>T.A <?echo $th_akademik;?></strong></p></center></td>
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">
  <tr> 
    <td width="10%">No. Mhs </td>
    <td width="30%" align="left" colspan="3"><strong>&nbsp;&nbsp;: </strong><?echo $data_mhs[nim]?></td>
    <td width="10%" align="left" colspan="2">Program Studi</td>
    <td width="10%" align="left"><strong>&nbsp;&nbsp;: </strong><?echo $data_prodi[nama_prodi]?></td>
  </tr>
  <tr> 
    <td width="10%">Nama </td>
    <td width="30%" align="left" colspan="3"><strong>&nbsp;&nbsp;: </strong><?echo $data_mhs[nama]?></td>
    <td width="10%" align="left" colspan="2">Jenjang</td>
    <td width="10%" align="left"><strong>&nbsp;&nbsp;: </strong><?echo $data3[jenjang]?></td>
  </tr>
</table>
<br>
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
		$ambil_krs2= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='$data_smt[id_smt]' and th_akademik='$th_akademik'";
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
    <td>&nbsp;</td>
    <td align="left" colspan="2">Jumlah Bobot Nilai</td>
    <td colspan="4">&nbsp;<strong>: <? echo(number_format($tot_bobot2,2,chr(44),"."));?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" colspan="2">Jumlah SKS</td>
    <td colspan="4">&nbsp;<strong>: <? echo"$tot_sks2";?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" colspan="2">Indek Prestasi Komulatif</td>
    <td colspan="4">&nbsp;<strong>: <? echo(number_format($ip2,2,chr(44),"."));?></strong></td>
  </tr>
</table><BR>
<?
$ambil_bak=mysql_query("select *from kajur");
$data_bak=mysql_fetch_array($ambil_bak);

$ambil_kaprodi=mysql_query("select *from pudir");
$data_kaprodi=mysql_fetch_array($ambil_kaprodi);

$ambil_ttd=mysql_query("select *from tanggal_ttd");
$data_ttd=mysql_fetch_array($ambil_ttd);
?>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">
  <tr> 
    <td width="15%" colspan="2">&nbsp;</td>
    <td width="70%" align="center" colspan="3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left" width="15%" colspan="2"><?echo $data_ttd[tempat_tanggal]?></td>
  </tr>
  <tr> 
    <td align="left" colspan="2"><?echo $data_bak[jabatan]?></td>
    <td align="center" colspan="3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left" colspan="2"><?echo $data_kaprodi[jabatan]?></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
    <td align="center" colspan="3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left" colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
    <td align="center" colspan="3">&nbsp;</td>
    <td align="left" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" colspan="2"><?echo $data_bak[nama]?></td>
    <td align="center" colspan="3">&nbsp;</td>
    <td align="left" colspan="2"><?echo $data_kaprodi[nama]?> <br>NRY : <?echo $data_kaprodi[nip]?></td>
  </tr>
</table>
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

</body>
</html>
