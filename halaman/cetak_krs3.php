<?php session_start();include "../server.php";?>
  <?
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
include ("../tgl_indo.php");
$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$nim'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$sms'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

//$ambil_prodi=mysql_query("SELECT *FROM prodi where id_prodi='$data_mhs[id_kelas]'");
//echo mysql_error();
//$data_prodi=mysql_fetch_array($ambil_prodi);

$ambil_kelas=mysql_query("SELECT *FROM tb_mahasiswa where nim='$nim'");
echo mysql_error();
$data_kelas=mysql_fetch_array($ambil_kelas);

$ambil_krs=mysql_query("SELECT *FROM krs_khs where id_mhs='$data_mhs[id_mhs]' and th_akademik='$th' and id_smt='$data_smt[id_smt]'");
echo mysql_error();
$data_krs=mysql_fetch_array($ambil_krs);

$ambil_pa=mysql_query("SELECT *FROM pembimbing_akademik where id_pemb_akademik='$data_krs[id_pemb_akademik]'");
echo mysql_error();
$data_pa=mysql_fetch_array($ambil_pa);

$ambil_ka=mysql_query("SELECT *FROM penandatangan where id_arsip='2' and id_prodi='$data_kelas[id_program]' ");
echo mysql_error();
$data_ka=mysql_fetch_array($ambil_ka);

$ambil_up=mysql_query("SELECT *FROM prodi where id_prodi='$pro'");
echo mysql_error();
$data_up=mysql_fetch_array($ambil_up);

$ambil_up2=mysql_query("SELECT *FROM jenjang where id_jenjang='$data_up[jenjang]'");
echo mysql_error();
$data_up2=mysql_fetch_array($ambil_up2);
?>
<html>
<head>
<title>Kartu Rencana Studi</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body bgProperties="fixed">
<table width="100%" border="0" align="center" class="">
  <tr>
    <td width="100"><img src="../images/POLTEKES-KENDARI.jpg" width="130" height="124"></td>
    <td><center><font size="+1">
        </font><p class="Arial"><font size="+1">KEMENTERIAN KESEHATAN REPUBLIK INDONESIA<BR>
          POLITEKNIK KESEHATAN KENDARI <br>
		  PROGRAM <?echo"$data_up2[jenjang]";?>  <?echo"$data_up[nama_prodi]";?> </font></p>
      </center></td>
    <td width="100">&nbsp;</td>
  </tr></table>
<hr color="#000000">
<table width="100%" border="0" align="center" height="20" cellpadding="0" cellspacing="0">  
    <tr>
	<td><center><font size="+1"><strong>KARTU RENCANA STUDI</strong></font>
     <br><font size="-1">TAHUN AKADEMIK <? echo $th;?></font></center>
	</td>
  </tr>
</table><br>
      <table width="100%" border="0" align="center" class="tnr" cellpadding="0" cellspacing="0" bgcolor="#999999">
        <tr> 
          <td width="15%"><strong>Nama</strong></td>
          <td width="2%"><strong>:</strong></td>
          <td width="30%" align="left"><?echo $data_mhs[nama]?></td>
          <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
          <td width="20%" align="left"><strong>Jenjang dan Program Studi</strong></td>
          <td width="2%" align="center"><strong>:</strong></td>
          <td width="30%"><?echo $data_mhs[program]?>&nbsp;<?echo $data_mhs[jurusan]?></td>
        </tr>
        <tr> 
          <td width="12%"><strong>No. Mhs</strong></td>
          <td width="2%"><strong>:</strong></td>
          <td width="16%" align="left"><?echo $data_mhs[nim]?></td>
          <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
          <td width="12%" align="left"><strong>Semester</strong></td>
          <td width="2%" align="center"><p class="" align="center"><strong>:</strong></p></td>
          <td width="20%"><?echo"$data_smt[semester]";?></td>
        </tr>
        <tr>
          <td width="12%"><strong>Dosen  P.A</strong></td>
          <td width="2%"><strong>:</strong></td>
          <td width="16%"><?echo $data_pa[nama]?></td>
          <td width="18%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
          <td width="12%" align="left"><strong>Kelas</strong></td>
          <td width="2%" align="center"><strong>:</strong></td>
          <td width="20%"><?echo $data_kelas[kelas]?></td>
        </tr>
      </table>
      <br>
 <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tnr_huruf_kecil" height="30">
        <tr bgcolor="#FFFFFF" height="50"> 
          <td class="kiribawahatas"><div align="center" height="30"><strong>No.</strong></div></td>
          <td class="kiribawahatas"><div align="center" height="30"><strong>Kode M.K</strong></div></td>
          <td class="kiribawahatas"><div align="center" height="30"><strong>Nama Mata Kuliah</strong></div></td>
          <td class="kiribawahatas"><div align="center" height="30"><strong>SKS</strong></div></td>
          <td class="kiribawahatas"><div align="center" height="30"><strong>Dosen Pengampu</strong></div></td>
          <td class="kotak"><div align="center" height="30"><strong>Ket</strong></div></td>
        <?
$ambil_krs2=mysql_query("SELECT *FROM krs_khs where nim='$data_mhs[nim]' and id_mhs='$data_mhs[id_mhs]' and th_akademik='$th' and id_smt='$data_smt[id_smt]'");
echo mysql_error();
		
		$noUrut = 0;
		while ($data_krs2=mysql_fetch_array($ambil_krs2)){
$ambil_matkul=mysql_query("SELECT *FROM matkul where id_mk='$data_krs2[id_mk]'");
echo mysql_error();
$data_matkul=mysql_fetch_array($ambil_matkul);
		
		
		$noUrut++;
		$tot_sks+=$data_matkul[sks];
?>
        <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
          <td class="kiribawah" align="center" height="30"><? echo "$noUrut" ?></td>
          <td class="kiribawah" align="center">&nbsp;&nbsp;<? echo"$data_matkul[kode_mk]";?></td>
          <td class="kiribawah" align="left">&nbsp;<? echo"$data_matkul[matkul]";?></td>
          <td class="kiribawah" align="center">&nbsp;<? echo"$data_matkul[sks]";?></td>
          <td class="kiribawah" align="center">&nbsp;<? echo"$data_matkul[pengampu]";?></td>
         <td align="center" class="kiribawahkanan">&nbsp;<? echo"$data[pbc]";?></td>
          <? 
	}
	?>
        </tr>
        <td class="kiribawah" align="center" colspan="3" height="30"><strong>TOTAL</strong></td>
        <td class="kiribawah" align="center">&nbsp;<? echo"$tot_sks";?></td>
        <td class="kiribawah" align="center">&nbsp;</td>
       <td align="center" class="kiribawahkanan">&nbsp;</td>
      </table>
  
  
<?
		$cekquerye= "SELECT *from tanggal_ttd";
		$hacekquerye=mysql_query($cekquerye);
		echo mysql_error();
		$datae = mysql_fetch_array($hacekquerye)
		//=================
?><br>
<table width="100%" border="0" align="center" class="tnr">
  <tr> 
    <td width="33%" align="center">&nbsp;</td>
    <td width="33%" align="left"><div align="center"></div></td>
    <td width="33%" align="center">Kendari, <? echo today ($tgl, $bln, $thn);?></td>
  </tr>
  <tr> 
    <td width="33%" align="center">Mengetahui</td>
    <td width="33%" align="left"><div align="center"></div></td>
    <td width="33%" align="center">&nbsp;</td>
  </tr>
  <tr> 
    <td align="center">Dosen Pembimbing Akademik </td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;Mahasiswa</td>
  </tr>
  <tr> 
    <td width="33%" align="left">&nbsp;</td>
    <td width="33%" align="center">&nbsp;</td>
    <td width="33%" align="center">&nbsp;</td>
  </tr>
  <tr> 
    <td width="33%" align="center">&nbsp;</td>
    <td width="33%" align="center">&nbsp;</td>
    <td width="33%"></td>
  </tr>
  <tr> 
    <td width="33%" align="left">&nbsp;</td>
    <td width="33%" align="center"></td>
    <td width="33%"></td>
  </tr>
  <tr> 
    <td width="33%" align="center"><?echo $data_pa[nama]?><br>NIP. <?echo $data_pa[nip]?></td>
    <td width="33%" align="center"><br></td>
    <td width="33%" align="center"><?echo $data_mhs[nama]?><br>NIM. <? echo $data_mhs[nim]?></td>
  </tr>
</table>
</table></td></tr></table>
<hr>
<table width="100%" border="0" align="center" class="tnr_huruf_kecil">
  <tr> 
    <td width="36%">Jl. Jend.A.H.Nasution No.G.14 Anduonohu, Kota Kendari 93232 </td>
    <td width="30%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left" width="34%">Warna putih : untuk Mahasiswa </td>
  </tr>
  <tr> 
    <td width="36%">Telphone (0401)3190492 Fax(0401)3193339 </td>
    <td width="30%" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="left" width="34%">Warna kuning : untuk ADAK - PSI </td>
  </tr>
  <tr> 
    <td align="left"><div align="left">home page: http://poltekkeskendari.ac.id </div></td>
    <td align="center"><div align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
    <td align="left"><div align="left">Warna hijau : untuk PRODI </div></td>
  </tr>
  <tr> 
    <td><div align="left">e-mail : info@poltekkes-kdi.ac.id </div></td>
    <td align="center"><div align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
    <td align="left"><div align="left">Warna merah  : untuk PAI </div></td>
  </tr>
</table>
</body>
</html>
<?
}
?>