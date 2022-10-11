<select name="id_arsip">
<?
include ("server.php");
$ambil_data= "SELECT *from kat_tgl ";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
?>
          <option value="<?echo $data1[id]?>"><?echo $data1[nama]?></option>
<?
}
?>
        </select>
