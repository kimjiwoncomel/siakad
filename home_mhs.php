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

	$prt="select * from simpan_pin where id_prodi='$pro' and id_kurikulum='$idkr' and th_akademik='$th' and semester='$sms' and nim='$nim' and no_pin='$pin' and id_kelas='$idk'";
	$hasil=mysql_query($prt);
	$ada=mysql_num_rows($hasil);
	$hasilnya=mysql_fetch_array($hasil);
	if($ada<=0)
	{
		
			echo"<center><font size=3 color=#990000>  ERROR !!!!!</font></center><br>";
		echo "<center><p><a href='index.php'>SILAHKAN LOGIN YANG BENAR</a></p></center>";
		exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><? 
           include "inc/title.php";?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link href="css/tabel.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="bg_clouds">
<div id="main">
<!-- header begins -->
<div id="header">
	
	 <? 
           include "inc/header.php";
         include "inc/menumhs.php";
         ?>
</div>
<!-- header ends -->
<div class="top_top"></div>
<div class="top">

 <div id="wrapper">
       
 <? echo " <div id='slider-wrapper'>        
            <div id='slider' class='nivoSlider'>
                <img src='css/images/top2.jpg' alt=''/>
                <img src='css/images/top3.jpg' alt='' />
            </div>        
        </div>
		";?>
           
</div>

<script type="text/javascript" src="lib/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="lib/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</div>
<div class="top_bot"></div>
<div style="height:17px"></div>
        <!-- content begins -->
        		<div class="cont_top"></div>
       			<div id="content">
                    <div class="razd_lr_h">
                    	<? 
           include "inc/file.php";
           ?>
                    	<div style="clear: both"></div>
                 	</div>
        		</div>
                <div class="cont_bot"></div>
    <!-- content ends --> 
    <div style="height:15px"></div>
    <!-- bottom begin -->

</div>
</div>

</body>
</html>

<? 
} 

	?>
