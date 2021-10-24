<?php 
session_start(); 
//periksa apakah user telah login atau memiliki session 
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])) { 
     ?><script language="javascript"> document.location="index.php"</script><? 
} else { 
     unset($_SESSION); 
     session_destroy(); 
    ?> <script language="javascript"> document.location="index.php"</script><? 
} 
?>