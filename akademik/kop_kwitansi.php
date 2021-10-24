<?
include ("server.php");
$ambil_kop= "SELECT *from kop where baris_kop<'5'";
$kopnya=mysql_query($ambil_kop);
echo mysql_error();
?>
<table width="100%" border="0" align="center">
  <tr>
    <td width="15%"><img src="images/logo_002.jpg" width="40%" height="40%"></td>
    <td width="85%">  <? while ($data_kop = mysql_fetch_array($kopnya)){
?>
<font size="2"><strong><? echo "$data_kop[isi_kop]<br>";?></strong></font>
<?
}
?>	
  </td></tr>
</table>
