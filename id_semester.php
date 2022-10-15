<select name="id_smt">
<?
include "server.php";
		$ambil_smt="SELECT *FROM semester_berapa order by no_urut";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_smt];?>"><? echo $data_smt[semester];?></option>
	<?}?>
        </select>
		