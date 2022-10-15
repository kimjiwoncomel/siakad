<select name="id_mk">
<?
include "server.php";
		$ambil_smt="SELECT *FROM matkul order by id_mk";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_mk];?>"><? echo $data_smt[matkul];?></option>
	<?}?>
        </select>
		