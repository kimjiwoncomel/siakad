<?
include("server.php");

 $id_smt=$_GET[id_smt];
 $nim=$_GET[nim];
 $id_kurikulum=$_GET[id_kurikulum];
 $id_prodi=$_GET[id_prodi];
$pin_enkrip = base64_decode(stripslashes (strip_tags ($_POST[p])));
$no_pin=$pin_enkrip;
$kuncinya=date ('YmdH');
$key="486";

$token=$_GET['token'];
$cek=md5(md5($no_pin).md5("$kuncinya$key"));


$th_sekarang=date ("Y");
$cekAngg_up0="SELECT *from semester_berapa where id_smt='$id_smt'";
$up_Angg0=mysql_query($cekAngg_up0);
echo mysql_error();
$data_up0=mysql_fetch_array($up_Angg0);

$cekAngg_up77="SELECT *from kurikulum where id_kurikulum='$id_kurikulum'";
$up_Angg77=mysql_query($cekAngg_up77);
echo mysql_error();
$data_up77=mysql_fetch_array($up_Angg77);


$cekAngg_up="SELECT *FROM tb_mahasiswa where id_program='$id_prodi' and nim='$nim'";
$up_Angg=mysql_query($cekAngg_up);
echo mysql_error();
$data_up=mysql_fetch_array($up_Angg);
 $data_up[id_mhs];
$data_up0[id_smt];
 $data_up77[id_kurikulum];
$ambil_data= "SELECT *from krs_khs where id_prodi='$id_prodi' and id_mhs='$data_up[id_mhs]' and id_smt='$data_up0[id_smt]'";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data2 = mysql_fetch_array($ambil_datanya);

$matkul_up="SELECT *FROM matkul where id_mk='$data2[id_mk]'";
$up_matkul=mysql_query($matkul_up);
echo mysql_error();
$data_matkul=mysql_fetch_array($up_matkul);

$cekquery7= "SELECT *from jurusan";
$hacekquery7=mysql_query($cekquery7);
echo mysql_error();
$data7 = mysql_fetch_array($hacekquery7);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
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

<table width="100%" border="0" align="center" class="hurufarial">
<tr><td width="25%"><strong>NAMA MAHASISWA</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><?echo"$data_up[nama]";?></strong></td>
    <td width="12%" align="left"></td>
	<td width="2%" align="center"></td>
	<td width="20%"></td>
	<td width="20%"><strong></strong></td>
	<td width="1%"></td>
</tr>
<tr><td width="25%"><strong>NIM</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><?echo"$data_up[nim]";?></strong></td>
    <td width="12%" align="left"></td>
	<td width="2%" align="center"></td>
	<td width="20%"></td>
	<td width="20%"></td>
	<td width="1%"></td>
</tr>
<tr><td width="25%"><strong>ANGKATAN TAHUN</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%"><strong><?echo $data_up[th_masuk]?>/<?echo $data_up[th_masuk]+1?></strong></td>
    <td width="12%" align="left"></td>
	<td width="2%"></td>
	<td width="20%"></td>
	<td width="20%"></td>
	<td width="1%"></td>
</tr>
<tr><td width="25%"><strong>SEMESTER</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="35%"><strong><?echo $data_up0[semester];?>&nbsp;(<?echo $data_up0[kata];?>) , Tahun Akademik <?echo $data2[th_akademik]?></strong></td>
    <td width="12%"></td>
	<td width="2%"></td>
	<td width="20%"></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
</table>
 <table width="100%" border="1" cellpadding="0" cellspacing="0" class="hurufarial">
                <tr bgcolor="#FFFFFF"> 
                  <td class="kiribawahatas" rowspan="2" bgcolor="#00CCFF"><div align="center"><strong>NO</strong></div></td>
                  <td class="kiribawahatas" rowspan="2" bgcolor="#00CCFF"><div align="center"><strong>KODE<BR>MATA KULIAH</strong></div></td>
                  <td class="kiribawahatas" rowspan="2" bgcolor="#00CCFF"><div align="center"><strong>MATA AJARAN</strong></div></td>
				  <td class="kiribawahatas" rowspan="2" bgcolor="#00CCFF"><div align="center"><strong>SKS</strong></div></td>
				  <td class="kiribawahatas" colspan="2" bgcolor="#00CCFF"><div align="center"><strong>NILAI</strong></div></td>
				  <td class="kotak" rowspan="2" bgcolor="#00CCFF"><div align="center"><strong>BOBOT NILAI<BR>(SKS X NILAI MUTU)</strong></div></td>
                  <tr>
				  <td class="kiribawah" bgcolor="#00CCFF"><div align="center"><strong>LAMBANG</strong></div></td>
				  <td class="kiribawah" bgcolor="#00CCFF"><div align="center"><strong>MUTU</strong></div></td>
<?
		$cekquery= "SELECT *from krs_khs where id_prodi='$id_prodi' and id_mhs='$data_up[id_mhs]' and id_smt='$data_up0[id_smt]' order by id_mk asc";
		$hacekquery=mysql_query($cekquery);
		echo mysql_error();
		$noUrut = 0;
		while ($data = mysql_fetch_array($hacekquery)){
		$cekquery_kul= mysql_query("select * from matkul where id_mk='$data[id_mk]'");
			while ($data_kul = mysql_fetch_array($cekquery_kul))
				{
		$noUrut++;
		$tot_sks+=$data_kul[sks];
		$bobot=$data_kul[sks]*$data[nilai_khs_bobot];
		$tot_bobot+=$bobot;
		$ip=$tot_bobot/$tot_sks;
?>
	</tr><tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><? echo "$noUrut" ?></td>
                  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><? echo"$data_kul[kode_mk]";?></td>
				  <td class="kiribawah" align="left" bgcolor="#CCCCCC"><? echo"$data_kul[matkul]";?></td>
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><? echo"$data_kul[sks]";?></td>
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><? echo"$data[nilai_khs_huruf]";?></td>
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><? echo"$data[nilai_khs_bobot]";?></td>
				  <td class="kiribawahkanan" align="center" bgcolor="#CCCCCC"><? echo"$bobot";?></td>  
	<? 
	}
	}
	?>	         
	<tr>
				  <td class="kiribawah" align="center" colspan="3" bgcolor="#CCCCCC"><strong>JUMLAH</strong></td>  
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><strong><? echo"$tot_sks";?></strong></td>
				  <td class="kiribawah" align="left" bgcolor="#CCCCCC"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center" bgcolor="#CCCCCC"><strong><? echo"$tot_bobot";?></strong></td>   
	</tr> 
	<tr>
				  <td class="kiribawah" align="center" colspan="3" bgcolor="#CCCCCC"><strong>IP SEMESTER</strong></td>  
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><strong><? echo(number_format($ip,2,chr(44),"."));?></strong></td>
				  <td class="kiribawah" align="left" bgcolor="#CCCCCC"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawah" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">&nbsp;</font></td>
				  <td class="kiribawahkanan" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">&nbsp;</font></td> 
	</tr> 	
  </table>
<center><a href='http://www.myfreecopyright.com/registered_mcn/WYB42-2E6E7-7ES1U' title='MyFreeCopyright.com Registered & Protected' ><img src='http://storage.myfreecopyright.com/mfc_protected.png' alt='MyFreeCopyright.com Registered & Protected' title='MyFreeCopyright.com Registered & Protected' width='145px' height='38px' border='0'/></a>  </center> 
</body>
</html>
<?

	   //akhir token

?>