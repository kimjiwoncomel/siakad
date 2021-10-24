<select name="id_smt">
<?
include ("server.php");
$ambil_data= "SELECT *from semester_berapa";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
?>
          <option value="<?echo $data1[id_smt]?>"><?echo $data1[semester]?></option>
<?
}
?>
        </select>
