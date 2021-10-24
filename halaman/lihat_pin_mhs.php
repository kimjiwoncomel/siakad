<?php session_start();include "server.php";?>
  <?
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['prodi']) || !isset($_SESSION['sms']) || !isset($_SESSION['kelas']) || !isset($_SESSION['tahun']) || !isset($_SESSION['kurikulum'])){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="logout.php"
        </script>
  <? 
	}else{
	 $nim=$_SESSION['user'];
   $pin=$_SESSION['pass'];
  $pro=$_SESSION['prodi'];
  $th=$_SESSION['tahun'];
  $idkr=$_SESSION['kurikulum'];
  $idk=$_SESSION['kelas'];
    $sms=$_SESSION['sms'];


if ($_POST[proses]=="Edit"){
include "server.php";
 $id_pin = $_POST[id_pin]; 
  $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];

//tampilkan data sebelum di edit
$sql2="select * from simpan_pin where id_pin='$id_pin';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$nim=$baris['nim'];
$nama=$baris['nama'];
$no_pin=$baris['no_pin'];

//apabila klik tombol edit
if(isset($_POST['edit'])) {
include "server.php";
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$no_pin2=$_POST['no_pin2'];
$id_pin2=$_POST['id_pin2'];
  $q=$_POST['q'];
$m=$_POST['m'];
$lum=$_POST['lum'];
$san=$_POST['san'];
$ter=$_POST ['ter'];
$aka=$_POST['aka'];
$token=$_POST['token'];

	
$SQL = "UPDATE simpan_pin SET no_pin='$no_pin2' where id_pin='$id_pin2'"; 
  	$hasil= mysql_query($SQL); 
	//jika berhasil kembali ke home
  	if($hasil){
    echo "<script type='text/javascript'>
onload =function(){
alert('Pergantian Suskes!');
}
</script>";
echo " <meta http-equiv='refresh'content='1;URL=home_mhs.php?file=lihat pin khs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'>";
    } 
	
    else 
    { 
	echo "<script type='text/javascript'>
onload =function(){
alert('Update error!');
}
</script>";
echo " <meta http-equiv='refresh'content='1;URL=home_mhs.php?file=lihat pin khs&aka=$aka&ter=$ter&san=$san&token=$token&q=$q&m=$m&lum=$lum'>";
    } 
} 
}
?>
 <form action="" method="post" enctype="multipart/form-data" name="form1"><center>
            <table width="477" border="0" align="center">
              <tr>
                <td width="137">NIM</td>
                <td width="354"><label><input name="nim" type="text" id="nim" size="40" value="<?=$nim?>" readonly="yes">
                </label></td>
              </tr>
			 <tr>
                <td>Nama</td>
                <td><label>
                  <input name="nama" type="text" id="nama" size="40" value="<?=$nama?>" readonly="yes">
                </label></td>
              </tr>
			    <tr>
                <td>Pasword/PIN</td>
                <td><label>
                  <input name="no_pin2" type="text" id="ni_pin" size="40" value="<?=$no_pin?>">
                </label></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <? if(!$_POST['id_pin']){
		//bila mau tambah data yang tampil tombol simpan
		echo "";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"edit\" type=\"submit\" id=\"edit\" value=\"edit\" />";
				echo "<input name=\"id_pin2\" type=\"hidden\" id=\"edit\" value=\"$id_pin\" />";
		echo "<input name=\"Hapus\" type=\"submit\" id=\"hapus\" value=\"Hapus\" />";
        } ?>
                </label></td>
              </tr>
            </table>
			</center>
			<hr />
            </form>
			<center>
			<form action="" method="post" enctype="multipart/form-data" name="form1">
			<table width="508">
             <tr>
                <td width="71"><div align="center"><strong>Nim</strong></div></td>
                <td width="181"><div align="center"><strong>Nama</strong></div></td>
				<td width="65"><div align="center"><strong>Pass</strong>/PIN</div></td>
              
             
                <td width="61"><div align="center"><strong>Aksi</strong></div></td>
              </tr>
              <?
$x="select * from simpan_pin where id_prodi='$pro' and id_kurikulum='$idkr' and th_akademik='$th' and semester='$sms' and nim='$nim' and no_pin='$pin' and id_kelas='$idk'";
//ambil query tampilkan
$tampil=mysql_query($x);
//tampilkan data dalam bentuk array di tabel
$data=mysql_fetch_array($tampil);

?>
             <tr>
                <td><div align="center"><? echo $data['nim']; ?></div></td>
                <td><div align="center"><? echo $data['nama']; ?></div></td>
				<td><div align="center"><? echo $data['no_pin']; ?></div></td>
              
                <td>	  <div align="center">
                  <input name="q" type="hidden" value="<? echo"$q";?>">
                  <input name="m" type="hidden" value="<? echo"$m";?>">
                  <input name="lum" type="hidden" value="<? echo"$lum";?>">
                  <input name="san" type="hidden" value="<? echo $san;?>">
                  <input name="ter" type="hidden" value="<? echo $ter;?>">
                  <input name="aka" type="hidden" value="<? echo $aka;?>">
                  <input name="token" type="hidden" value="<? echo $token;?>">
                  <input type="submit" name="proses" value="Edit">
                  <input name="id_pin" type="hidden" value="<? echo $data['id_pin']; ?>">
                </div></td></tr>
            </table>  
			</center>
			</form>

<?
}
?>