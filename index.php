<?php
include 'head.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");



$grab=ngegrab('https://www.cryptopia.co.nz/api/GetMarkets/USDT');
$json = json_decode($grab, true);
$usd= $json['Data'][3]['AskPrice'];


$grabs=ngegrab('https://www.cryptopia.co.nz/api/GetMarkets/BTC');
$jsons = json_decode($grabs);
echo '<table border=1>';

echo '<tr>';
if($jsons)
foreach ($jsons->Data as $sam)
{
  $market= $sam->Label;
  $link= (float) $sam->AskPrice;
  $link = number_format($link, 8);
  echo '
           <td>'.$market.'
           '.$link.' ($'.number_format($link * $usd, 6).')</td> ';
}

$grabsz=ngegrab('https://www.cryptopia.co.nz/api/GetMarkets/DOGE');
$jsonsz = json_decode($grabsz);

$grabb=ngegrab('https://www.cryptopia.co.nz/api/GetMarkets/USDT');
$jsonss = json_decode($grabb, true);
$dogeusd= $jsonss['Data'][8]['AskPrice'];

echo '<tr><th></th></tr>';
foreach ($jsonsz->Data as $sams)
{
  $markets= $sams->Label;
  $links= (float) $sams->AskPrice;
  $links = number_format($links, 8);
  echo '
            <td>'.$markets.'
            '.$links.'($'.number_format($links * $dogeusd, 6).')</td>
        ';
}



$grabbb=ngegrab('https://www.cryptopia.co.nz/api/GetMarkets/USDT');
$jsonssi = json_decode($grabbb, true);
$ltcusd= $jsonssi['Data'][14]['AskPrice'];

$grabss=ngegrab('https://www.cryptopia.co.nz/api/GetMarkets/LTC');
$jsonssk = json_decode($grabss);

echo '<tr><th></th></tr>';
foreach ($jsonssk->Data as $samsz)
{
  $marketsz= $samsz->Label;
  $linksz= (float) $samsz->AskPrice;
  $linksz = number_format($linksz, 8);
  echo '
            <td>'.$marketsz.'
            '.$linksz.'($'.number_format($linksz * $ltcusd, 6).')</td>
        ';
}

echo '</tr></table>';
echo "BTC/USDT <br/>";
echo  $usd ;
echo "<br/>";
echo "DOGE/USDT<br/>";
echo  $dogeusd ;
echo "LTC/USDT<br/>";
echo  $ltcusd ;
?>
