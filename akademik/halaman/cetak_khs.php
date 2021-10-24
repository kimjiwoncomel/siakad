<?
include("server.php");
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>KARTU HASIL STUDI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body bgProperties="fixed">
<table width="100%" border="0" align="center" class="tnr_huruf_sedang">
    <tr>
    <td width="70"><img src="../images/logo.png" width="78" height="86"></td>
	  <td><? while ($data = mysql_fetch_array($hacekquery7)){
 echo "$data[isi_kop]<br>";
}
?></td>	
</table>
<br>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">  
    <td>&nbsp;</td>
    <td><center><p class="tnr"><strong><font size="3"><u>KARTU HASIL STUDI PERSEMESTER</u></font><br>TAHUN AKADEMIK <?echo $th_akademik;?></strong></p></center></td>
    <td>&nbsp;</td>
</table>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">
        <tr> 
          <td width="12%">No. Mhs</td>
          <td width="2%"><strong>:</strong></td>
          <td width="16%" align="left"><?echo $data_mhs[nim]?></td>
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
</table><br>
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tnr_huruf_kecil">
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

		$krs= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='$data_smt[id_smt]' and th_akademik='$th_akademik' ";
		$lihat_krs=mysql_query($krs);
		echo mysql_error();
		$noUrut2 = 0;
		while ($tampil_krs = mysql_fetch_array($lihat_krs))
			{
			
				$krs_cek= mysql_query("select * from matkul where id_mk='$tampil_krs[id_mk]' order by id_smt asc");
					while ($akhir_krs = mysql_fetch_array($krs_cek))
						{
							$noUrut2++;
							 $jumlah_krs+=$akhir_krs[sks];
							$total_semua=$akhir_krs[sks]*$tampil_krs[nilai_khs_bobot];
						 $total_akhir+=$total_semua;
							$ipk_nya=$total_akhir/$jumlah_krs;
?>

	</tr><tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center" height="30"><? echo "$noUrut2" ?></td>
				  <td class="kiribawah" align="center">&nbsp;&nbsp;<? echo"$akhir_krs[kode_mk]";?></td>
				  <td class="kiribawah" align="left">&nbsp;&nbsp;<? echo"$akhir_krs[matkul]";?></td>
				  <td class="kiribawah" align="center"><? echo"$akhir_krs[sks]";?></td>
				  <td class="kiribawah" align="center"><? echo"$tampil_krs[nilai_khs_huruf]";?></td>
				  <td class="kiribawah" align="center"><? echo (number_format($tampil_krs[nilai_khs_bobot],2,chr(44),"."));?></td>
				  <td class="kiribawahkanan" align="center"><? echo (number_format($total_semua,2,chr(44),"."));?></td>  
	<? 
	}
	}
	?>	       
	<tr>
	<?

		$ambil_total= "SELECT *from krs_khs where id_mhs='$id_mhs' ";
		$kr_total=mysql_query($ambil_total);
		echo mysql_error();
		
		while ($data_kr_total = mysql_fetch_array($kr_total))
			{
			
				$c_total =mysql_query("select * from matkul where id_mk='$data_kr_total[id_mk]'");
					while ($d_total = mysql_fetch_array($c_total))
						{
							
							  $jum_sks_total+=$d_total[sks];
							 $tbobot_total=$d_total[sks]*$data_kr_total[nilai_khs_bobot];
						 $jum_bobot_total+=$tbobot_total;
							$ipk_total_akhir=$tbobot_total/$jum_sks_total;
?>
<? 
	}
	}
	?>
	
		<?

		$krs_1= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='1'  ";
		$lihat_krs_1=mysql_query($krs_1);
		
		while ($tampil_krs_1 = mysql_fetch_array($lihat_krs_1))
			{
			
				$krs_cek_1= mysql_query("select * from matkul where id_mk='$tampil_krs_1[id_mk]'");
					while ($akhir_krs_1 = mysql_fetch_array($krs_cek_1))
						{
							 $jumlah_krs_1+=$akhir_krs_1[sks];
							$total_semua_1=$akhir_krs_1[sks]*$tampil_krs_1[nilai_khs_bobot];
						 $total_akhir_1+=$total_semua_1;
							 $ipk_nya_1=$total_akhir_1/$jumlah_krs_1;
?>
<? 
	}
	}
	?>
	
		<?

		$krs_2= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='2'  ";
		$lihat_krs_2=mysql_query($krs_2);
		
		while ($tampil_krs_2 = mysql_fetch_array($lihat_krs_2))
			{
			
				$krs_cek_2= mysql_query("select * from matkul where id_mk='$tampil_krs_2[id_mk]'");
					while ($akhir_krs_2 = mysql_fetch_array($krs_cek_2))
						{
							 $jumlah_krs_2+=$akhir_krs_2[sks];
							 $bobot_2+=$tampil_krs_2[nilai_khs_bobot];
							$total_semua_2=$akhir_krs_2[sks]*$tampil_krs_2[nilai_khs_bobot];
						 $total_akhir_2+=$total_semua_2;
							$ipk_nya_2=$total_akhir_2/$jumlah_krs_2;
?>
<? 
	}
	}
	?>
	
		<?

		$krs_3= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='3'  ";
		$lihat_krs_3=mysql_query($krs_3);
		
		while ($tampil_krs_3 = mysql_fetch_array($lihat_krs_3))
			{
			
				$krs_cek_3= mysql_query("select * from matkul where id_mk='$tampil_krs_3[id_mk]'");
					while ($akhir_krs_3 = mysql_fetch_array($krs_cek_3))
						{
							 $jumlah_krs_3+=$akhir_krs_3[sks];
							$total_semua_3=$akhir_krs_3[sks]*$tampil_krs_3[nilai_khs_bobot];
						 $total_akhir_3+=$total_semua_3;
							$ipk_nya_3=$total_akhir_3/$jumlah_krs_3;
?>
<? 
	}
	}
	?>
		<?

		$krs_4= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='4'  ";
		$lihat_krs_4=mysql_query($krs_4);
		
		while ($tampil_krs_4 = mysql_fetch_array($lihat_krs_4))
			{
			
				$krs_cek_4= mysql_query("select * from matkul where id_mk='$tampil_krs_4[id_mk]'");
					while ($akhir_krs_4 = mysql_fetch_array($krs_cek_4))
						{
							 $jumlah_krs_4+=$akhir_krs_4[sks];
							$total_semua_4=$akhir_krs_4[sks]*$tampil_krs_4[nilai_khs_bobot];
						 $total_akhir_4+=$total_semua_4;
							$ipk_nya_4=$total_akhir_4/$jumlah_krs_4;
?>
<? 
	}
	}
	?>
		<?

		$krs_5= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='5'  ";
		$lihat_krs_5=mysql_query($krs_5);
		
		while ($tampil_krs_5 = mysql_fetch_array($lihat_krs_5))
			{
			
				$krs_cek_5= mysql_query("select * from matkul where id_mk='$tampil_krs_5[id_mk]'");
					while ($akhir_krs_5 = mysql_fetch_array($krs_cek_5))
						{
							 $jumlah_krs_5+=$akhir_krs_5[sks];
							$total_semua_5=$akhir_krs_5[sks]*$tampil_krs_5[nilai_khs_bobot];
						 $total_akhir_5+=$total_semua_5;
							$ipk_nya_5=$total_akhir_5/$jumlah_krs_5;
?>
<? 
	}
	}
	?>
		<?

		$krs_6= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='6'  ";
		$lihat_krs_6=mysql_query($krs_6);
		
		while ($tampil_krs_6 = mysql_fetch_array($lihat_krs_6))
			{
			
				$krs_cek_6= mysql_query("select * from matkul where id_mk='$tampil_krs_6[id_mk]'");
					while ($akhir_krs_6 = mysql_fetch_array($krs_cek_6))
						{
							 $jumlah_krs_6+=$akhir_krs_6[sks];
							$total_semua_6=$akhir_krs_6[sks]*$tampil_krs_6[nilai_khs_bobot];
						 $total_akhir_6+=$total_semua_6;
							$ipk_nya_6=$total_akhir_6/$jumlah_krs_6;
?>
<? 
	}
	}
	?>
		<?

		$krs_7= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='7'  ";
		$lihat_krs_7=mysql_query($krs_7);
		
		while ($tampil_krs_7 = mysql_fetch_array($lihat_krs_7))
			{
			
				$krs_cek_7= mysql_query("select * from matkul where id_mk='$tampil_krs_7[id_mk]'");
					while ($akhir_krs_7 = mysql_fetch_array($krs_cek_7))
						{
							 $jumlah_krs_7+=$akhir_krs_7[sks];
							$total_semua_7=$akhir_krs_7[sks]*$tampil_krs_7[nilai_khs_bobot];
						 $total_akhir_7+=$total_semua_7;
							 $ipk_nya_7=$total_akhir_7/$jumlah_krs_7;
?>
<? 
	}
	}
	?>
		<?

		$krs_8= "SELECT *from krs_khs where id_mhs='$id_mhs' and id_smt='8'  ";
		$lihat_krs_8=mysql_query($krs_8);
		
		while ($tampil_krs_8 = mysql_fetch_array($lihat_krs_8))
			{
			
				$krs_cek_8= mysql_query("select * from matkul where id_mk='$tampil_krs_8[id_mk]'");
					while ($akhir_krs_8 = mysql_fetch_array($krs_cek_8))
						{
							 $jumlah_krs_8+=$akhir_krs_8[sks];
							$total_semua_8=$akhir_krs_8[sks]*$tampil_krs_8[nilai_khs_bobot];
						 $total_akhir_8+=$total_semua_8;
							 $ipk_nya_8=$total_akhir_8/$jumlah_krs_8;
?>
<? 
	}
	}
	?>
	<?

   if ($data_smt[id_smt]==1){
	  $total_semua_bobot_nilai_1= $total_akhir_1;
 $total_semua_krs_1=$jumlah_krs_1;
  $akhir_semua_1=$total_semua_bobot_nilai_1/$total_semua_krs_1;
	}
        if ($data_smt[id_smt]==2){
	$total_semua_bobot_nilai_2= $total_akhir_1+ $total_akhir_2;
 $total_semua_krs_2=$jumlah_krs_1+$jumlah_krs_2;
  $akhir_semua_2=$total_semua_bobot_nilai_2/$total_semua_krs_2;
	}
	  if ($data_smt[id_smt]==3){
	 $total_semua_bobot_nilai_3= $total_akhir_1+ $total_akhir_2+$total_akhir_3;
 $total_semua_krs_3=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3;
  $akhir_semua_3=$total_semua_bobot_nilai_3/$total_semua_krs_3;
	}
        if ($data_smt[id_smt]==4){

   $total_semua_bobot_nilai_4= $total_akhir_1+ $total_akhir_2+$total_akhir_3+$total_akhir_4;
 $total_semua_krs_4=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3+$jumlah_krs_4;
  $akhir_semua_4=$total_semua_bobot_nilai_4/$total_semua_krs_4;
	}
	if ($data_smt[id_smt]==5){
	  
   $total_semua_bobot_nilai_5= $total_akhir_1+ $total_akhir_2+$total_akhir_3+$total_akhir_4+$total_akhir_5;
 $total_semua_krs_5=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3+$jumlah_krs_4+$jumlah_krs_5;
  $akhir_semua_5=$total_semua_bobot_nilai_5/$total_semua_krs_5;
	}
        if ($data_smt[id_smt]==6){

   $total_semua_bobot_nilai= $total_akhir_1+ $total_akhir_2+$total_akhir_3+$total_akhir_4+$total_akhir_5+$total_akhir_6;
 $total_semua_krs=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3+$jumlah_krs_4+$jumlah_krs_5+$jumlah_krs_6;
  $akhir_semua=$total_semua_bobot_nilai/$total_semua_krs;
	}
?>
	
				  <td class="kiribawah" align="center"><strong>&nbsp;</strong></td>  
				  <td class="kiribawah" align="center" colspan="2" height="30"><strong>Jumlah</strong></td>  
				  <td class="kiribawah" align="center"><strong><? echo"$jumlah_krs";?></strong></td>
				  <td class="kiribawah" align="left"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center"><strong><? echo(number_format($total_akhir,2,chr(44),"."));?></strong></td>   
	</tr> 
  </table>
<table width="30%" border="0" cellspacing="0" cellpadding="0" class="tnr_huruf_kecil">
   <tr>
    <td>&nbsp;</td>
    <td align="center"><strong> </strong></td>
    <td>&nbsp;<strong></strong></td>
	   <td>&nbsp;<strong></strong></td>
	
  </tr>
  <tr>
    <td>&nbsp;Indek Prestasi Semester</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong> <? echo(number_format($total_akhir,2,chr(44),"."));?><br>_____</strong></td>
	<td align="center" rowspan="2"><strong>: <? echo(number_format($ipk_nya,2,chr(44),"."));?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><strong> </strong></td>
    <td>&nbsp;&nbsp;&nbsp;<strong><? echo"$jumlah_krs";?> </strong></td>
	
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td align="center"><strong> </strong></td>
    <td>&nbsp;<strong></strong></td>
	   <td>&nbsp;<strong></strong></td>
	
  </tr>
  <tr>
  <?
  $jum_bobot2;
  $jum_sks2;
  $tbobot;
   $ipk=$jum_bobot2/$jum_sks2;
  ?>
    <td>&nbsp;Indek Prestasi Komulatif</td>
    <td align="center"><strong>:</strong></td>
    <td>&nbsp;<strong><?

   if ($data_smt[id_smt]==1){
	  $total_semua_bobot_nilai_1= $total_akhir_1;
 $total_semua_krs_1=$jumlah_krs_1;
  $akhir_semua_1=$total_semua_bobot_nilai_1/$total_semua_krs_1;
    echo(number_format($akhir_semua_1,2,chr(44),"."));
	}
        if ($data_smt[id_smt]==2){
	$total_semua_bobot_nilai_2= $total_akhir_1+ $total_akhir_2;
 $total_semua_krs_2=$jumlah_krs_1+$jumlah_krs_2;
  $akhir_semua_2=$total_semua_bobot_nilai_2/$total_semua_krs_2;
    echo(number_format($akhir_semua_2,2,chr(44),"."));
	}
	  if ($data_smt[id_smt]==3){
	 $total_semua_bobot_nilai_3= $total_akhir_1+ $total_akhir_2+$total_akhir_3;
 $total_semua_krs_3=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3;
  $akhir_semua_3=$total_semua_bobot_nilai_3/$total_semua_krs_3;
    echo(number_format($akhir_semua_3,2,chr(44),"."));
	}
        if ($data_smt[id_smt]==4){

   $total_semua_bobot_nilai_4= $total_akhir_1+ $total_akhir_2+$total_akhir_3+$total_akhir_4;
 $total_semua_krs_4=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3+$jumlah_krs_4;
  $akhir_semua_4=$total_semua_bobot_nilai_4/$total_semua_krs_4;
   echo(number_format($akhir_semua_4,2,chr(44),"."));
	}
	if ($data_smt[id_smt]==5){
	  
   $total_semua_bobot_nilai_5= $total_akhir_1+ $total_akhir_2+$total_akhir_3+$total_akhir_4+$total_akhir_5;
 $total_semua_krs_5=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3+$jumlah_krs_4+$jumlah_krs_5;
  $akhir_semua_5=$total_semua_bobot_nilai_5/$total_semua_krs_5;
   echo(number_format($akhir_semua_5,2,chr(44),"."));
	}
        if ($data_smt[id_smt]==6){

   $total_semua_bobot_nilai= $total_akhir_1+ $total_akhir_2+$total_akhir_3+$total_akhir_4+$total_akhir_5+$total_akhir_6;
 $total_semua_krs=$jumlah_krs_1+$jumlah_krs_2+$jumlah_krs_3+$jumlah_krs_4+$jumlah_krs_5+$jumlah_krs_6;
  $akhir_semua=$total_semua_bobot_nilai/$total_semua_krs;
  echo(number_format($akhir_semua,2,chr(44),"."));
	}
?>


	</strong></td>
	<td align="center"><strong></strong></td>
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
    <td width="15%">&nbsp;</td>
    <td width="65%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left" width="20%"><?echo $data_ttd[tempat_tanggal]?></td>
  </tr>
  <tr> 
    <td align="left"><?echo $data_bak[jabatan]?></td>
    <td align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left"><?echo $data_kaprodi[jabatan]?></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><?echo $data_bak[nama]?></td>
    <td align="center">&nbsp;</td>
    <td align="left"><?echo $data_kaprodi[nama]?><br>NRY : <?echo $data_kaprodi[nip]?></td>
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
<BR>
<br>
<br>
<BR>
</body>
</html>
