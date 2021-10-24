<select name="id_status">
<?
include "server.php";
		$ambil_smt="SELECT *FROM tabel_status";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_status];?>"><? echo $data_smt[status];?></option>
	<?}?>
        </select>
		