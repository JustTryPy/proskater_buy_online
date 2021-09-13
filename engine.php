<?php
/*
 * @package    Podpishi.kz
 * @copyright  Copyright (C) 2017 - 2020 TOO Podpishi Online (tm).
 * @license    GNU General Public License version 2 or later
 * @help	support request to help-help@podpishi.kz
 */

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

session_start();
require 'securestor/primerdogconf.php';
require 'primerdogfun.php';

$step = $_POST['step']+0;

$bgcolor2 = '003399';
$bgcolor3 = 'ffffff';
$bgcolor1 = 'c6e1f9';

$tr = "<tr bgcolor=$bgcolor3><td class=txt>";
//if(empty($phone)){$phone = '+7 ';}

if(!empty($_POST['knopkaEdit']))
{
 $step = 0;
 $_POST = $_SESSION["lastPOST"];
} // end if

if(!empty($_POST['knopka2Agr']))
{
 $step = 3;
 $_POST = $_SESSION["lastPOST"];
} // end if

if(!empty($_POST['knopka2Agrmake']))
{
 $step = 4;
 $_POST = $_SESSION["lastPOST"];
} // end if

//$email = ochistka4txt($email, 3);
//  = ochistka4txt($_POST[''], 3);
// 1- fio, 2 - dolg2, 3- osnovanie, 4 - mfo, 5 - iban, 6- adr1, 7 - city, 8 - ind, 9 - phone
$errarr = array();

$usermail= trim($_POST['usermail']); $usermail = ochistka4txt($usermail, 3); if(strlen($usermail)<6) {$errarr[21]=1;}
$username = trim($_POST['username']); $username = ochistka4txt($username, 6); if(strlen($username)<3) {$errarr[22]=1;}
$userbin = trim($_POST['userbin']); $userbin = ochistka4txt($userbin, 3); if(strlen($userbin)<3) {$errarr[23]=1;}

$fio = trim($_POST['fio']); $fio  = ochistka4txt($fio, 6); if(strlen($fio)<3) {$errarr[1]=1;}
$dolgnost2 = trim($_POST['dolgnost2']); $dolgnost2 = ochistka4txt($dolgnost2, 6); if(strlen($dolgnost2)<8) {$errarr[2]=1;}
$osnovanie = trim($_POST['osnovanie']); $osnovanie = ochistka4txt($osnovanie, 6); if(strlen($osnovanie)<5) {$errarr[3]=1;}
$mfo = ochistka4txt($_POST['mfo'], 3); $aswift = substr($mfo, 0, 6); $bankname = $banklistkz[$aswift]; if(empty($bankname)) {$errarr[4]=1;}
$acc  = ochistka4txt($_POST['acc'], 1); if(empty($acc)) {$errarr[5]=1;}
$adr1 = trim($_POST['adr1']); $adr1 = ochistka4txt($adr1, 6); if(strlen($adr1)<5) {$errarr[6]=1;}
$adr2 = trim($_POST['adr2']); $adr2 = ochistka4txt($adr2, 6);
$city = trim($_POST['city']); $city = ochistka4txt($city, 6); if(strlen($city)<3) {$errarr[7]=1;}
$ind = ochistka4txt($_POST['ind'], 2); if(strlen($ind)!=6) {$errarr[8]=1;}
$phone = ochistka4txt($_POST['phone'], 4); if(strlen($phone)<12) {$errarr[9]=1;}

list($flag_inputerr, $iferr) = create_txterr($errarr);
if($flag_inputerr==1) 
{
 $step=0;
 $txtinputerr = "<span class='err1'>ПРИ ОБРАБОТКЕ ФОРМЕ ДОПУЩЕНЫ ОШИБКИ</span>";
} // end if

if($_SESSION["kolya"]==0) {$txtinputerr='';}

//if(!empty($_POST['knopkaNext'])){ $tomake = 1;} // end if

// номер договора с клиентом
$nomerdogovora = 5;
// дата договора
$dogdate1 = date("d.m.Y");

$podpishi_BIN_owner = $mydata['bin']; // БИН/ИИН владельца логина в Подпиши.онлайн, если в аккаунтенесколько предприятий.

$signpem = rawurlencode($signpem);

 switch($step)
 {
  case 4:
	
        $telo = file_get_contents('primerdogtelo.html');
	require 'primerdogshablon.php';
	$telo = str_replace('<body>', '<body>'.'<div class="fortext">'.$dogverh, $telo);
	$telo = str_replace('</body>', $dogpodval.'</div></body>', $telo);
	$file_4upload = 'dog_'.$nomerdogovora.'_'.$dogdate1.'__'.date("U").'.html';
	file_put_contents($file_4upload, $telo);
	chmod($outbox, 0644);

	$dogovorname = "Договор No. $nomerdogovora от $dogdate1 ТОО Подпиши Онлайн - $username.html";
	$signpem = create_sign64($file_4upload, $mainkey, $mainkeypass);

//	echo 'PEM: '.$signpem.'<br/>'; exit;

	$uniq_reference = $nomerdogovora.'_'.date("U");
	$pack_reference = 1; // 1 - договора, 2 - счет-фактура, 3 - акт выполненных работ, 4 - акт сверки, 5 - письмо клиенту
	$podpishi_BIN_2partner = $userbin;
	$delegate_partneremail = $usermail;
	$type_4delegate = 1; // требует подписи партнера, 2 - только ознакомление с документом (для счетов-фактур)


	$answer = sendfile2_podpishi($podpishi_apilogin, $podpishi_apipass, $dogovorname, $uniq_reference, $pack_reference, $podpishi_BIN_owner, 
$podpishi_BIN_2partner, $type_4delegate, $delegate_partneremail, $signpem, $file_4upload);

         $res = strpos($answer, 'err="no"');

	 if($res<6) {$errn1 = "<p><span class='err1'>Ошибка добавления подписи ЭЦП в документ $dogovorname</span></p>";}


	 $invoice_dogname = "Договор No. $nomerdogovora от $dogdate1";
	 $naimenovanie = 'Всякие услуги не отходя от кассы и из квартиры';
	 $pokupatel = "$username, $ind, г. $city, $adr1";
	 $totalsumma = '1000';
	 $price = '1000';
	 $invoice_info = "Предоплата за услуги, $naimenovanie, $totalsumma";
	 $invoice_num = 14;
	 $invoice_datetxt = date("d.m.Y");

	 require 'primerinvshablon.php';

	 $file_4upload = 'inv_'.$invoice_num.'_'.$invoice_datetxt.'__'.date("U").'.html';
	 file_put_contents($file_4upload, $telo_invoice);
	 chmod($outbox, 0644);
	 $dogovorname = "Счет на оплату No. $invoice_num от $invoice_datetxt ТОО Подпиши Онлайн - $username.html";

	$uniq_reference = $invoice_num.'_'.date("U");
	$pack_reference = 2; // 1 - договора, 2 - счет-фактура, 3 - акт выполненных работ, 4 - акт сверки, 5 - письмо клиенту
	$type_4delegate = 2; // НЕ требует подписи партнера

	$signpem = create_sign64($file_4upload, $mainkey, $mainkeypass);

	$answer = sendfile2_podpishi($podpishi_apilogin, $podpishi_apipass, $dogovorname, $uniq_reference, $pack_reference, $podpishi_BIN_owner, 
$podpishi_BIN_2partner, $type_4delegate, $delegate_partneremail, $signpem, $file_4upload);
         $result = strpos($answer, 'err="no"');
	 if($result<6) {$errn2 = "<p><span class='err1'>Ошибка добавления подписи ЭЦП в документ $dogovorname</span></p>";}


	echo <<<POO
	$verh
	<p>Через сервис "Подпиши Онлайн" в ваш адрес был отправлен договор и счет на оплату, подписанные с помощью ЭЦП.</p>
	$errn1	
	$errn2
	<p></p>
	$niz
POO;
	exit;

	break; // step 4 move 40

  case 3:


	require 'primerdogshablon.php';

	$editbutton = '<input type="submit" class=knopka value="Редактировать" name="knopkaEdit" >';
	$nextknopka = '<input type="submit" class=knopka value="СФОРМИРОВАТЬ ДОГОВОР" name="knopka2Agrmake">';

	$all = <<<ALL
	<div class='fortext'>

	<FORM action="$PHP_SELF" method="POST" name='foragreement'>
	<input type='hidden' name='step' value="4">

	<p> Проверьте правильность внесенных данных и ознакомьтесь с Договором. Если все данные верны - нажмите
	на кнопку внизу "Сформировать договор" - после этого в разделе "ДОКУМЕНТЫ" появится договор на подпись,
	который необходимо  подписать с помощью ЭЦП.<p>

	$dogverh
	<iframe name = "myframe" width = "100%" height="200px" src = "primerdogtelo.html"></iframe><br />
	$dogpodval

	<table cellspacing=1 cellpadding=5 border=0 width="70%">
	<tr bgcolor=$bgcolor3>
	<td width="45%">$editbutton</td><td>$nextknopka</td>
	</tr>
	</table>


	</form>         
	</div>

ALL;

 	echo $verh.$all.$niz;
	exit;
	break; // case step 3 move 40

  case 2:

$_SESSION["lastPOST"]=$_POST;
$_SESSION["kolya"]=1;

//echo myprint($_POST);

$stroki = <<<S5ST
$tr Контактный email</td><td>$usermail</td></tr>
$tr Полное название организации</td><td>$username</td></tr>
$tr БИН организации или ИИН предпринимателя</td><td>$userbin</td></tr>
$tr*Фамилия, имя, отчество подписывающего договор</td><td>$fio</td></tr>
$tr*Должность подписывающего договор</td><td>$dolgnost2</td></tr>
$tr* На основании какого документа действует</td><td>$osnovanie</td></tr>
$tr*БИК Банка</td><td>$mfo</td></tr>
$tr*Название банка</td><td>$bankname</td></tr>
$tr*Расчетный счет(IBAN)</td><td>$acc</td></tr>
$tr*Адрес(юр)  - строка 1</td><td>$adr1</td></tr>
$tr Адрес(юр) - строка 2</td><td>$adr2</td></tr>
$tr*Город</td><td>$city</td></tr>
$tr Страна</td><td>Республика Казахстан</td></tr>
$tr*Почтовый индекс</td><td>$ind</td></tr>
$tr*Телефон</td><td>$phone</td></tr>
S5ST;

	$nextstep=3;
	$tabname = 'Проверьте введенные данные:';
	$tabname2 = '<span class="err1">При обнаружении ошибки нажмите на кнопку "Редактировать"</span>';
	$editbutton = '<input type="submit" class=knopka value="Редактировать" name="knopkaEdit">';
	$nextknopka = '<input type="submit" class=knopka value="Продолжить" name="knopka2Agr">';
	break;
  default:

//$lt = "class=frmtxt type=\"text\"";
$lt = "type=\"text\"";


$stroki = <<<S5ST
$tr*Контактный email</td><td><input $lt id="{$iferr[21]}" name="usermail" size=40 maxLength="60" value="$usermail"></td></tr>
$tr*Полное название организации</td><td><input $lt id="{$iferr[22]}" name="username" size=40 maxLength="60" value="$username"></td></tr>
$tr*БИН организации или ИИН предпринимателя</td><td><input $lt id="{$iferr[23]}" name="userbin" size=40 maxLength="60" value="$userbin"></td></tr>
$tr*Фамилия, имя, отчество подписывающего договор</td><td><input $lt id="{$iferr[1]}" name="fio" size=60 maxLength="40" value="$fio"></td></tr>
$tr*Должность подписывающего договор</td><td><input $lt id="{$iferr[2]}" name="dolgnost2" size=40 maxLength="50" value="$dolgnost2" placeholder="директор, Председатель правления"></td></tr>
$tr* Название документа, на основании  которого действует подписант</td><td><input $lt id="{$iferr[3]}" name="osnovanie" size=40 maxLength="80" value="$osnovanie" placeholder="Устав, Доверенность No. от ../../20.."></td></tr>
$tr*БИК Банка</td><td><input $lt id="{$iferr[4]}" name="mfo" size=40 maxLength="15" value="$mfo"></td></tr>
$tr*Расчетный счет(IBAN)</td><td><input $lt id="{$iferr[5]}" name="acc" size=40 maxLength="20" value="$acc" placeholder="KZ999988887777665555"></td></tr>
$tr*Адрес(юр)  - строка 1</td><td><input $lt id="{$iferr[6]}" name="adr1" size=40 maxLength="80" value="$adr1"></td></tr>
$tr Адрес(юр) - строка 2</td><td><input $lt name="adr2" size=40 maxLength="80" value="$adr2"></td></tr>
$tr*Город</td><td><input $lt id="{$iferr[7]}" name="city" size=40 maxLength="50" value="$city"></td></tr>
$tr Страна</td><td>Республика Казахстан</td></tr>
$tr*Почтовый индекс</td><td><input $lt id="{$iferr[8]}" name="ind" size=40 maxLength="20" value="$ind" placeholder="000000"></td></tr>
$tr*Телефон</td><td><input $lt id="{$iferr[9]}" name="phone" size=40 maxLength="20" value="$phone" placeholder="+7 XXXyyyzzuu"></td></tr>
S5ST;
	$nextmove = 40;
	$nextstep=2;
	$tabname = 'Для оформления договора заполните пожалуйста поля:';
	$tabname2 = "<span class='err1'>* - обязательные поля</span>";
	$nextknopka = '<input type="submit" class=knopka value="Продолжить" name="knopkaNext">';
	break;
 } // end switch step move 40
                        
$detali = <<<D3TL
<FORM action="$PHP_SELF" method="POST" name='foragreement'>
<input type='hidden' name='step' value="$nextstep">
$tarifline


$txtinputerr

<table bgcolor=$bgcolor2 cellspacing=1 cellpadding=5 border=0 width="70%">
<tr bgcolor=$bgcolor3>
<td colspan=2><p>$tabname</td></tr>
<tr bgcolor=$bgcolor3>
<td width="45%"></td><td>$tabname2</td></tr>
$stroki
<tr bgcolor=$bgcolor3>

<tr bgcolor=$bgcolor1>
      <td colspan="2" align=center>
$editbutton $nextknopka
</td>
</tr>
</table>
</form>         

<p></p>
D3TL;

  echo $verh.$detali.$niz;


?>
