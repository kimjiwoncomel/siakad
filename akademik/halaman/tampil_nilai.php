<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
    $id_prodi = addslashes (stripslashes (strip_tags ($_GET[id_prodi])));
 $id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
$id_smt = addslashes (stripslashes (strip_tags ($_GET[id_smt])));
$id_mk = addslashes (stripslashes (strip_tags ($_GET[id_mk])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));

$ambil_mk= mysql_query("SELECT *from matkul where id_mk='$id_mk'");
$data_mk = mysql_fetch_array($ambil_mk);
include ("server.php");
if ($_POST[PROSES]=="PROSES"){
$id_prodi=$_POST[id_prodi];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi = addslashes (stripslashes (strip_tags ($_POST[id_prodi])));
$id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
$id_smt = addslashes (stripslashes (strip_tags ($_POST[id_smt])));
$id_mk = addslashes (stripslashes (strip_tags ($_POST[id_mk])));
$th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
$id_krs_perawat = $_POST[id_krs_perawat];
$nilai = $_POST[nilai_khs_bobot];

	for ($i=0; $i <= sizeof ($id_krs_perawat); $i++)
	{
$ambil_nilai= mysql_query("SELECT *from bobot_nilai");
while ($data_nilai = mysql_fetch_array($ambil_nilai)){
		if ($nilai[$i]<=$data_nilai[bobot_max] and $nilai[$i]>=$data_nilai[bobot_min]){
			$huruf=$data_nilai[huruf];
		}
		mysql_query("update krs_khs set nilai_khs_bobot='$nilai[$i]', nilai_khs_huruf='$huruf' where id_krs_perawat='$id_krs_perawat[$i]'") ;
		echo mysql_error();
		}
}
  echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=hasil input nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas&id_mk=$id_mk></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
  echo mysql_error();
exit();
}

if ($_POST[upload]=="upload"){

 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$id_prodi2=$_POST[id_prodi2];
$id_kurikulum2=$_POST[id_kurikulum2];
  $id_kelas2 = addslashes (stripslashes (strip_tags ($_POST[id_kelas2])));
   $th_akademik2 = addslashes (stripslashes (strip_tags ($_POST[th_akademik2])));
   $id_mk2 = addslashes (stripslashes (strip_tags ($_POST[id_mk2])));
     $id_smt2 = addslashes (stripslashes (strip_tags ($_POST[id_smt2])));
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
 $no = $data->val($i, 1);
  // membaca data nim (kolom ke-1)
  $id_krs_perawat = $data->val($i, 2);
  // membaca data nama (kolom ke-2)
  $nim = $data->val($i, 3);
  // membaca data alamat (kolom ke-3)
  $nama = $data->val($i, 4);
  $nilai_khs_bobot = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 5)))));
  $nilai_khs_huruf = addslashes (strtoupper (stripslashes (strip_tags ($data->val($i, 6)))));

  

  // setelah data dibaca, sisipkan ke dalam tabel mhs
 $query = "update krs_khs set nilai_khs_bobot='$nilai_khs_bobot', nilai_khs_huruf='$nilai_khs_huruf' where id_krs_perawat='$id_krs_perawat'";
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

echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=hasil input nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi2&id_kurikulum=$id_kurikulum2&id_kelas=$id_kelas2&th_akademik=$th_akademik2&id_mk=$id_mk2&id_smt=$id_smt2'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "khs_krs.php";?>
<table width="100%" border="0" align="center">  
    <td>&nbsp;</td>
    <td><center><font size="4"><p class="tnr"><strong>FORM INPUT NILAI 
	<? $nama5 = addslashes (strtoupper (stripslashes (strip_tags ($data_mk[matkul]))));
	echo"$nama5";?></strong></p></font></center></td>
    <td>&nbsp;</td>
  </tr>
</table><BR />
<br>
  <div align="center" class="unnamed1"><strong><br><font color="#FF0000"></font></strong><form method="post" enctype="multipart/form-data" action="">
    <strong><font color="#FF0000">
Silakan Pilih File Upload Nilai( tipe file Excel) : 
        <input name="userfile" type="file">
<input name="upload" type="submit" value="upload"><input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">
	  <input name="id_kurikulum2" type="hidden" value="<? echo $id_kurikulum;?>">
	  <input name="id_kelas2" type="hidden" value="<? echo $id_kelas;?>">
	  <input name="th_akademik2" type="hidden" value="<? echo $th_akademik;?>">
	   <input name="id_prodi2" type="hidden" value="<? echo $id_prodi;?>">
	    <input name="id_mk2" type="hidden" value="<? echo $id_mk;?>">
		 <input name="id_smt2" type="hidden" value="<? echo $id_smt;?>">
</font></strong></form><strong></strong><strong><br>
    </strong></div>
<div align="center"><BR />
  <strong>[<? echo"<a href='./halaman/download_nilai.php?sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_mk=$id_mk&th_akademik=$th_akademik&id_smt=$id_smt&id_kelas=$id_kelas'>Download Tabel Upload Nilai $data_mk[matkul]</a>";?>]  </strong></div>
  <br />
  <form name="form_edit_khs1" method="post" action=""> 			
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
				<td class="kiribawahatas"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>Pilih Mahasiswa</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>NIM</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nama Mahasiswa</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Nilai Lambang</strong></div></td>
				  <td class="kotak"><div align="center"><strong>Nilai Mutu<br>(nilai desimal dipisahkan titik)</strong></div></td>
<?
$cekquery= "SELECT *from krs_khs where id_prodi='$id_prodi' and  id_kelas='$id_kelas' and id_smt='$id_smt' and th_akademik='$th_akademik' and id_mk='$id_mk'";
$hacekquery=mysql_query($cekquery);
echo mysql_error();
$nos=0;
while ($data = mysql_fetch_array($hacekquery)){

$ambil_mhs= mysql_query("SELECT *from tb_mahasiswa where id_mhs='$data[id_mhs]'");
$data_mhs=mysql_fetch_array($ambil_mhs);

$nos++;
	?>
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">  
				<td class="kiribawah" align="center"><? echo"$nos";?></td>                
                  <td class="kiribawah" align="center"><? echo "<input name='id_krs_perawat[]' type=checkBox value=$data[id_krs_perawat] checked tabindex='1'>"; ?></td>
				  <td class="kiribawah" align="left"><? echo"$data_mhs[nim]";?></td>
                  <td class="kiribawah" align="left"><? echo"$data_mhs[nama]";?></td>
				  <td class="kiribawah" align="center"><? echo"$data[nilai_khs_huruf]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"<input type='text' name='nilai_khs_bobot[]' value='$data[nilai_khs_bobot]' maxlength='6' size='6';"?></td>
    <? 
	}
	?>	 
	</tr><td colspan="6" align="center"><input type="submit" name="PROSES" value="PROSES">&nbsp;&nbsp;
  <input name="id_prodi" type="hidden" value="<? echo $id_prodi?>">
<input name="id_kelas" type="hidden" value="<? echo $id_kelas;?>">
<input name="id_smt" type="hidden" value="<? echo $id_smt;?>">
<input name="th_akademik" type="hidden" value="<? echo $th_akademik;?>">
;<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>">
<input name="id_mk" type="hidden" value="<? echo $id_mk;?>">
<? echo"<a href='home_admin.php?file=proses nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'><strong><font color='#0000FF'>Pilih Mata Kuliah</font></strong></a>";?>
</td
  ></table>
 </form> 

