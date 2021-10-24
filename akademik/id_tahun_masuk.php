<select name="th_masuk">
<?
include "server.php";
		$ambil_smt="SELECT distinct (th_masuk) FROM tb_mahasiswa";
		$smt=mysql_query($ambil_smt);
		echo mysql_error();
		while ($data_smt=mysql_fetch_array($smt)){		
?>
          <option value="<? echo $data_smt[th_masuk];?>"><? echo $data_smt[th_masuk];?></option>
	<?}?>
        </select>
		