<?
include ("server.php");
session_start();
$kuncinya2=date ('YmdA');
$key2="st1ke5y0";
$token2 = md5(md5($kuncinya2).md5("$key2"));
?>
<form method="post" action="index.php?page=proses_cek_login">
<center>
  <table width="35%" align="center" bordercolor="#0000FF" bgcolor="#33CCCC">
	<tr>
		<td align="right"><font color="#000"><strong>Username</strong></font></td>
		<td align="center"><strong>:</strong></td>
		<td align="left"><input type="text" name="username" size="20" maxlength="20"></td>
	</tr>
  <tr>
    <td align="right"><strong><font color="#000">Password</font></strong></td>
    <td align="center"><strong>:</strong></td>
    <td align="left"><input type="password" name="password" size="20" maxlength="20"> <input type="hidden" name="status" value="0" size="20" maxlength="20"></td>
  </tr>
    <tr>
    <td align="center" colspan="3"><input type="submit" value="Login">
	<input name="token2" type="hidden" value="<? echo $token2; ?>">
	<input name="Admin" type="hidden" value="Admin">
&nbsp; &nbsp;<input type="reset" value="Reset">
    </tr></td>
</table>
</center>
</form>


