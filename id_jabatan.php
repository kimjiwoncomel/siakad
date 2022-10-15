<select name="jabatan">
<?
$ambil_data= "SELECT *from jabatan ";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
?>
          <option value="<? echo $data1[id];?>"><? echo $data1[jabatan];?></option>
<?
}
?>
        </select>
