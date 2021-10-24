<?
require("server.php");
   $th_akademik=$_GET[th_akademik];
  $id_kelas=$_GET[id_kelas];
  $id_kurikulum=$_GET[id_kurikulum];
   $id_prodi=$_GET[id_prodi];
   $id_smt=$_GET[id_smt];
    $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 

if(empty($th_akademik)){
	echo "<center>Tahun Akademik tidak boleh kosong<br>";
	echo"<a href=mahasiswa.php>Ulangi</a></center>";
	exit;
} 

$cekquery_akademik= mysql_query("SELECT *from kurikulum where id_kurikulum='$id_kurikulum'");
$data_akademik = mysql_fetch_array($cekquery_akademik);

$cekquery_smt= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$data_smt = mysql_fetch_array($cekquery_smt);
 $data_smt[semester];
$cekquery_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas = mysql_fetch_array($cekquery_kelas);
 $data_kelas[kelas];
$cekquery_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi'");
$data_prodi = mysql_fetch_array($cekquery_prodi);

$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
if ($_POST[upload]=="upload"){
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
$id_smt2=$_POST[id_smt2];
$id_kelas2=$_POST[id_kelas2];
$th_akademik2=$_POST[th_akademik2];
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
include 'server.php';
mysql_query("truncate table tbl_mhs_awal");
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-1)
  $id_jurusan = $data->val($i, 1);
  // membaca data nama (kolom ke-2)
  $id_kelas = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
  $id_kurikulum = $data->val($i, 3);
  $jurusan = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 4)))));
  $kelas = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 5)))));
  $kurikulum = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 6)))));
  $program = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 7)))));
  $th_akademik = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 8)))));
  $nim = addslashes (stripslashes (strip_tags ($data->val($i, 9))));
  $nama = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 10)))));
  $semester = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 11)))));
  $pin = addslashes (stripslashes (strip_tags ($data->val($i, 12))));
  $th_masuk = $data->val($i, 13);

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO tbl_mhs_awal VALUES(
  '$id_prodi', 
  '$id_kelas',
   '$id_kurikulum',
  '$jurusan', 
  '$kelas',
   '$kurikulum',
   '$program',
   '$th_akademik',
    '$nim', 
	'$nama',
	'$semester',
	'$pin',
	'$th_masuk')";
  $hasil = mysql_query($query);
  
  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}
 	$lihat = mysql_query("Select * FROM tbl_mhs_awal WHERE id_jurusan='' or th_masuk='0'");
  $melihat = mysql_num_rows($lihat);
 
	$hapus = "DELETE FROM tbl_mhs_awal WHERE id_jurusan='' or th_masuk='0'";
  $xxxxxx = mysql_query($hapus);
  	$lihat2 = mysql_query("Select * FROM tbl_mhs_awal");
  $melihat2 = mysql_num_rows($lihat2);
 

// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
echo "<p>Jumlah data yang kosong : ".$melihat."<br>";
echo "Jumlah data kosong yang dihapus : ".$melihat."</p>";
echo "Jumlah data akhir : ".$melihat2."</p>";
echo $nim;
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=lihat data mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2&id_smt=$id_smt2&th_akademik=$th_akademik2&id_kelas=$id_kelas2'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
if ($_POST[proses]=="proses"){
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
$id_smt2=$_POST[id_smt2];
$id_kelas2=$_POST[id_kelas2];
$th_akademik2=$_POST[th_akademik2];
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
include 'server.php';
$id_program=$_POST[id_program];
$semester=$_POST[semester];
$id_kelas=$_POST[id_kelas];
$id_kurikulum=$_POST[id_kurikulum];
$th_akademik=addslashes ($_POST[th_akademik]);


$ambil_data = mysql_query("SELECT * FROM tbl_mhs_awal where id_jurusan='$id_program' and semester='$semester' and id_kelas='$id_kelas' and id_kurikulum='$id_kurikulum' and th_akademik='$th_akademik'");
while ($ambil_jml_mhs = mysql_fetch_array($ambil_data)){
$nama_mhs=addslashes (stripslashes (strip_tags ($ambil_jml_mhs[nama])));

mysql_query("INSERT INTO tb_mahasiswa (id_mhs, id_kelas, id_program, id_kurikulum, program, jurusan, nama, nim, kelas, th_masuk, ttl, status)
       VALUES (
	   '',
	   '$ambil_jml_mhs[id_kelas]',
		'$ambil_jml_mhs[id_jurusan]',
		'$ambil_jml_mhs[id_kurikulum]',
	   '$ambil_jml_mhs[program]',
	   '$ambil_jml_mhs[jurusan]',
	   '$nama_mhs',
	   '$ambil_jml_mhs[nim]',
	   '$ambil_jml_mhs[kelas]',
	   '$ambil_jml_mhs[th_masuk]',
	   '-',
	   'BELUM_LULUS')");
		echo mysql_error();
	   
mysql_query("INSERT INTO simpan_pin (id_kelas,id_kurikulum,id_prodi,nim, nama, program, semester, no_pin, th_akademik, kelas)
       VALUES (
	   '$ambil_jml_mhs[id_kelas]',
	   '$ambil_jml_mhs[id_kurikulum]',
	   '$ambil_jml_mhs[id_jurusan]',
	   '$ambil_jml_mhs[nim]',
		'$nama_mhs',
	   '$ambil_jml_mhs[program]',
	   '$ambil_jml_mhs[semester]',
	   '$ambil_jml_mhs[pin]',
	   '$_POST[th_akademik]',
	   '$ambil_jml_mhs[kelas]'
	   )");
	   	   	   
		echo mysql_error();
	}	



echo "<br><a href=\"home_admin.php?file=proses_pin\">Proses Sukses...</a>";
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=lihat data mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2&id_smt=$id_smt2&th_akademik=$th_akademik2&id_kelas=$id_kelas2'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "mahasiswa.php";?>


  <div align="center" class="unnamed1"><strong><br>
  <font color="#FF0000">HALAMAN MAHASISWA PRODI <?echo $data3[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?></font><br>
    </strong></div>
  <div align="center">[<? echo"<a href='./wpadmin/mahasiswa_download2.php?sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'>Download Data Mahasiswa</a>";?>] | [<? echo"<a href='./wpadmin/tabel_mahasiswa.php?sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'>Download Tabel Mahasiswa</a>";?>] |  </div>

<br>
<center>
<form method="post" enctype="multipart/form-data" action="">
Upload Mahasiswa ( Silakan Pilih File Exce ) l: 
  <input name="userfile" type="file">
<input name="upload" type="submit" value="upload"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">  
<input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
	  <input name="id_smt2" type="hidden" value="<? echo $id_smt;?>">
	  <input name="id_kelas2" type="hidden" value="<? echo $id_kelas;?>">
	   <input name="th_akademik2" type="hidden" value="<? echo $th_akademik;?>">
</form>
</center>
<br />
<form action="" method="post">
<center>
  <strong>FORM PROSES MAHASISWA KRS SEMESTER  </strong>
  <table align="center" width="40%" border="1" cellpadding="0" cellspacing="00" class="unnamed1">
  <tr>
    <td align="right">Program</td>
    <td align="center">:</td>
    <td align="left"><?include "ambil_program.php";?></td>
</tr>
  <tr>
    <td align="right">KRS Semester</td>
    <td align="center">:</td>
    <td align="left"><?include "semester_pin.php";?></td>
</tr>
  <tr>
    <td align="right">Kelas</td>
    <td align="center">:</td>
    <td align="left"><?include "kelas_pin.php";?></td>
</tr>
  <tr>
    <td align="right">Kurikulum</td>
    <td align="center">:</td>
    <td align="left"><?include "kurikulum_pin.php";?></td>
</tr>
<tr>
<td align="right">Tahun Akademik</td>
    <td align="right">:</td>
<td><?include ("tahun_simpan_pin.php");?></td>
</tr>

</table>
</center>
<center><input name="proses" type="submit" value="proses"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">  
<input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
	  <input name="id_smt2" type="hidden" value="<? echo $id_smt;?>">
	  <input name="id_kelas2" type="hidden" value="<? echo $id_kelas;?>">
	   <input name="th_akademik2" type="hidden" value="<? echo $th_akademik;?>">
<input type="reset" value="Reset"><br>
</center>
</form>
<div align="center"><br />
  <strong>DATA MAHASISWA <?echo $data3[jenjang]?>&nbsp;<?echo $data_prodi[nama_prodi]?> SEMESTER <? echo $id_smt;?> Tahun Akademik <? echo $th_akademik;?>  </strong></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">NIM</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Nama</font></strong></td>
	       <td align="center"><strong><font color="#FFFFFF">Kelas</font></strong></td>
		   <td align="center"><strong><font color="#FFFFFF">Semester</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Tahun Akademik </font></strong></td>
  </tr>
    <?
$no=0;

$cekquery_status= mysql_query("SELECT * from simpan_pin where 
th_akademik='$th_akademik' and 
id_kurikulum='$id_kurikulum' and 
id_kelas='$id_kelas' and 
semester='$data_smt[semester]' and 
id_prodi='$id_prodi'");
while($data_status = mysql_fetch_array($cekquery_status)) {

$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo  $no; ?>&nbsp;</td>
      <td align="center"><? echo  $data_status[nim]; ?>&nbsp;&nbsp;</td>
      <td align="left"><? echo  $data_status[nama]; ?>&nbsp;&nbsp;</td>
	    <td align="center"><? echo  $data_status[kelas]; ?>&nbsp;&nbsp;</td>
		<td align="center"><? echo  $data_status[semester]; ?>&nbsp;&nbsp;</td>
      <td align="center"><? echo  $data_status[th_akademik]; ?>&nbsp;&nbsp;</td>
     
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="10" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
</table>

