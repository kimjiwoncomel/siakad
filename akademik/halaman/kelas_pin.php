<select name="id_kelas">
<?
//$ambil_data = mysql_query("SELECT * FROM tbl_mhs_awal");
//while ($jml_mhs = mysql_fetch_array($ambil_data)){
$ambil_id_program=mysql_query("SELECT distinct id_kelas FROM tbl_mhs_awal");
$ambil_nama_program=mysql_query("SELECT distinct kelas FROM tbl_mhs_awal");
while ($id_program = mysql_fetch_array($ambil_id_program)){
$nama_program = mysql_fetch_array($ambil_nama_program)

?>
          <option value="<?echo $id_program[id_kelas]?>"><?echo $nama_program[kelas]?></option>
<? } ?>		  
        </select>
