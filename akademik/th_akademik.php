<select name="th_akademik">
<?
//$ambil_data = mysql_query("SELECT * FROM tbl_mhs_awal");
//while ($jml_mhs = mysql_fetch_array($ambil_data)){
$ambil_id_program=mysql_query("SELECT * FROM akademik");
while ($id_program = mysql_fetch_array($ambil_id_program)){
?>
          <option value="<?echo $id_program[akademik]?>"><?echo $id_program[akademik]?></option>
<? } ?>		  
        </select>
