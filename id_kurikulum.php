<select name="id_kurikulum">
<?
include "server.php";
		$ambil_smt="SELECT *FROM kurikulum";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[id_kurikulum];?>"><? echo $data_smt[nama_kurikulum];?></option>
	<?}?>
        </select>
		