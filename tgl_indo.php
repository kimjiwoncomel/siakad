<?
$tgl = date(d);
$bln = date(m);
$thn = date(Y);

function today($tgl, $bln, $thn) {
$s_bln = array(1=>'Januari','Pebruari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
$bulan = $s_bln[intval($bln)];

$today = $tgl." ".$bulan." ".$thn;
return $today;
$bulan_ini=$bulan;
}
?>