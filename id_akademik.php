<select name="id_akademik">
<?
include ("server.php");
$ambil_data= "SELECT *from akademik ";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
?>
          <option value="<?echo $data1[id_akademik]?>"><?echo $data1[akademik]?></option>
<?
}
?>
        </select>
