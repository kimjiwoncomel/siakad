<?
require("server.php");
  $id_kurikulum=$_GET[id_kurikulum];
  $id_kelas=$_GET[id_kelas];
 $id_akademik=$_GET[th_akademik];
 $id_smt=$_GET[id_smt];
  $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 $id_prodi=$_GET['id_prodi'];

$ambil_mhs= mysql_query("SELECT *from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas'");
$data_mhs=mysql_fetch_array($ambil_mhs);

$ambil_prodi= mysql_query("SELECT *from prodi where id_prodi='$id_prodi' ");
$data_prodi=mysql_fetch_array($ambil_prodi);

$perintah3="select *from jenjang where id_jenjang='$data_prodi[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);

$ambil_kelas= mysql_query("SELECT *from kelas where id_kelas='$id_kelas'");
$data_kelas=mysql_fetch_array($ambil_kelas);

$ambil_semester= mysql_query("SELECT *from semester_berapa where id_smt='$id_smt'");
$data_semester=mysql_fetch_array($ambil_semester);

$ambil_tahun= mysql_query("SELECT *from akademik where id_akademik='$id_akademik'");
$data_tahun=mysql_fetch_array($ambil_tahun);
if ($_POST[proses]=="PROSES TRANSKIP SEMUA"){
  $id_mhs = $_POST[id_mhs];
  $id_kelas=$_POST[id_kelas];
    $id_kurikulum=$_POST[id_kurikulum];
     $id_akademik=$_POST[idakademik];
 $id_smt = $_POST[id_smt];
 $th_akademik = $_POST[akademik];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
 $identifikasi = $_POST['identifikasi'];
 $token=$_POST['token'];
require("server.php");

$ambil_mhs3= mysql_query("SELECT * from pembimbing_akademik where id_pemb_akademik='$data_krs2[id_pemb_akademik]'");
echo mysql_error();
$data_mhs3 = mysql_fetch_array($ambil_mhs3);

$ambil_smt=mysql_query("SELECT *FROM semester_berapa where id_smt='$id_smt'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);	

	for ($i=0; $i <= sizeof ($id_mhs); $i++)
	{
	if($id_mhs[$i] !=""){
		
	$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where id_mhs='$id_mhs[$i]'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);
$data_mhs2 = mysql_num_rows($ambil_mhs);

$cek_krs= mysql_query("SELECT * from transkrip where semester='$data_smt[semester]' and th_akademik='$th_akademik' and id_mk='$data_krs2[id_mk]' and id_mhs='$data_mhs[id_mhs]'");

$data_krs = mysql_fetch_array($cek_krs);
$krsnya2 = mysql_num_rows($cek_krs);
if ($krsnya2 != 0){
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=cek mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&id_smt=$id_smt&nim=$nim&id_mk=$id_mk&id_krs_perawat=$id_krs_perawat&id_akademik=$id_akademik'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
exit;
}
$krs= mysql_query("SELECT * from krs_khs where id_kelas='$id_kurikulum' and th_akademik='$th_akademik' and id_smt='$id_smt' and id_mhs='$data_mhs[id_mhs]'");

while($data_krs2 = mysql_fetch_array($krs)) {

$matkul= mysql_query("SELECT * from matkul where id_mk='$data_krs2[id_mk]'");

$data_kul = mysql_fetch_array($matkul);

$ambil_mhs3= mysql_query("SELECT * from pembimbing_akademik where id_pemb_akademik='$data_krs2[id_pemb_akademik]'");
echo mysql_error();
$data_mhs3 = mysql_fetch_array($ambil_mhs3);

		mysql_query("INSERT INTO transkrip (id_mhs, id_mk, id_krs_perawat,nim,nama,th_akademik,kode_mk,matkul,sks,program,jurusan,kelas,koor_matkul,huruf,angka,matkul_inggris,th_masuk,semester)
		VALUES ('$data_mhs[id_mhs]', '$data_krs2[id_mk]','$data_krs2[id_krs_perawat]','$data_mhs[nim]','$data_mhs[nama]','$th_akademik','$data_kul[kode_mk]','$data_kul[matkul]','$data_kul[sks]','$data_mhs[program]','$data_mhs[jurusan]','$data_mhs[kelas]','$data_mhs3[nama]',
		'$data_krs2[nilai_khs_huruf]','$data_krs2[nilai_khs_bobot]','','$data_mhs[th_masuk]','$data_smt[semester]')");
		
		
		echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=cek mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&id_smt=$id_smt&nim=$nim&id_mk=$id_mk&id_krs_perawat=$id_krs_perawat&id_akademik=$id_akademik'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
		
		}	
			
	}
}
		}
?>
<? echo include "mahasiswa.php";?>
<center><font size="4"><p class="tnr"><strong>MAHASISWA PRODI <? echo $data3[jenjang];?> <? echo $data_prodi[nama_prodi];?> KELAS <? echo $data_kelas[kelas];?> SEMESTER <? echo $data_semester[semester];?> TAHUN AKADEMIK <? echo $data_tahun[akademik];?> YANG SUDAH KRS</strong></p></font></center>
<form name="proses" method="post" action="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                   <td class="kiribawahatas" width="10%"><div align="center"><strong>Status</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nim</strong></div></td>
                  <td class="kotak"><div align="center"><strong>Nama</strong></div></td>
				    <td class="kotak"><div align="center"><strong>Proses Transkip</strong></div></td>
<?
$a= mysql_query("SELECT *from tb_mahasiswa where id_program='$id_prodi' and id_kelas='$id_kelas' and id_kurikulum='$id_kurikulum'");
while ($d = mysql_fetch_array($a))
{

$ambil_mhs= mysql_query("SELECT *from krs_khs where id_mhs='$d[id_mhs]' and th_akademik='$data_tahun[akademik]' and id_smt='$data_semester[id_smt]' and id_kurikulum='$id_kurikulum' and id_kelas='$id_kelas' group by id_mhs order by id_krs_perawat asc");

while ($data_mhs = mysql_fetch_array($ambil_mhs))
{

$mhs= mysql_query("SELECT *from tb_mahasiswa where id_mhs='$data_mhs[id_mhs]' ");
$mhs2 = mysql_fetch_array($mhs);


$noUrut++;
	?>

                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$noUrut"; ?></td>
                   <td class="kiribawahkanan" align="center"><? echo "<input name='id_mhs[]' type=checkBox value=$data_mhs[id_mhs] checked>"; ?></td>
				  <td class="kiribawah" align="center"><? echo"$mhs2[nim]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"$mhs2[nama]";?></td>
				  <td class="kiribawahkanan" align="center"><? echo"<a href='home_admin.php?file=proses mahasiswa transkip&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_kelas=$id_kelas&th_akademik=$data_tahun[akademik]&id_smt=$id_smt&nim=$mhs2[nim]&id_akademik=$id_akademik'>proses</a>";?></td>
    <? 
	}
	}
	?>	 
	</tr>
  </table>
  <table align="center">
     <td class="g_kanan"><div align="center"><input type="submit" name="proses" value="PROSES TRANSKIP SEMUA">
	 <input name="id_kelas" type="hidden" value="<? echo"$id_kelas";?>">
	 <input name="id_smt" type="hidden" value="<? echo"$data_semester[id_smt]";?>">
	 <input name="id_kurikulum" type="hidden" value="<? echo"$id_kurikulum";?>">
	<input name="akademik" type="hidden" value="<? echo $data_tahun[akademik];?>">
	<input name="idakademik" type="hidden" value="<? echo $th_akademik;?>">
	<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>">
<input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" />
	 </div>
	 </td>
  </table>
  </form>
</body>
</html>
