<?php
/*
 * @package    Podpishi.kz
 * @copyright  Copyright (C) 2017 - 2020 TOO Podpishi Online (tm).
 * @license    GNU General Public License version 2 or later
 * @help	support request to help-help@podpishi.kz
 */

$banklistkz = array(
'ABKZKZ' => 'АО "БТА Банк"',
'ABNAKZ' => 'АО ДБ "RBS (Kazakhstan)"',
'ALFAKZ' => 'АО "ДОЧЕРНИЙ БАНК "АЛЬФА-БАНК"',
'ALMNKZ' => 'АО "АТФБанк"',
'ASFBKZ' => 'АО "Банк "Астана-финанс"',
'ATYNKZ' => 'АО "ALTYN BANK"',
'BKCHKZ' => 'АО ДБ "БАНК КИТАЯ В КАЗАХСТАНЕ"',
'CASPKZ' => 'АО "KASPI BANK"',
'CEDUKZ' => 'АО "ЦЕНТРАЛЬНЫЙ ДЕПОЗИТАРИЙ ЦЕННЫХ БУМАГ"',
'CITIKZ' => 'АО "Ситибанк Казахстан"',
'DABNKZ' => 'АО "ДБ "Punjab National Bank" - Казахстан"',
'DEMIKZ' => 'АО "БанкПозитив Казахстан (ДБ Банка Апоалим Б.М.)"',
'DVKAKZ' => 'АО "Банк Развития Казахстана"',
'EABRKZ' => 'ЕВРАЗИЙСКИЙ БАНК РАЗВИТИЯ',
'EURIKZ' => 'АО "Евразийский Банк"',
'EXKAKZ' => 'АО "ЭКСИМБАНК КАЗАХСТАН"',
'FOBAKZ' => 'АО "ForteBank"',
'GCVPKZ' => 'РГКП Государственный центр по выплате пенсий',
'HCSKKZ' => 'АО "Жилстройсбербанк Казахстана"',
'HLALKZ' => 'АО "Исламский Банк "Al Hilal"',
'HSBCKZ' => 'ДБ АО "HSBC БАНК КАЗАХСТАН"',
'HSBKKZ' => 'АО "Народный Банк Казахстана"',
'ICBKKZ' => 'АО "Торгово-промышленный Банк Китая в г. Алматы"',
'INEARU' => 'г.Москва Межгосударственный Банк',
'INLMKZ' => 'ДБ АО "Банк Хоум Кредит"',
'IRTYKZ' => 'АО " Альянс Банк"',
'JSRBKZ' => 'АО "ТЕМIРБАНК"',
'KAZSKZ' => 'АО "Казинвестбанк"',
'KCJBKZ' => 'АО "Банк ЦентрКредит"',
'KICEKZ' => 'АО "Казахстанская фондовая биржа"',
'KINCKZ' => 'АО "Bank RBK"',
'KISCKZ' => 'РГП "Казахстанский центр межбанковских расчетов НБРК"',
'KKMFKZ' => 'ГУ "Комитет казначейства Министерства финансов РК"',
'KPSTKZ' => 'АО "КАЗПОЧТА"',
'KSNVKZ' => 'АО "Банк Kassa Nova"',
'KZIBKZ' => 'АО "ДБ "КАЗАХСТАН-ЗИРААТ ИНТЕРНЕШНЛ БАНК"',
'KZKOKZ' => 'АО "КАЗКОММЕРЦБАНК"',
'LARIKZ' => 'АО "AsiaCredit Bank (АзияКредит Банк)"',
'NBPAKZ' => 'АО ДБ "Национальный Банк Пакистана" в Казахстане',
'NBPFKZ' => '"Банк-кастодиан АО "ЕНПФ"',
'NBRKKZ' => 'Республиканское Государств Учреждение  Национальный Банк РК',
'NFBAKZ' => 'АО "Delta Bank"',
'NURSKZ' => 'АО "Нурбанк"',
'SABRKZ' => 'ДБ АО "Сбербанк"',
'SENIKZ' => 'АО "Qazaq Banki"',
'SHBKKZ' => 'АО "Шинхан Банк Казахстан"',
'TBKBKZ' => 'АО ДБ  "ТАИБ КАЗАХСКИЙ БАНК"',
'TSESKZ' => 'АО "Цеснабанк"',
'VTBAKZ' => 'ДО АО Банк ВТБ (Казахстан)',
'ZAJSKZ' => 'АО "Заман-Банк"'
);


function ochistka4txt($a, $nabor)
{

//$a  = str_replace("\\", "", $a);
//$a  = str_replace("\"", "", $a);
//$a  = str_replace("'", " ", $a);

switch($nabor)
{
 case 1: // толко латинские буквы
 $filter = 'abcdefghijklmnopqrstuvwxyz=2345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	break;
 case 2: // толко цифры
 $filter = '0123456789';
	break;
 case 3: // для емейла
 $filter = 'abcdefghijklmnopqrstuvwxyz=2345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ@_.-1';
	break;
 case 4: // телефон
 $filter = '0123456789+ ';
	break;
 case 5: // для пароля
 $filter = 'abcdefghijklmnopqrstuvwxyz=2345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ^+:;.,/-!@#\$*()][~?_%&><';
	break;

 case 6: // все, кроме одиночной кавычки
 $filter = 'ҚӘЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁІЇйцукенгшщзхъфывапролджэячсмитьбюёіїabcdefghijklmnopqrstuvwxyz= 2345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ^+:;.,/-!@#\$*()][~?_%&><\"';
	break;
 case 7: // толко IP
 $filter = '.0123456789';
	break;

 case 8: // kato-код
 $filter = '0123456789|-*';
	break;

 case 99: // толко латинские буквы
 $filter = 'ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁІЇйцукенгшщзхъфывапролджэячсмитьбюёіїabcdefghijklmnopqrstuvwxyz= 2345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ^+:;.,/-!@#\$*()][~?_%&><\"';
	break;
} // end switch

$j=strlen($a);

for($i=0; $i < $j; $i++)
{
 if (strstr($filter, "{$a[$i]}")) {$chisto = $chisto."{$a[$i]}";}

} // end for

return $chisto;

} // end function

function create_txterr($a)
{
  $b = array();
  $counts = count($a); if($counts<1) { return array(0, $b);}
  $counts = 41;
  for($i=1;$i<=$counts;$i++) 
  {
   //echo "i=$i<br>";
   if($a[$i]==1) {$b[$i] = 'errin';}
  } // edn for
  return array(1, $b);
  
} //create_txterr

function create_sign64($filetosign, $key, $keyp)
{
 global $cryptosoftsign;
 if(!file_exists($filetosign))
 { 
   echo "key file [$filetosign] not exist "; exit;
 }  // end if
 $outbox = tempnam( "$tmp", "DHPRMR" );
 $tmpbox = tempnam( "$tmp", "DHPRMR" );
 $comm = "/usr/bin/java -jar $cryptosoftsign signf $tmpbox $key $keyp $filetosign $outbox > $tmpbox";
// echo $comm; exit;
 $RR = system($comm);
 
 $a = file_get_contents($outbox);
 unlink($outbox);
 unlink($inbox);
 return base64_encode($a); 
} // end gosthash


function sendfile2_podpishi($podpishi_apilogin, $podpishi_apipass, $dogovorname, $uniq_reference, $pack_reference, $podpishi_BIN_owner, 
$podpishi_BIN_2partner, $delegate_type, $delegate_partneremail, $signpem, $file_4upload)
{

$postdata = array( 
'login' => $podpishi_apilogin,
'apikey' => $podpishi_apipass,
'nametxt' => $dogovorname,
'uniq_reference' => $uniq_reference,
'pack_reference' => $pack_reference,
'owner_bin' => $podpishi_BIN_owner,
'receiver_bin' => $podpishi_BIN_2partner,
'type_delegate' => $delegate_type,
'receiver_mail' => $delegate_partneremail,
'signature_pem' => $signpem, 
'uf' => "@".$file_4upload
);

//echo var_dump($postdata); exit;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://api.podpishi.kz/api.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
$answer = curl_exec($ch);
curl_close($ch);

return $answer;

} //  end sendfile2_podpishi

function send_command2podpishi($podpishi_apilogin, $podpishi_apipass, $command)
{
 $strxml = rawurlencode(base64_encode($command));
 $params = "command=$strxml&login=$podpishi_apilogin&apikey=$podpishi_apipass";
 //echo $params.'<br>';
 $httpurl = 'https://api.podpishi.kz/apistatus.php';

 $ch = curl_init(); 
 curl_setopt($ch, CURLOPT_URL, $httpurl); 
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $answer = curl_exec($ch);
 curl_close($ch); 
 return $answer;
} // end send_command2podpishi




?>
