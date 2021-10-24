<?

function konversi2($x){
  
  $x2 = abs($x2);
  $angka2 = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight",   "Nine","Ten", "Eleven");
  $temp2 = "";
  
  if($x2 < 12){
   $temp2 = " ".$angka2[$x2];
  }else if($x2<20){
   $temp2 = konversi2($x2 - 10)." belas";
  }else if ($x<100){
   $temp2 = konversi2($x2/10)." puluh". konversi2($x2%10);
  }else if($x2<200){
   $temp2 = " seratus".konversi2($x2-100);
  }else if($x2<1000){
   $temp2 = konversi2($x2/100)." ratus".konversi2($x2%100);   
  }else if($x2<2000){
   $temp2 = " seribu".konversi2($x-1000);
  }else if($x<1000000){
   $temp2 = konversi2($x2/1000)." ribu".konversi2($x2%1000);   
  }else if($x2<1000000000){
   $temp2 = konversi2($x2/1000000)." juta".konversi2($x2%1000000);
  }else if($x2<1000000000000){
   $temp2 = konversi2($x2/1000000000)." milyar".konversi2($x2%1000000000);
  }
  
  return $temp2;
 }
  
 
 function tkoma2($x2){
  $str2 = stristr($x2,",");
  $ex2 = explode(',',$x2);
  
  if(($ex2[1]/10) >= 1){
   $a2 = abs($ex2[1]);
  }
  $string2 = array("Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight",   "Nine","Ten", "Eleven");
  $temp2 = "";
 
  $a22 = $ex2[1]/10;
  $pjg2 = strlen($str2);
  $i2 =1;
    
  
  if($a2>=1 && $a2< 12){   
   $temp2 .= " ".$string[$a2];
  }else if($a2>12 && $a2<20){   
   $temp2 .= kata2($a2 - 10)." belas";
  }else if ($a2>20 && $a2<100){   
   $temp2 .= kata2($a2/10)." puluh". kata2($a2%10);
  }else{
   if($a22<1){
    
    while ($i2<$pjg2){     
     $char = substr($str2,$i2,1);     
     $i++;
     $temp2 .= " ".$string[$char];
    }
   }
  }
   
  return $temp2;
  
 }
 
 function terbilang2($x2){
  if($x2<0){
   $hasil2 = "minus ".trim(konversi2(x));
  }else{
   $poin2 = trim(tkoma2($x2));
   $hasil2 = trim(konversi2($x2));
  }
  
  
  if($poin2){
   $hasil2 = $hasil2." Koma ".$poin2;
  }else{
   $hasil2 = $hasil2;
  }
  return $hasil2;  
 } 
?>
