<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
 $th_masuk=$_GET[th_akademik];
 $id_program=$_GET[id_prodi];
  $id_kurikulum=$_GET[id_kurikulum];
$id_mhs=$_GET[id_mhs];
$id_semester=$_GET[id_semester];
  $id_kelas=$_GET[id_kelas];
  
$ambil_semester= "SELECT *from kelas where id_kelas='$id_kelas'";
$ambil_semesternya=mysql_query($ambil_semester);
echo mysql_error();
$ambil_semester = mysql_fetch_array($ambil_semesternya);

$ambil_data= "SELECT *from krs_khs";
$ambil_datanya=mysql_query($ambil_data);
echo mysql_error();
$data1 = mysql_fetch_array($ambil_datanya);

$ambil5_data= "SELECT *from prodi where id_prodi='$id_prodi' order by jenjang";
$ambil5_datanya=mysql_query($ambil5_data);
$data15 = mysql_fetch_array($ambil5_datanya);

$perintah3="select *from jenjang where id_jenjang='$data15[jenjang]'";
$tampil3=mysql_query($perintah3,$link);
$data3=mysql_fetch_array($tampil3);
//================
//$ambil_data2= "SELECT *from mahasiswa_d3 where kelas='$ambil_semester[kelas]' and th_masuk='$th_masuk' and status='BELUM_LULUS'";
$ambil_data2= "SELECT *from tb_mahasiswa where id_kelas='$id_kelas' and id_program='$id_program' and th_masuk='$th_masuk'";
$ambil_datanya2=mysql_query($ambil_data2);
echo mysql_error();
$data12 = mysql_fetch_array($ambil_datanya2);
?>
<? echo include "khs_krs.php";?>
<table width="45%" border="0">
  <tr>
    <td width="43%"><strong>PROGRAM </strong></td>
    <td width="4%"><p class=""><strong>:</strong></p></td>
    <td width="53%" align="left"><strong><?echo"$data12[program]";?> <?echo"$data12[jurusan]";?></strong></td>
  </tr>
  <tr> 
    <td align="left" width="43%"><strong>KELAS</strong></td>
    <td width="4%"><p class=""><strong>:</strong></p></td>
    <td width="53%" align="left"><strong><?echo"$ambil_semester[kelas]";?></strong></td>
  </tr>
  <tr>
    <td align="left" width="43%"><strong>TAHUN MASUK</strong></td>
    <td width="4%"><strong>:</strong></td>
    <td width="53%"><strong><?echo"$data12[th_masuk]";?></strong></td>
  </tr>
</table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>NIM</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nama</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Status</strong></div></td>
				  <td class="kotak"><div align="center"><strong>PROSES</strong></div></td>
<?
$cekquery= "SELECT *from tb_mahasiswa where id_kelas='$id_kelas' and id_program='$id_program' and th_masuk='$th_masuk' ";
//$cekquery= "SELECT *from mahasiswa_d3 where kelas='$ambil_semester[kelas]' and  th_masuk='$th_masuk' and status='BELUM_LULUS'";
$hacekquery=mysql_query($cekquery);
echo mysql_error();
$noUrut = 0;
while ($data = mysql_fetch_array($hacekquery)){
$noUrut++;

	?>
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$noUrut" ?></td>				  
				  <td class="kiribawah" align="left"><? echo"$data[nim]";?></td>
				  <td class="kiribawah" align="left"><? echo"$data[nama]";?></td>
				  <td class="kiribawah" align="center"><strong><? echo"$data[status]";?></strong></td>
				  <td class="kiribawahkanan" align="center"><? echo"<a href='home_admin.php?id_prodi=$data[id_program]&file=proses nilai lokal input&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$data[id_mhs]&th_masuk=$data[th_masuk]&id_kelas=$data[id_kelas]&id_program=$data[id_program]&id_kurikulum=$data[id_kurikulum]'><strong><font color='#0000FF'>NILAI LOKAL</font></strong></a>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo"<a href='home_admin.php?id_prodi=$data[id_program]&file=proses nilai nasional input&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$data[id_mhs]&th_masuk=$data[th_masuk]&id_kelas=$data[id_kelas]&id_program=$data[id_program]&id_kurikulum=$data[id_kurikulum]'><strong><font color='#0000FF'>NILAI NATIONAL</font></strong></a>";?></td>    
    <? 
	}
	?>	 
	</tr><tr><td>
     <td class=""></td>
  </td><td></td>
  <td></td><td></td><td></td></tr>
  </table>
