<select name="id_thn">
<?
include "server.php";
		$ambil_smt="SELECT *FROM tahun_berapa order by no_urut";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_thn];?>"><? echo $data_smt[tahun];?></option>
	<?}?>
        </select>
		