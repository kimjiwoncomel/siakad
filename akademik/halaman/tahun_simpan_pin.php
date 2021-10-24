<select name="th_akademik">
<?
//$ambil_data = mysql_query("SELECT * FROM tbl_mhs_awal");
//while ($jml_mhs = mysql_fetch_array($ambil_data)){
$ambil_id_program=mysql_query("SELECT distinct th_akademik FROM tbl_mhs_awal");
$ambil_nama_program=mysql_query("SELECT distinct th_akademik FROM tbl_mhs_awal");
while ($id_program = mysql_fetch_array($ambil_id_program)){
$nama_program = mysql_fetch_array($ambil_nama_program)

?>
          <option value="<?echo $id_program[th_akademik]?>"><?echo $nama_program[th_akademik]?></option>
<? } ?>		  
        </select>