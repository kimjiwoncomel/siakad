<?php session_start();include "server.php";?>
<?
date_default_timezone_set('Asia/Jakarta');
require_once("server.php");
require_once ("enkripsian/function.php");
 $id_prodi=addslashes (stripslashes (strip_tags ($_POST[id_prodi])));
 $id_smt=addslashes (stripslashes (strip_tags ($_POST[id_smt])));
 $id_kurikulum=addslashes (stripslashes (strip_tags ($_POST[id_kurikulum])));
$kuncinya2=date ('YmdA');
$key2="st1ke5y0";
$token2 = md5(md5($kuncinya2).md5("$key2"));
?>
<form method="post" action="../index.php?page=proses_akademik">
<center>
  <table width="35%" align="center" bordercolor="#0000FF" bgcolor="#33CCCC">
	<tr>
		<td align="right"><font color="#000"><strong>Username</strong></font></td>
		<td align="center"><strong>:</strong></td>
		<td align="left"><input type="text" name="username" size="20" maxlength="20"> <input type="hidden" name="status" size="20" maxlength="20" value="1"></td>
	</tr>
  <tr>
    <td align="right"><strong><font color="#000">Password</font></strong></td>
    <td align="center"><strong>:</strong></td>
    <td align="left"><input type="password" name="password" size="20" maxlength="20"> 
  </tr>
   <tr> 
      <td nowrap><div align="right"><strong>MATKUL</strong></div></td>
      <td>&nbsp;</td>
      <td>  <strong>
        <select name="id_mk">
          <?



		$ambil_smt=" SELECT *FROM matkul where id_prodi='$id_prodi' and id_kurikulum='$id_kurikulum' and id_smt='$id_smt'";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){
				
	
?>
          <option value="<? echo $data_smt[id_mk];?>"> <? echo $data_smt[matkul];?> </option>
            <?}
			?>
        </select>
      </strong></td>
    </tr>
    <tr>
    <td align="center" colspan="3"><input type="submit" value="Login">
		<input name="token2" type="hidden" value="<? echo $token2; ?>">
	<input type="hidden" name="id_smt" value="<? echo $id_smt;?>">
<input type="hidden" name="id_prodi" value="<? echo $id_prodi;?>">
<input type="hidden" name="id_smt" value="<? echo $id_smt;?>">
<input type="hidden" name="id_kurikulum" value="<? echo $id_kurikulum;?>">
<input name="Dosen" type="hidden" value="Dosen">
&nbsp; &nbsp;<input type="reset" value="Reset">    </tr></td>
</table>
</center>
</form>


