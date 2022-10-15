<select name="id_prodi">
<?
$ambil_data= "SELECT *from prodi ";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
$ambil= "SELECT *from jenjang where id_jenjang='$data1[jenjang]' ";
$hasil=mysql_query($ambil);
$lihat = mysql_fetch_array($hasil);
?>
          <option value="<? echo $data1[id_prodi];?>"><? echo $lihat[jenjang];?> <? echo $data1[nama_prodi];?></option>
<?
}
?>
        </select>
