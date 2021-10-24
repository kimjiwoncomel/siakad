<select name="id_kurikulum">
<?
//$ambil_data = mysql_query("SELECT * FROM tbl_mhs_awal");
//while ($jml_mhs = mysql_fetch_array($ambil_data)){
$ambil_id_program=mysql_query("SELECT distinct id_kurikulum FROM tbl_mhs_awal");
$ambil_nama_program=mysql_query("SELECT distinct kurikulum FROM tbl_mhs_awal");
while ($id_program = mysql_fetch_array($ambil_id_program)){
$nama_program = mysql_fetch_array($ambil_nama_program)

?>
          <option value="<?echo $id_program[id_kurikulum]?>"><?echo $nama_program[kurikulum]?></option>
<? } ?>		  
        </select>
