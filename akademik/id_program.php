<select name="id_jenjang">
<?
include "server.php";
		$ambil_smt="SELECT *FROM jenjang";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_jenjang];?>"><? echo $data_smt[jenjang];?></option>
	<?}?>
        </select>
		