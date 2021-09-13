<?php
/*
 * @package    Podpishi.kz
 * @copyright  Copyright (C) 2017 - 2020 TOO Podpishi Online (tm).
 * @license    GNU General Public License version 2 or later
 * @help	support request to help-help@podpishi.kz
 */



$dogverh = <<<DGV
<p class="fordogovor3">Договор на поставку товара/оказание услуг No. <span class="fordogovor1"><strong>$nomerdogovora</strong></span><br /></p>
<p>
<table style="width: 100%">
	<tr>
		<td>г. Алматы</td>
		<td class="fordogovor2">$dogdate1</td>
	</tr>
</table>
<p>Настоящий Договор заключен между двумя Сторонами, зарегистрированными в 
соответствии с законодательством Республики Казахстан, именуемые в дальнейшем 
<strong>«ИСПОЛНИТЕЛЬ»</strong> и <strong>«ЗАКАЗЧИК»</strong>:<br />
<span class="fordogovor1"><strong>Сторона 1</strong></span>, <br />
именуемая в дальнейшем «ИСПОЛНИТЕЛЬ»: <span class="fordogovor1"><strong>{$mydata['firm']}</strong></span><br />
Представитель ИСПОЛНИТЕЛЯ:<strong> {$mydata['dolgnost']} <span class="fordogovor1">{$mydata['fio']}</span></strong><br />
Документ, на основании которого действует Представитель ИСПОЛНИТЕЛЯ:
<span class="fordogovor1"><strong>{$mydata['osnovanie']}</strong></span>,<br />
с одной стороны, и<br />
<span class="fordogovor1"><strong>Сторона 2</strong></span>, <br />
именуемая в дальнейшем «ЗАКАЗЧИК»: <span class="fordogovor1"><strong>
$username</strong></span><br />
Представитель ЗАКАЗЧИКА: <span class="fordogovor1"><strong>
$dolgnost2 $fio</strong></span><br />
Документ, на основании которого действует Представитель ЗАКАЗЧИКА:
<span class="fordogovor1"><strong>$osnovanie</strong></span><br />
заключили настоящий Договор на поставку товара/оказание услуг (далее по тексту - 
Договор) о нижеследующем:<br />
DGV;

if(!empty($adr2)) {$adr1 = $adr1.', '.$adr2;}

         
$dogpodval = <<<DGV
11. ЮРИДИЧЕСКИЕ АДРЕСА И БАНКОВСКИЕ РЕКВИЗИТЫ СТОРОН<br />
</p>
<table style="width: 100%">
	<tr>
		<td width="50%"><b>ИСПОЛНИТЕЛЬ</b><br />
		{$mydata['firm']}<br />
		БИН {$mydata['bin']}<br />
		IBAN {$mydata['acc']}<br />
		БИК {$mydata['swift']}<br />
		{$mydata['bankname']}<br />
		{$mydata['adr']}<br />
		Тел. {$mydata['phone']}<br />
		email {$mydata['email']} <br />
		<br />
		{$mydata['dolgnost']} _____________ {$mydata['fio']} </td>

		<td width="50%"><b>ЗАКАЗЧИК</b> <br />
		$username<br />
		БИН/ИИН $userbin<br />
		IBAN $acc<br />
		БИК $mfo<br />
		$bankname<br />
		индекс $ind, г. $city, $adr1<br />
		Тел. $phone<br />
		email $usermail <br />
		<br />
		$dolgnost2 _____________ $fio</td>
	</tr>
</table>
<p><br />
DGV;


?>
