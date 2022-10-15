<select name="id_kelas">
<?
include "server.php";
		$ambil_smt="SELECT *FROM kelas";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_kelas];?>"><? echo $data_smt[kelas];?></option>
	<?}?>
        </select>
		