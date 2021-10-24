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
?>
<? echo include "mahasiswa.php";?>
 <form name="form_edit_khs1" method="post" action=""> 			

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr bgcolor="#66FF00"> 
                  <td class="kiribawahatas" width="10%"><div align="center"><strong>No</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nim</strong></div></td>
                  <td class="kiribawahatas"><div align="center"><strong>Nama</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Kelas</strong></div></td>
				  <td class="kiribawahatas"><div align="center"><strong>Status</strong></div></td>
				  <td class="kotak"><div align="center"><strong>Aksi</strong></div></td>
<?
$cekquery= "SELECT *from tb_mahasiswa where id_kelas='$id_kelas' and id_program='$id_prodi' and th_masuk='$th_masuk' and id_kurikulum='$id_kurikulum' and status='LULUS'";
$hacekquery=mysql_query($cekquery);
echo mysql_error();
$nos=0;
while ($data = mysql_fetch_array($hacekquery)){
$nos++;

	?>
                <tr onMouseOver=bgColor="#CCCCCC" onMouseOut=bgColor="#FFFFFF">                  
                  <td class="kiribawah" align="center"><? echo "$nos"; ?></td>
				  <td class="kiribawah" align="left"><? echo"$data[nim]";?></td>
                  <td class="kiribawah" align="left"><? echo"$data[nama]";?></td>
				  <td class="kiribawah" align="left"><? echo"$data[kelas]";?></td>
				  <td class="kiribawah" align="left"><? echo"$data[status]";?></td>				  
      <td class="kiribawahkanan" align="left"><? echo"<a href='home_admin.php?file=proses berkas mahasiswa&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_mhs=$data[id_mhs]&th_masuk=$data[th_masuk]&id_kelas=$data[id_kelas]&id_prodi=$data[id_program]&id_kurikulum=$data[id_kurikulum]'><strong><font color='#0000FF'>Input Data Transkrip</font></strong></a>";?></td>
    <? 
	}
	?>	 
	</tr>
  </table>
 </form> 

