<?
require ("server.php");
include ("tgl_indo.php");
 $nim = addslashes  (strip_tags ($_GET[nim]));
 $id_kelas = addslashes (stripslashes (strip_tags ($_GET[id_kelas])));
 $id_kurikulum = addslashes (stripslashes (strip_tags ($_GET[id_kurikulum])));
  $th_akademik = addslashes (stripslashes (strip_tags ($_GET[th_akademik])));
    $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];

$sql2="select * from tb_mahasiswa where nim='$nim'";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$nama=$baris['nama'];
$nim=$baris['nim'];
$program=$baris['program'];
$jurusan=$baris['jurusan'];

if ($_POST[simpan]=="simpan"){
require ("server.php");
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
$token=$_POST[token];
$id_prodi=$_POST['id_prodi'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$tgl=$_POST['tgl'];
$tgl2=$_POST['tgl2'];
$tempat=$_POST['tempat'];
$nilai=$_POST['nilai'];
$nim=$_POST['nim'];

	$prt="select * from praktek where nim='$nim'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	$hasilnya=mysql_fetch_array($hasil);
		if($ada>=1)
	{
		
			echo"<center><font size=3 color=#990000>NILAI PRAKTEK SUDAH DI MASUKAN</font></center><br>";
		echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses mahasiswa ujian&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&nim=$nim'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
		exit;
	}

mysql_query("insert into praktek (id_program,nim,nama,tempat,tgl,tgl2,nilai) values ('$id_prodi','$nim','$nama','$tempat','$tgl','$tgl2','$nilai')");
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses mahasiswa ujian&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&nim=$nim'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];

} 

require ("server.php");
//tampilkan data sebelum di edit
$sql2="select * from praktek where id='$id';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$tempat=$baris['tempat'];
$tgl=$baris['tgl'];
$tgl2=$baris['tgl2'];
$nilai=$baris['nilai'];
$id=$baris['id'];


//apabila klik tombol edit
if(isset($_POST['Edit'])) {
require ("server.php");
$nilai=$_POST['nilai'];
$tempat=$_POST['tempat'];
$tgl=$_POST['tgl'];
$tgl2=$_POST['tgl2'];
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
$token=$_POST[token];
$id_prodi=$_POST['id_prodi'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
	
$SQL = "UPDATE praktek SET nilai='$nilai',tempat='$tempat',tgl='$tgl',tgl2='$tgl2' where id='$id'"; 
  	$hasil= mysql_query($SQL); 
	//jika berhasil kembali ke home
  	if($hasil){
   echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses mahasiswa ujian&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&nim=$nim''></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
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
if(isset($_POST['Hapus'])) {
if (!empty($id) && $id != "") {
require ("server.php");
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
$token=$_POST[token];
$id_prodi=$_POST['id_prodi'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$SQL = "delete from praktek where id='$id'"; 
 if(mysql_query($SQL)) 
  { 
    echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses mahasiswa ujian&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&nim=$nim''></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
	} else {
	echo "Data berhasil dihapus";
   } 
   }
   }
   
?>
<? echo include "mahasiswa.php";?>
<p>HALAMAN INPUT UJIAN TULIS</p>
<form name="form1" method="post" action="">
            <table width="100%" border="0" align="center">
			  <tr>
                <td width="214">Nama</td>
                <td width="253"><?=$nama?></td>
              </tr>
			  <tr>
                <td width="214">Nim</td>
                <td width="253"><?=$nim?></td>
              </tr>
              <tr>
                <td width="214">Prodi/Jurusan</td>
                <td width="253"><?=$program?> <?=$jurusan?></td>
              </tr>
			  <tr>
                <td>Tempat Ujian </td>
                <td><label>
                  <input name="tempat" type="text" id="pelatihan" size="40" value="<?=$tempat?>">
                </label></td>
              </tr>
              	  <tr>
                <td>Tanggal Mulai Ujian </td>
                <td><label>
                             <input name="tgl" type="text" id="pelatihan" size="40" value="<?=$tgl?>">
                </label></td>
              </tr>
               <tr>
                <td>Tanggal Selesai Ujian </td>
                <td><label>
                        <input name="tgl2" type="text" id="pelatihan" size="40" value="<?=$tgl2?>">
                </label></td>
              </tr>
       
			  <tr>
                <td>Nilai Ujian </td>
                <td><label>
                  <input name="nilai" type="text" id="lembaga" size="40" value="<?=$nilai?>">
                   <input name="id" type="hidden" id="lembaga" size="40" value="<?=$id?>">
                       <input name="id_kelas" type="hidden" id="lembaga" size="40" value="<? echo $id_kelas;?>">
                   <input name="id_prodi" type="hidden" id="lembaga" size="40" value="<? echo $id_prodi?>">
                       <input name="id_kurikulum" type="hidden" id="lembaga" size="40" value="<? echo $id_kurikulum?>">
                   <input name="identifikasi" type="hidden" id="lembaga" size="40" value="<? echo $identifikasi?>">
                       <input name="token" type="hidden" id="lembaga" size="40" value="<? echo $token;?>">
                   <input name="kategori" type="hidden" id="lembaga" size="40" value="<? echo $kategori;?>">
                       <input name="th_akademik" type="hidden" id="lembaga" size="40" value="<? echo $th_akademik;?>">
                   <input name="sinyal" type="hidden" id="lembaga" size="40" value="<? echo $sinyal;?>">
                     <input name="nim" type="hidden" id="lembaga" size="40" value="<? echo $nim;?>">
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
		echo "<input name=\"Edit\" type=\"submit\" id=\"edit\" value=\"simpan\" />";
		echo "<input name=\"Hapus\" type=\"submit\" id=\"hapus\" value=\"hapus\" />";
        } ?>
                </label></td>
              </tr>
        </table>
			<hr />
</form> 

			
			
            <p>&nbsp;</p>
            <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
              
               
				<td width="56"><div align="center"><strong>Tanggal Mulai Ujian </strong></div></td>
                <td width="100"><div align="center"><strong>Tanggal Selesai Ujian </strong></div></td>
                <td width="74"><div align="center"><strong>Tempat Ujian </strong></div></td>
               <td width="74"><div align="center"><strong>Nilai</strong></div></td>
                
				 <td width="60"><div align="center"><strong>Proses</strong></div></td>
              </tr>
              <?
  //pilih data dari tabel siswa
$x="select * from praktek where nim='$nim'";
//ambil query tampilkan
$tampil=mysql_query($x);
//tampilkan data dalam bentuk array di tabel
while ($data=mysql_fetch_array($tampil))
{
?>
              <tr>
               
           
				<td><div align="center"><? echo $data['tgl']; ?></center></td>
                <td><div align="center"><? echo $data['tgl2']; ?></div></td>
                 <td><div align="center"><? echo $data['tempat']; ?></div></td>
               <td><div align="center"><? echo $data['nilai']; ?></div></td>
              
				<td><div align="center"> <? echo "<a href=\"home_admin.php?file=proses mahasiswa ujian&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik&nim=$data[nim]&id=$data[id]\">Edit</a></p>" ?></div></td>
				<? } ?>
			  </tr>
				
    </table>
<br>
<? echo "<p><a href=\"home_admin.php?file=cek mahasiswa ujian&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kelas=$id_kelas&id_kurikulum=$id_kurikulum&th_akademik=$th_akademik\">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a></p>" ?>