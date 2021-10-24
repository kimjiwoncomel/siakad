<?
include ("server.php");

$prt="select * from simpan_pin where id_prodi='$id_prodi' and id_kurikulum='$id_kurikulum' and th_akademik='$th_akademik' and semester='$semester' and nim='$nim' and no_pin='$password'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	$hasilnya=mysql_fetch_array($hasil);
	
	$ambil_smt=mysql_query("SELECT *FROM semester_berapa where semester='$semester'");
echo mysql_error();
$data_smt=mysql_fetch_array($ambil_smt);

$ambil_mhs= mysql_query("SELECT * from tb_mahasiswa where nim='$hasilnya[nim]'");
echo mysql_error();
$data_mhs = mysql_fetch_array($ambil_mhs);

if ($_POST[proses]=="proses"){
include 'server.php';
  $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];

$ambil_smt="SELECT * FROM tahun WHERE id IN(SELECT MAX(id) FROM tahun ) ";
		$smt=mysql_query($ambil_smt);

		$data_smt=mysql_fetch_array($smt);
mysql_query("truncate table tb_pin");
$program=$_POST[program];
$prodi=$_POST[prodi];
$digit=$_POST[digit];
$jml_pin=10;

 $today = "$data_smt[kode]";

$nomorpertanyaan = array(); //untuk array nomor pertanyaan yang valid(tidak kembar)
$ceknomor = array(); //untuk array yang digunakan untuk melakukan pengecekan
$nos=1000;

$max = 10000000; // max nomor acak
//for ($i=0;$i<$max;$i++)
for ($i=0;$i<$jml_pin;$i++)
{
$awal=0001;
$akhir=20000;
$nomor = substr(md5(rand($awal,$akhir)), 0, $digit); //nomor hasil random 5 digit
while(in_array($nomor,$ceknomor)) //fungsi in_array = cek apakah $nomor ada dalam array $ceknomor
	{
		$nomor = substr(md5(rand($awal,$akhir)), 0, $digit); //diulang sampai tidak sama
	}
$ceknomor[$i] = $nomor; //simpan nomor yang valid dalam array $ceknomor ke-i
$nomorpertanyaan[$i] = "$prodi$nomor";
//$nextNoTransaksi = sprintf('%04s', $nomorpertanyaan[$i]);
// echo substr(md5(rand()), 0, 10);
$nextNoTransaksi = $nomorpertanyaan[$i];
//echo $nextNoTransaksi.",";
$nos++;
$nextNoTransaksi;	

mysql_query("INSERT INTO tb_pin (id_pin, pin)
       VALUES ('$nos', '$today$nextNoTransaksi')");
		echo mysql_error();
		echo"<html><head><title></title><meta http-equiv='refresh'content='1;URL=home_mhs.php?file=tes&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'></head><body><center><strong><font color='#FF0000'>Data Diproses...</font></strong></center></body></html>";
echo mysql_error();
exit();
}
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsinbox = 10;
$pageNum_rsinbox = 0;
if (isset($_GET['pageNum_rsinbox'])) {
  $pageNum_rsinbox = $_GET['pageNum_rsinbox'];
}
$startRow_rsinbox = $pageNum_rsinbox * $maxRows_rsinbox;


$query_rsinbox = "SELECT * FROM tb_pin ORDER BY id_pin DESC";
$query_limit_rsinbox = sprintf("%s LIMIT %d, %d", $query_rsinbox, $startRow_rsinbox, $maxRows_rsinbox);
$rsinbox = mysql_query($query_limit_rsinbox,$link) or die(mysql_error());
$row_rsinbox = mysql_fetch_assoc($rsinbox);

if (isset($_GET['totalRows_rsinbox'])) {
  $totalRows_rsinbox = $_GET['totalRows_rsinbox'];
} else {
  $all_rsinbox = mysql_query($query_rsinbox);
  $totalRows_rsinbox = mysql_num_rows($all_rsinbox);
}
$totalPages_rsinbox = ceil($totalRows_rsinbox/$maxRows_rsinbox)-1;

$queryString_rsinbox = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsinbox") == false && 
        stristr($param, "totalRows_rsinbox") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsinbox = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsinbox = sprintf("&totalRows_rsinbox=%d%s", $totalRows_rsinbox, $queryString_rsinbox);
?>

<style type="text/css">
<!--
.style3 {font-weight: bold}
-->
</style>


<p align="center"><strong>Form untuk membuat pin Baru</strong></p>
<center>
<form action="" method="post">
<table align="center" width="40%">
<tr>
    <td align="center"><div align="left" class="style3">PRODI</div></td>
    <td align="center">:</td>
    <td align="center">
      <div align="left">
        <select name="prodi">
          <?
include ("server.php");
$ambil_data= "SELECT *from prodi ";
$ambil_datanya=mysql_query($ambil_data);
while ($data1 = mysql_fetch_array($ambil_datanya))
{
$ambil= "SELECT *from jenjang where id_jenjang='$data1[jenjang]' ";
$hasil=mysql_query($ambil);
$lihat = mysql_fetch_array($hasil);
?>
          <option value="<?echo $data1[kode]?>"><?echo $lihat[jenjang]?> <?echo $data1[nama_prodi]?></option>
              <?
}
?>
        </select>
      </div></td>
</tr>

  <tr>
    <td align="center"><div align="left" class="style3">Jumlah Digit</div></td>
    <td align="center">:</td>
    <td align="center"><div align="left">
      <input name="digit" type="text" size="5">
    </div></td>
</tr>
  <tr>
    <td align="center"><div align="left" class="style3">Jumlah Pin</div></td>
    <td align="center">:</td>
    <td align="center"><div align="left">
      <input name="jml_pin" type="text" size="5">
    </div></td>
</tr>
</table>
<center>
<input type="submit" value="proses" name="proses">
 <input name="q" type="hidden" value="<? echo"$q";?>">
	 <input name="m" type="hidden" value="<? echo"$m";?>">
	 <input name="lum" type="hidden" value="<? echo"$lum";?>">
	<input name="san" type="hidden" value="<? echo $san;?>">
	<input name="ter" type="hidden" value="<? echo $ter;?>">
	<input name="aka" type="hidden" value="<? echo $aka;?>">
	<input name="token" type="hidden" value="<? echo $token;?>">
</center>
</form>
<br>
<center>
  <strong>Data Pin</strong>
 [<? echo"<a href='./wpadmin/pin_download.php?sinyal=$sinyal&identifikasi=$identifikasi&kategori=$kategori&token=$token&id_prodi=$id_prodi&id_kurikulum=$id_kurikulum&id_mk=$id_mk&th_akademik=$th_akademik&id_smt=$id_smt&id_kelas=$id_kelas'>Download PIN NEW</a>";?>] 
</center>
                
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#B1C3D9" width="50%">
  <tr>
    <td  bgcolor="#996600" class="kop" >No</td>
    <td  bgcolor="#996600" class="kop" >No PIN </td>

  </tr>
  <?php $no=1;?>
  <?php do { ?>
    <tr>
      <td valign="top" bgcolor="#FFFFCC" class="isi"><?php echo $no++; ?></td>
      <td valign="top" bgcolor="#FFFFCC" class="isi"><?php echo $row_rsinbox['pin']; ?></td>
      
    </tr>
    <?php } while ($row_rsinbox = mysql_fetch_assoc($rsinbox)); ?>
</table>
<br>

<table width="407">
<tr bgcolor="#FFFFFF">
      <td class="isi">&nbsp;</td>
      <td colspan="2" valign="top" class="isi">&nbsp;
        <table border="0" >
          <tr>
            <td><?php if ($pageNum_rsinbox > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsinbox=%d%s", $currentPage, 0, $queryString_rsinbox); ?>">First</a>
              <?php } // Show if not first page ?>            </td>
            <td><?php if ($pageNum_rsinbox > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsinbox=%d%s", $currentPage, max(0, $pageNum_rsinbox - 1), $queryString_rsinbox); ?>">Previous</a>
              <?php } // Show if not first page ?>            </td>
            <td><?php if ($pageNum_rsinbox < $totalPages_rsinbox) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsinbox=%d%s", $currentPage, min($totalPages_rsinbox, $pageNum_rsinbox + 1), $queryString_rsinbox); ?>">Next</a>
              <?php } // Show if not last page ?>            </td>
            <td><?php if ($pageNum_rsinbox < $totalPages_rsinbox) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsinbox=%d%s", $currentPage, $totalPages_rsinbox, $queryString_rsinbox); ?>">Last</a>
              <?php } // Show if not last page ?>            </td>
          </tr>
        </table>        </td>
      <td colspan="2" align="right" valign="top" class="isi">Records <?php echo ($startRow_rsinbox + 1) ?> to <?php echo min($startRow_rsinbox + $maxRows_rsinbox, $totalRows_rsinbox) ?> of <?php echo $totalRows_rsinbox ?> </td>
    </tr>
</table>
<?php
mysql_free_result($rsinbox);
?>
</center>

