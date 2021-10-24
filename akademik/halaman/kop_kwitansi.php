<?
include ("server.php");
$ambil_kop= "SELECT *from kop where baris_kop<'6'";
$kopnya=mysql_query($ambil_kop);
echo mysql_error();
?>
<table width="100%" border="0" align="center">
  <tr>
    <td width="14%"><img src="../images/bakhti-husada.jpg" width="68%" height="23%"></td>
    <td width="71%">  <div align="center">
      <? while ($data_kop = mysql_fetch_array($kopnya)){
?>
      <font size="2"><strong><? echo "$data_kop[isi_kop]<br>";?></strong></font>
      <?
}
?>	
      </div></td>
    <td width="15%"><img src="../images/POLTEKES-KENDARI.jpg" width="67%" height="23%"></td>
  </tr>
</table>
