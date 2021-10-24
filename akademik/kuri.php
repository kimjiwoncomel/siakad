<?php session_start();include "server.php";?>
<?
date_default_timezone_set('Asia/Jakarta');
require_once("server.php");
require_once ("enkripsian/function.php");
$id_prodi=$_POST[id_prodi];
$id_smt=$_POST[id_smt];
?>
<form method="post" action="keu.php">
<center>
  <table width="35%" align="center" bordercolor="#0000FF" bgcolor="#33CCCC">
  <tr> 
   <tr> 
      <td nowrap><div align="right"><strong>KURIKULUM</strong></div></td>
      <td>&nbsp;</td>
      <td>  
       <? include "id_kurikulum.php"; ?></td>
    </tr>
    <tr>
    <td align="center" colspan="3"><input type="submit" value="Login"><input type="hidden" name="id_smt" value="<? echo $id_smt;?>">
<input type="hidden" name="id_prodi" value="<? echo $id_prodi;?>">
&nbsp; &nbsp;<input type="reset" value="Reset">    </tr></td>
</table>
</center>
</form>


