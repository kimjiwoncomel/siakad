<?php session_start();include "server.php";?>
<?
date_default_timezone_set('Asia/Jakarta');
require_once("server.php");
require_once ("enkripsian/function.php");

?>
<form method="post" action="kuri.php">
<center>
  <table width="35%" align="center" bordercolor="#0000FF" bgcolor="#33CCCC">
  <tr> 
      <td nowrap><div align="right"><strong>PRODI</strong></div></td>
      <td>&nbsp;</td>
      <td>  <select name="id_prodi">
<?
$ambil_data= "SELECT *from prodi";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
$ambil= "SELECT *from jenjang where id_jenjang='$data1[jenjang]' ";
$hasil=mysql_query($ambil);
$lihat = mysql_fetch_array($hasil);
?>
          <option value="<? echo $data1[id_prodi];?>"><? echo $lihat[jenjang];?> <? echo $data1[nama_prodi];?></option>
<?
}
?>
        </select></td>
    </tr>
	 <tr> 
      <td nowrap><div align="right"><strong>SEMESTER</strong></div></td>
      <td>&nbsp;</td>
      <td>  <? include "id_semester.php"; ?></td>
    </tr>
    <tr>
    <td align="center" colspan="3"><input type="submit" value="Login">

&nbsp; &nbsp;<input type="reset" value="Reset">    </tr></td>
</table>
</center>
</form>


