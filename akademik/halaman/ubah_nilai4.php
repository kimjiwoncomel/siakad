<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 $id_mhs=$_GET['id_mhs'];
$id_kelas=$_GET['id_kelas'];
$id_kurikulum=$_GET['id_kurikulum'];
$id_program=$_GET['id_program'];
$th_masuk=$_GET['th_masuk'];
$id_prodi=$_GET['id_prodi'];

$x2="select * from tb_mahasiswa where id_mhs='$id_mhs'";
//ambil query tampilkan
$tampil2=mysql_query($x2);
//tampilkan data dalam bentuk array di tabel
$data2=mysql_fetch_array($tampil2);
 if ($_POST[simpan]=="simpan"){
//deklarasi fariabel dari form
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
$nilai=$_POST['nilai'];
$materi=$_POST['materi'];
$id_mhs=$_POST['id_mhs'];
$id_kelas=$_POST['id_kelas'];
$id_kurikulum=$_POST['id_kurikulum'];
$id_program=$_POST['id_program'];
$th_masuk=$_POST['th_masuk'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];

//apabila klik simpan
if(isset($_POST['simpan'])){
if(empty($nilai)){
echo "<script type='text/javascript'>
onload =function(){
alert('data  belum diisi');
}
</script>";
}else{
$sql="insert into nasional(id_mhs,nim,nama,program,jurusan,materi,nilai) 
values('$id_mhs','$nim','$nama','$program','$jurusan','$materi','$nilai')";
$simpan=mysql_query($sql);
//bila berhasil simpan kembali ke home
if ($simpan) {
echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL='home_admin.php?id_prodi=$id_prodi&file=proses nilai nasional input&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$id_mhs&th_masuk=$th_masuk&id_kelas=$id_kelas&id_program=$id_program&id_kurikulum=$id_kurikulum'></head><body><strong><font color='#0000FF'><center>Data diproses ...</center></font></strong></body></html>";
	} 
    else 
    { 
	
	echo "<script type='text/javascript'>
onload =function(){
alert('Data gagal disimpan!');
}
</script>";
    } 
}
}
}
//proses editing
//Ambil nilai yang akan di edit
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$id_mhs5 = $_GET['id_mhs5'];
	 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];
} 


//tampilkan data sebelum di edit
$sql2="select * from nasional where id='$id';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$nip=$baris['nim'];
$nama=$baris['nama'];
$materi=$baris['materi'];
$nilai=$baris['nilai'];
$id2=$baris['id'];


//apabila klik tombol edit
if(isset($_POST['Edit'])) {
$nilai=$_POST['nilai'];
$materi=$_POST['materi'];
$id_mhs2=$_POST['id_mhs'];
$id_kelas2=$_POST['id_kelas'];
$id_kurikulum2=$_POST['id_kurikulum'];
$id_program2=$_POST['id_program'];
$th_masuk2=$_POST['th_masuk'];
$id2=$_POST['id2'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
	$id_prodi=$_GET['id_prodi'];
$SQL = "UPDATE nasional SET 	materi='$materi',nim='$nim',nilai='$nilai',id_mhs='$id_mhs',jurusan='$jurusan',program='$program' where id='$id2'"; 
  	$hasil= mysql_query($SQL); 
	//jika berhasil kembali ke home
  	if($hasil){
    echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?id_prodi=$id_prodi&file=proses nilai nasional input&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_kelas=$id_kelas&id_mhs=$id_mhs2&th_masuk=$th_masuk2&id_program=$id_program2&id_kurikulum=$id_kurikulum2'></head><body><strong><font color='#0000FF'><center>Data diproses ...</center></font></strong></body></html>";
	} 
    else 
    { 
	echo "<script type='text/javascript'>
onload =function(){
alert('Update error!');
}
</script>";
    } 
} 

//apabila klik hapus
if(isset($_POST['hapus'])) {
if (!empty($id) && $id != "") {
$id = $_GET['id'];
$id_mhs=$_GET['id_mhs'];
	 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_program=$_GET[id_program];
$id_kelas=$_GET[id_kelas];
$th_masuk=$_GET[th_masuk];
$id_prodi=$_GET['id_prodi'];
$SQL = "delete from nasional where id='$id'"; 
 if(mysql_query($SQL)) 
  { 
  echo"<html><head><title></title><meta http-equiv='refresh'content='0;URL=home_admin.php?id_prodi=$id_prodi&file=proses nilai nasional input&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$id_mhs&th_masuk=$th_masuk&id_kelas=$id_kelas&id_program=$id_program&id_kurikulum=$id_kurikulum2'></head><body><strong><font color='#0000FF'><center>Data diproses ...</center></font></strong></body></html>";
	} else {
	echo "Data berhasil dihapus";
   } 
   }
   }
   

?>


<? echo include "khs_krs.php";?>
        <h3><center><font color="#000">HALAMAN DATA NILAI UAP NASIONAL</font></center></h3>
                       
        <form action="" method="post" enctype="multipart/form-data" name="form1">
            <table width="100%" border="0" align="center">
			  <tr>
                <td width="137">NIM</td>
                <td width="354">: 
                  <label><? echo $data2[nim];?><input name="id2" type="hidden"  size="40" value="<? echo $id;?>"><input name="id_mhs" type="hidden"  size="40" value="<? echo $data2[id_mhs];?>">
                <input name="nim2" type="hidden"  size="40" value="<? echo $data2[nim];?>"></label></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>: 
                  <label><? echo $data2[nama];?>
                  <input name="nama2" type="hidden" id="nama" size="40" value="<? echo $data2[nama];?>">
                </label></td>
              </tr>
			  <tr>
                <td>PRODI / JURUSAN</td>
                <td>:<label> <? echo $data2[program];?> <? echo $data2[jurusan];?>
                    <input name="jurusan" type="hidden" id="jurusan" size="40" value="<? echo $data2[jurusan];?>">
                  <input name="program" type="hidden" id="program" size="40" value="<? echo $data2[program];?>">
                  <input name="token" type="hidden" id="jurusan" size="40" value="<? echo $token;?>">
                  <input name="sinyal" type="hidden" id="program" size="40" value="<? echo $sinyal;?>">
				  <input name="identifikasi" type="hidden" id="jurusan" size="40" value="<? echo $identifikasi;?>">
                  <input name="kategori" type="hidden" id="program" size="40" value="<? echo $kategori;?>">
				      <input name="id_kelas" type="hidden" id="program" size="40" value="<? echo $id_kelas;?>">
				  <input name="id_program" type="hidden" id="jurusan" size="40" value="<? echo $id_program;?>">
                  <input name="th_masuk" type="hidden" id="program" size="40" value="<? echo $th_masuk;?>">
				   <input name="id_prodi" type="hidden" id="program" size="40" value="<? echo $id_prodi;?>">
                </label></td>
              </tr>
			  
			  <tr>
                <td>Materi</td>
                <td>:<label>
                  <input name="materi" type="text" id="tmplahir" size="40" value="<?=$materi?>">
                </label></td>
              </tr>
              <tr>
                <td>:Nilai</td>
                <td><label>
                  : 
                  <input name="nilai" type="text" id="tmplahir" size="40" value="<?=$nilai?>">
                </label></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <? if(!$_GET['id']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" type=\"submit\" id=\"simpan\" value=\"simpan\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"edit\" type=\"submit\" id=\"edit\" value=\"simpan\" />";
		echo "<input name=\"hapus\" type=\"submit\" id=\"hapus\" value=\"Hapus\" />";
		echo "<input name=\"th_masuk\" type=\"hidden\" id=\"edit\" value=\"$th_masuk\" />";
		echo "<input name=\"id_kelas\" type=\"hidden\" id=\"hapus\" value=\"$id_kelas\" />";
		echo "<input name=\"id_program\" type=\"hidden\" id=\"hapus\" value=\"$id_program\" />";
			echo "<input name=\"id_prosi\" type=\"hidden\" id=\"hapus\" value=\"$id_prodi\" />";
        } ?>
                </label></td>
              </tr>
            </table>
			<hr />
</form> 

			
			
            <p>&nbsp;</p>
            <table width="508" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="53"><div align="center"><strong>No</strong></div></td>
                <td width="84"><div align="center"><strong>Materi</strong></div></td>
				<td width="86"><div align="center"><strong>Nilai</strong></div></td>
                
				 <td width="60"><div align="center"><strong>Proses</strong></div></td>
              </tr>
              <?
  //pilih data dari tabel siswa
$x="select * from nasional where id_mhs='$data2[id_mhs]'";
//ambil query tampilkan
$tampil=mysql_query($x);
//tampilkan data dalam bentuk array di tabel
while ($data=mysql_fetch_array($tampil))
{
$no++;
?>
              <tr>
                <td><div align="center"><? echo $no; ?></div></td>
                <td><? echo $data['materi']; ?></td>
				<td><? echo $data['nilai']; ?></td>
          
                <td><div align="center"><a href="home_admin.php?id_prodi=<? echo $id_prodi;?>&file=proses nilai nasional input&sinyal=<? echo $sinyal;?>&kategori=<? echo $kategori;?>&identifikasi=<? echo $identifikasi;?>&token=<? echo $token;?>&id=<? echo $data['id'];?>&id_mhs=<? echo $data['id_mhs'];?>&th_masuk=<? echo $th_masuk;?>&id_kelas=<? echo $id_kelas;?>&id_kurikulum=<? echo $data2[id_kurikulum];?>&id_program=<? echo $id_program;?>">EDIT</a>
				
				</div></td>
				
				<? } ?>
			  </tr>

    
</table>
<?
$x2="select * from tb_mahasiswa where id_mhs='$id_mhs'";
//ambil query tampilkan
$tampil2=mysql_query($x2);
?>
<p align="center"><a href="home_admin.php?id_prodi=<? echo $id_prodi;?>&file=proses nilai uap input&sinyal=<? echo $sinyal;?>&kategori=<? echo $kategori;?>&identifikasi=<? echo $identifikasi;?>&token=<? echo $token;?>&th_akademik=<? echo $th_masuk;?>&id_kelas=<? echo $id_kelas;?>&id_kurikulum=<? echo $data2[id_kurikulum];?>&id_prodi=<? echo $id_program;?>">KEMBALI</a></p>
