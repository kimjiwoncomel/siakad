<?

function konversi2($x){
  
  $x = abs($x);
  $angka = array("Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight",   "Nine","Ten", "Eleven");
  $temp = "";
  
  if($x < 12){
   $temp = " ".$angka[$x];
  }else if($x<20){
   $temp = konversi($x - 10)." belas";
  }else if ($x<100){
   $temp = konversi($x/10)." puluh". konversi($x%10);
  }else if($x<200){
   $temp = " seratus".konversi($x-100);
  }else if($x<1000){
   $temp = konversi($x/100)." ratus".konversi($x%100);   
  }else if($x<2000){
   $temp = " seribu".konversi($x-1000);
  }else if($x<1000000){
   $temp = konversi($x/1000)." ribu".konversi($x%1000);   
  }else if($x<1000000000){
   $temp = konversi($x/1000000)." juta".konversi($x%1000000);
  }else if($x<1000000000000){
   $temp = konversi($x/1000000000)." milyar".konversi($x%1000000000);
  }
  
  return $temp;
 }
  
 
 function tkoma2($x){
  $str = stristr($x,",");
  $ex = explode(',',$x);
  
  if(($ex[1]/10) >= 1){
   $a = abs($ex[1]);
  }
  $string = array("Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight",   "Nine","Ten", "Eleven");
  $temp = "";
 
  $a2 = $ex[1]/10;
  $pjg = strlen($str);
  $i =1;
    
  
  if($a>=1 && $a< 12){   
   $temp .= " ".$string[$a];
  }else if($a>12 && $a<20){   
   $temp .= kata($a - 10)." belas";
  }else if ($a>20 && $a<100){   
   $temp .= kata($a/10)." puluh". kata($a%10);
  }else{
   if($a2<1){
    
    while ($i<$pjg){     
     $char = substr($str,$i,1);     
     $i++;
     $temp .= " ".$string[$char];
    }
   }
  }
   
  return $temp;
  
 }
 
 function terbilang2($x){
  if($x<0){
   $hasil = "minus ".trim(konversi(x));
  }else{
   $poin2 = trim(tkoma2($x));
   $hasil2 = trim(konversi2($x));
  }
  
  
  if($poin2){
   $hasil2 = $hasil2." Point ".$poin2;
  }else{
   $hasil2 = $hasil2;
  }
  return $hasil2;  
 } 
?>
