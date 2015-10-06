

<?php
//Merkez Bankasından Kur Bilgilerini Çekme
$dosya= simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
foreach ($dosya->Currency as $Currency) {
// Dolar ALIŞ-SATIŞ

if ($Currency['Kod']=="USD") {$usd_satis=$Currency->BanknoteSelling; $usd_alis=$Currency->BanknoteBuying; }
// EURO ALIŞ-SATIŞ
if ($Currency['Kod']=="EUR") {$euro_satis=$Currency->BanknoteSelling; $euro_alis=$Currency->BanknoteBuying; }
if ($Currency['Kod']=="GBP") {$gbp_satis=$Currency->BanknoteSelling; $gbp_alis=$Currency->BanknoteBuying; }
if ($Currency['Kod']=="CHF") {$chf_satis=$Currency->BanknoteSelling; $chf_alis=$Currency->BanknoteBuying; }
if ($Currency['Kod']=="SEK") {$sek_satis=$Currency->BanknoteSelling; $sek_alis=$Currency->BanknoteBuying; }
if ($Currency['Kod']=="CAD") {$cad_satis=$Currency->BanknoteSelling; $cad_alis=$Currency->BanknoteBuying; }


}
?>

Döviz Kurları
<?php echo " USD Satış Fiyatı \n".$usd_alis ?>
<?php echo " USD Satış Fiyatı \n".$usd_satis ?>

<div ><?php echo "EURO Satış Fiyatı \n".$euro_alis ?></div>
<div ><?php echo "EURO Satış Fiyatı \n".$euro_satis ?></div>
<div ><?php echo " İngiliz Sterlini Satış Fiyatı \n".$gbp_alis ?></div>
<div ><?php echo " İngiliz Sterlini Alış Fiyatı \n".$gbp_satis ?></div>
<div ><?php echo " İsviçre Frangı Alış Fiyatı \n".$chf_alis ?></div>
<div ><?php echo " İsviçre Frangı Satış Fiyatı \n".$chf_satis ?></div>
<div ><?php echo " İsveç Kronu Alış Fiyatı \n".$sek_alis ?></div>
<div ><?php echo " İsveç Kronu Satış Fiyatı \n".$sek_satis ?></div>
<div ><?php echo " Kanada Doları Alış Fiyatı \n".$cad_alis ?></div>
<div ><?php echo " Kanada Doları Satış Fiyatı \n".$cad_satis ?></div>

