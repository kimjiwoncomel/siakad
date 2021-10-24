<?
include ("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
$id_prodi = $_GET['id_prodi'];
$id_kelas = $_GET['id_kelas'];
$id_kurikulum = $_GET['id_kurikulum'];
$th_masuk = $_GET['th_masuk'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$ambil_semester= "SELECT *from kelas where id_kelas='$id_kelas'";
$ambil_semesternya=mysql_query($ambil_semester);
echo mysql_error();
$ambil_semester = mysql_fetch_array($ambil_semesternya);
//================
//$ambil_data2= "SELECT *from mahasiswa_d3 where kelas='$ambil_semester[kelas]' and th_masuk='$th_masuk' and status='BELUM_LULUS'";
$ambil_data2= "SELECT *from tb_mahasiswa where id_kelas='$id_kelas' and id_program='$id_prodi' and th_masuk='$th_masuk' and id_kurikulum='$id_kurikulum'";
$ambil_datanya2=mysql_query($ambil_data2);
echo mysql_error();
$data12 = mysql_fetch_array($ambil_datanya2);
?>
<? echo include "mahasiswa.php";?>
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
				  <td class="kotak"><div align="center"><strong>Ganti Status</strong></div></td>
<?
$cekquery= "SELECT *from tb_mahasiswa where id_kelas='$id_kelas' and id_program='$id_prodi' and th_masuk='$th_masuk' and id_kurikulum='$id_kurikulum'";
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
				  <td class="kiribawahkanan" align="center"><? echo"<a href='home_admin.php?file=proses status mahasiswa belum&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$data[id_mhs]&th_masuk=$data[th_masuk]&id_kelas=$data[id_kelas]&id_prodi=$data[id_program]&id_kurikulum=$data[id_kurikulum]'><strong><font color='#0000FF'>BELUM LULUS</font></strong></a>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo"<a href='home_admin.php?file=proses status mahasiswa sudah&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$data[id_mhs]&th_masuk=$data[th_masuk]&id_kelas=$data[id_kelas]&id_prodi=$data[id_program]&id_kurikulum=$data[id_kurikulum];><strong><font color='#0000FF'>SUDAH LULUS</font></strong></a>";?></td>    
    <? 
	}
	?>	 
	</tr><tr><td>
     <td class=""></td>
  </td><td></td>
  <td></td><td></td><td></td></tr>
  </table>
