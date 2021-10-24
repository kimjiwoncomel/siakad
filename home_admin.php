<?php session_start();include "server.php";?>
  <?
	
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass']) ){ 
		?>
  <script language="javascript">
			alert("Anda belum login. Please login dulu"); 
			document.location="index.php"
        </script>
  <? 
	}else{
	 $username=$_SESSION['user'];
     $password=$_SESSION['pass'];
			$prt="select * from user where username='$username' and password='$password'";
	if(!$hasil=mysql_query($prt,$link))
	{
		echo mysql_error();
			echo"<center><font size=3 color=#990000>LOGIN GAGAL </font></center>";
		return 0;
	}
	$data_up=mysql_fetch_array($hasil);
$ada=mysql_num_rows($hasil);


	
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
<link href="tabel.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="bg_clouds">
<div id="main">
<!-- header begins -->
<div id="header">
	
	 <? 
           include "inc/header.php";
         include "inc/top.php";
         ?>
</div>
<!-- header ends -->
<div class="top_top"></div>
<div class="top">

 <div id="wrapper">
       

		<? 
           include "inc/wrapper.php";
           ?>
           
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
           include "inc/admin.php";
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
