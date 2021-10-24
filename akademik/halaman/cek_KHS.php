<?
require ("server.php");
include ("tgl_indo.php");
 $nim = addslashes  (strip_tags ($_GET[nim]));
 $id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
 $id_kurikulum = addslashes (stripslashes (strip_tags ($_GET[id_kurikulum])));
$id_smt = addslashes (stripslashes (strip_tags ($_GET[id_smt])));
  $th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));
    $id_akademik = addslashes (stripslashes (strip_tags ($_GET[id_akademik])));
    $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas' and id_kurikulum='$id_kurikulum' and nim='$nim'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_kelas=mysql_query("SELECT *FROM kelas where id_kelas='$data_mhs[id_kelas]'");
echo mysql_error();
$data_kelas=mysql_fetch_array($ambil_kelas);
?>
<? echo include "mahasiswa.php";?>
<form name="form_input_krs1" method="post" action="">	
<table width="100%" border="0" align="center">  
    <td><center>
      <font size="+2"><strong>FORM MATA KULIAH</strong></font>
    </center></td>
  </tr>
</table>
<table width="100%" border="0" align="center">
<tr><td width="12%"><strong>NIM</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><? echo $data_mhs[nim];?></strong></td>
    <td width="32%" align="right"><strong>KELAS</strong></td>
	<td width="2%" align="center"><strong>:</strong></td>
	  <td width="20%"><strong><? echo $data_kelas[kelas];?></strong></td>
	<td width="18%"></td>
	<td width="0%"></td>
</tr>
<tr><td width="12%"><strong>NAMA</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%" align="left"><strong><? echo $data_mhs[nama]?></strong></td>
	<td width="32%" align="right"><strong>TAHUN AKADEMIK</strong></td>
	<td width="2%"><strong>:</strong></td>
	<td width="20%"><strong><?echo $th_akademik;?></strong></td>
	<td width="2%"></td>
	<td width="26%"></td>
</tr>
<tr><td width="12%"><strong>SEMESTER</strong></td>
	<td width="2%"><strong>:</strong></td>
    <td width="16%"><strong><?echo"$data_smt[semester]";?>&nbsp;(<?echo"$data_smt[kata]";?>&nbsp;/ <? echo"$data_smt[ganjil_genap]";?>)</strong></td>
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
  
<div align="right"><strong><font color="#FF0000">CEK Mata Kuliah </font></strong></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas"><div align="center"><strong>NO</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Kode Matkul</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nama Matkul</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Jumlah SKS</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Nilai</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Huruf</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Aksi</strong></div></td>
<?
$ambil_krs= mysql_query("SELECT *from krs_khs where id_prodi='$id_prodi' and id_mhs='$data_mhs[id_mhs]' and id_smt='$data_smt[id_smt]' and th_akademik='$th_akademik'");
$nos=0;
while ($data_krs = mysql_fetch_array($ambil_krs))
	{
		$cekquery= mysql_query("select * from matkul where id_mk='$data_krs[id_mk]'");
			while ($data = mysql_fetch_array($cekquery))
				{

$nos++;
	?>
	
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo $nos; ?></td>
				  <td class="kiribawah" align="left"><? echo"$data[kode_mk]";?></td>
                  <td class="kiribawah" align="left"><? echo"$data[matkul]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data[sks]";?></td>
				    <td class="kiribawah" align="center"><? echo"$data_krs[nilai_khs_bobot]";?></td>
					  <td class="kiribawah" align="center"><? echo"$data_krs[nilai_khs_huruf]";?></td>
				 <td class="kiribawahkanan" align="center"><? echo"<a href='home_admin.php?file=proses transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_akademik=$th_akademik&id_smt=$id_smt&nim=$nim&id_mk=$data_krs[id_mk]&id_krs_perawat=$data_krs[id_krs_perawat]&id_akademik=$id_akademik'>proses</a>";?></td>                                
    <? 
	}
	}
	?>	 
</table>
<? echo"<a href='home_admin.php?file=cek mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$id_akademik&id_smt=$id_smt'>Kembali</a>";?>
  </form>

