<?
require("server.php");
 $sinyal = $_GET['sinyal'];
$kategori = $_GET['kategori'];
 $identifikasi = $_GET['identifikasi'];
$token=$_GET['token'];
$id_prodi=$_GET['id_prodi'];

if ($_POST[proses]=="proses"){
 $id_kelas = addslashes (stripslashes (strip_tags ($_POST[id_kelas])));
$id_smt = addslashes (stripslashes (strip_tags ($_POST[id_smt])));
 $th_akademik = addslashes (stripslashes (strip_tags ($_POST[th_akademik])));
$token=$_POST[token];
$id_prodi=$_POST['id_prodi'];
 $sinyal = $_POST['sinyal'];
$kategori = $_POST['kategori'];
$id_prodi = $_POST['id_prodi'];
$id_kurikulum = $_POST['id_kurikulum'];
 $identifikasi = $_POST['identifikasi'];
$token=$_POST['token'];
echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_admin.php?file=proses nilai khs&sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_smt=$id_smt&th_akademik=$th_akademik&id_kelas=$id_kelas'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
?>
<? echo include "khs_krs.php";?>
<form name="proses" method="post" action="">
<center>
  <table width="35%" border="0" align="center" bgcolor="#CC9933">
    <tr> 
      <td align="center" colspan="3"><strong><font color="#FFFFFF">FORM INPUT 
        NILAI KHS</font></strong></td>
    </tr>
    <tr> 
      <td align="right">Program Studi</td>
      <td align="center">:</td>
      <td align="left"> 
        <?include "id_prodi.php";?>
      </td>
    </tr>
	 <tr> 
      <td align="right">Kelas</td>
      <td align="center">:</td>
      <td align="left"> 
        <?include "id_kelas.php";?>
      </td>
    </tr>
	 <tr> 
      <td align="right">Semester</td>
      <td align="center">:</td>
      <td align="left"> 
        <?include "id_semester.php";?>
      </td>
    </tr>
	 <tr> 
      <td align="right">Tahun Akademik</td>
      <td align="center">:</td>
      <td align="left"> 
      <select name="th_akademik">
<?
include "server.php";
		$ambil_smt="SELECT *FROM akademik ";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[akademik];?>"><? echo $data_smt[akademik];?></option>
	<?}?>
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan="3" align="center"><input type="submit" value="proses" name="proses">
<input name="sinyal" type="hidden" value="<? echo $sinyal;?>"><input name="token" type="hidden" value="<? echo $token;?>"><input name="id_prodi" type="hidden" value="<? echo $id_prodi;?>">
<input name="identifikasi" type="hidden" value="<? echo $identifikasi;?>"><input name="kategori" type="hidden" value="<? echo $kategori;?>" /></td>
    </tr>
  </table>
  </center>
</form>

