<?
require("server.php");
$id_prodi=$_GET[id_prodi];
 $id_kurikulum=$_GET[id_kurikulum];
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];

$ambil_data= "SELECT *from prodi where id_prodi='$id_prodi' order by jenjang";
$ambil_datanya=mysql_query($ambil_data);
$data1 = mysql_fetch_array($ambil_datanya);
$perintah3="select *from jenjang where id_jenjang='$data1[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

		$ambil_smt="SELECT *FROM kurikulum where id_kurikulum='$id_kurikulum'";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		$data_smt=mysql_fetch_array($smt);
		
		require("server.php");
if ($_POST[upload]=="upload"){

 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
include 'server.php';

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
  $id_mk = $data->val($i, 1);
  $id_prodi = $data->val($i, 2);
  $id_kurikulum = $data->val($i, 3);
  // membaca data nama (kolom ke-2)
  $id_smt = $data->val($i, 4);
  // membaca data alamat (kolom ke-3)
  $kode_mk = $data->val($i, 5);
  $matkul = $data->val($i, 6);
    $matkul2 = $data->val($i, 7);
  $sks = $data->val($i, 8);
  $pengampu = $data->val($i, 9);
  $kata_ganjil = $data->val($i, 10);
  
 

  

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO matkul VALUES(
  '', 
  '$id_prodi', 
  '$id_kurikulum', 
  '$id_smt',
   '$kode_mk',
   '$matkul',
   '$matkul2',
  '$sks', 
  '$pengampu',
   '$kata_ganjil')";
  $hasil = mysql_query($query);
  
  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}
 
 

// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";

echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=atur_matkul&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "akademik.php";?>

  <div align="center" class="unnamed1"><strong><br><font color="#FF0000">MATA KULIAH PRODI <?echo $data3[jenjang]?>&nbsp;<?echo $data1[nama_prodi]?> KURIKULUM <?echo $data_smt[nama_kurikulum]?></font><br>
    </strong></div>
	<br />
  <div align="center">[<? echo"<a href='home_admin.php?file=atur_matkul_tambah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum'>Tambah Mata Kuliah</a>";?>] | [<? echo"<a href='./wpadmin/tabel_matkul.php?sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum'>Download Tabel Upload Mata Kuliah</a>";?>] 
  </div>
  <div align="center" class="unnamed1"><strong><br><font color="#FF0000"></font></strong><form method="post" enctype="multipart/form-data" action="">
    <strong><font color="#FF0000">
Silakan Pilih File Upload Mata Kuliah ( tipe file Excel) : 
        <input name="userfile" type="file">
<input name="upload" type="submit" value="upload"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">  <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
</font></strong></form><strong></strong><strong><br>
    </strong></div>
  <center>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="00" class="unnamed1">
    <tr bgcolor="#993300"> 
      <td align="center"><strong><font color="#FFFFFF">No</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Kode Matkul</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Matkul</font></strong></td>
            <td align="center"><strong><font color="#FFFFFF">Matkul(Inggris)</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">SKS</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Semester Matkul</font></strong></td>
      <td align="center"><strong><font color="#FFFFFF">Koordinator matkul</font></strong></td>
      <td> <div align="center"><strong><font color="#FFFFFF">Proses</font></strong></div></td>
    </tr>
    <?
$perintah="select *from matkul where id_prodi='$id_prodi' AND id_kurikulum='$id_kurikulum' order by id_smt";
$tampil=mysql_query($perintah,$link);
$no=0;
while($data=mysql_fetch_array($tampil))
{
$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$data[id_smt]'");
$data_smt=mysql_fetch_array($ambil_smt);

$no++;
  ?>
    <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF"> 
      <td align="center"><? echo"$no"; ?>&nbsp;</td>
      <td align="center"><? echo"$data[kode_mk]"; ?>&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;<? echo"$data[matkul]"; ?>&nbsp;</td>
         <td>&nbsp;&nbsp;<? echo"$data[matkul2]"; ?>&nbsp;</td>
      <td align="center"><? echo"$data[sks]"; ?>&nbsp;&nbsp;</td>
      <td align="center"><? echo"$data_smt[semester]"; ?>&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;<? echo"$data[pengampu]"; ?>&nbsp;&nbsp;</td>
      <td><div align="center">[<? echo"<a href='home_admin.php?file=atur_matkul_edit&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mk=$data[id_mk]&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_smt=$data[id_smt]'>Edit</a>";?>]&nbsp;&nbsp;[<? echo"<a href='home_admin.php?file=atur_matkul_hapus&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mk=$data[id_mk]&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum'>Hapus</a>";?>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr> 
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
  </center>

