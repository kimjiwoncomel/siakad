<?php session_start();include "server.php";?>
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

	$prt="select * from simpan_pin where id_prodi='$pro' and id_kurikulum='$idkr' and th_akademik='$th' and semester='$sms' and nim='$nim' and no_pin='$pin' and id_kelas='$idk'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	$hasilnya=mysql_fetch_array($hasil);
	if($ada<=0)
	{
		
			echo"<center><font size=3 color=#990000>  ERROR !!!!!</font></center><br>";
		echo "<center><p><a href='index.php'>SILAHKAN LOGIN YANG BENAR</a></p></center>";
		exit;
	}

	$prt="select * from simpan_pin where id_prodi='$pro' and id_kurikulum='$idkr' and th_akademik='$th' and semester='$sms' and nim='$nim' and no_pin='$pin'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	$hasilnya=mysql_fetch_array($hasil);
	
	$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$sms'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$hasilnya[nim]'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);



if ($_POST[proses]=="PROSES"){
 $id_mhs = $_POST[id_mhs];
  $id_mk=$_POST[id_mk];
 $id_smt = $_POST[id_smt];
 $th_akademik = $_POST[th_akademik];
  $semester=$_POST[semester];
 $id_jurusan = $_POST[id_jurusan];
  $id_kurikulum = $_POST[id_kurikulum];
 $no_pin = $_POST[no_pin];
  $nim = $_POST[nim];
  $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where id_mhs='$id_mhs'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$nama = addslashes (stripslashes (strip_tags ($data_mhs[nama])));
		if($id_mk ==""){
		echo "<center>Mata Kuliah belum di pilih<br>Ulangi</center>";
	
		exit;
		}		

	for ($i=0; $i <= sizeof ($id_mk); $i++)
	{
		if($id_mk[$i] !=""){
		$ambil_mk= mysql_query("SELECT *from matkul where id_mk='$id_mk[$i]'");
		echo mysql_error();
		$data_mk = mysql_fetch_array($ambil_mk);
$cek_krs= mysql_query("SELECT * from krs_khs where id_mhs='$data_mhs[id_mhs]' and id_mk='$data_mk[id_mk]' and th_akademik='$th_akademik' and id_smt='$id_smt'");
echo mysql_error();
$data_krs = mysql_fetch_array($cek_krs);
$krsnya2 = mysql_num_rows($cek_krs);
if ($krsnya2 != 0){
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_mhs.php?file=input krs Paket&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'></head><body><center><br><font color='#FF0000'><b>Maaf, Mata Kuliah $data_mk[matkul] Sudah Di Ambil</b></font><br></center></body></html>";
exit;
}
		mysql_query("INSERT INTO krs_khs (id_prodi,id_mhs,nim, id_kelas, id_kurikulum,id_smt, id_mk, id_pemb_akademik, th_akademik, keterangan) 
					VALUES ('$data_mhs[id_program]','$data_mhs[id_mhs]','$data_mhs[nim]', '$data_mhs[id_kelas]','$data_mhs[id_kurikulum]', '$id_smt', '$data_mk[id_mk]', '', '$th_akademik', '')");
		echo mysql_error();	
			
			
	}
}
		echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_mhs.php?file=cek krs input&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum' target='_blank'></head><body><center>Data diproses...</center</body></html>";
		}
?>
<form name="form_input_krs1" method="post" action="">			
<table width="100%" border="0" align="center">  
    <td><center><font size="+2"><strong>FORM INPUT KARTU RENCANA STUDI (KRS Paket)</strong></font></center></td>
  </tr>
</table>
<table width="100%" border="0" align="center">
<tr><td width="12%"><strong>NIM</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><? echo $nim;?></strong></td>
    <td width="32%" align="right"><strong>KELAS</strong></td>
	<td width="2%" align="center"><strong>:</strong></td>
	  <td width="20%"><strong><? echo $hasilnya[kelas];?></strong></td>
	<td width="18%"></td>
	<td width="0%"></td>
</tr>
<tr><td width="12%"><strong>NAMA</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><? echo $hasilnya[nama]?></strong></td>
	<td width="32%" align="right"><strong>TAHUN AKADEMIK</strong></td>
	<td width="2%"><strong>:</strong></td>
	<td width="20%"><strong><?echo $th;?></strong></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
<tr><td width="12%"><strong>SEMESTER</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%"><strong><?echo"$hasilnya[semester]";?>&nbsp;(<?echo"$data_smt[kata]";?>&nbsp;/ <? echo"$data_smt[ganjil_genap]";?>)</strong></td>
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
  <strong><font color="#FF0000">Pilih Mata Kuliah</font></strong> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="unnamed1">
    <tr bgcolor="#66FF00"> 
      <td class="kiribawahatas"><div align="center"><strong>NO</strong></div></td>
      <td class="kiribawahatas"><div align="center"><strong>KODE MATKUL</strong></div></td>
      <td class="kiribawahatas"><div align="center"><strong>MATA KULIAH</strong></div></td>
      <td class="kiribawahatas"><div align="center"><strong>SKS</strong></div></td>
      <td class="kiribawahatas"><div align="center"><strong>SEMESTER MATKUL</strong></div></td>
      <td class="kotak"><div align="center"><strong>CENTANG MATKUL</strong></div></td>
    <?

$cekquery2= mysql_query("SELECT * from matkul where id_kurikulum='$hasilnya[id_kurikulum]' and id_smt='$data_smt[id_smt]' and id_prodi='$hasilnya[id_prodi]' order by  id_smt asc ");
						while ($data2 = mysql_fetch_array($cekquery2)) {
						$nos++;
	?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td class="kiribawah" align="center"><? echo $nos ;?></td>
      <td class="kiribawah" align="center"><? echo $data2[kode_mk] ;?></td>
      <td class="kiribawah" align="left"><? echo $data2[matkul] ;?></td>
      <td class="kiribawah" align="center"><? echo $data2[sks] ;?></td>
      <td align="center" class="kiribawah"><? echo $data2[id_smt] ;?></td>
      <td class="kiribawahkanan" align="center"><? echo "<input name='id_mk[]' type=checkBox  checked value=$data2[id_mk] >"; ?></td>
      <? 
					}
			?>
    </tr>
  </table>
  <center>
	<table align="center">
     <td class="g_kanan"><div align="center"><input type="submit" name="proses" value="PROSES">
	 <input name="id_mhs" type="hidden" value="<? echo"$data_mhs[id_mhs]";?>">
	  <input name="nim" type="hidden" value="<? echo"$data_mhs[nim]";?>">
	 <input name="id_smt" type="hidden" value="<? echo"$data_smt[id_smt]";?>">
	 <input name="id_kurikulum" type="hidden" value="<? echo"$data_mhs[id_kurikulum]";?>">
	<input name="th_akademik" type="hidden" value="<? echo $th;?>">
	<input name="no_pin" type="hidden" value="<? echo $hasilnya[no_pin];?>">
	<input name="id_jurusan" type="hidden" value="<? echo $hasilnya[id_jurusan];?>">
	<input name="semester" type="hidden" value="<? echo $data_smt[semester];?>">
		  <input name="q" type="hidden" value="<? echo"$q";?>">
	 <input name="m" type="hidden" value="<? echo"$m";?>">
	 <input name="lum" type="hidden" value="<? echo"$lum";?>">
	<input name="san" type="hidden" value="<? echo $san;?>">
	<input name="ter" type="hidden" value="<? echo $ter;?>">
	<input name="aka" type="hidden" value="<? echo $aka;?>">
	<input name="token" type="hidden" value="<? echo $token;?>">
	 </div>
	 </td>
  </table>
  </center>
</form>

<? 
} 

	?>