<?php
/*
 * @package    Podpishi.kz
 * @copyright  Copyright (C) 2017 - 2020 TOO Podpishi Online (tm).
 * @license    GNU General Public License version 2 or later
 * @help	support request to help-help@podpishi.kz
 */

require 'securestor/primerdogconf.php';
require 'primerdogfun.php';
$step = $_POST['step']+0;

echo $verh;

if($step==2)
{
 $command = $_POST['comm'];
 echo '<br>Запрос:<br> '.htmlentities($command);
 $answer = send_command2podpishi($podpishi_apilogin, $podpishi_apipass, $command);
 echo '<br>Ответ:<br> '.htmlentities($answer).'<p>';
 $xml = new SimpleXMLElement($answer);
 echo "<pre>\n";
 echo var_dump($xml);
 echo "\n</pre>";

} // end if



$command = <<<CCV
<data>
<oper>getlistdocs</oper>
<time1>20200201</time1>
<time2>20200419</time2>
<time></time>
</data>
CCV;


echo <<<TVS
<form method="POST" action="$PHP_SELF">
<input type="hidden" name="step" value="2">

    <center>
<p>Команда для отправки в Подпиши Онлайн</p>
<p><textarea rows="15" name="comm" cols="80">$command</textarea></p>
    </center>
	<div align=center>

<input type=submit value='Отправить команду в сервис' name=B1 class=knopka style=width:$stylewidth3></div>

</form>
TVS;

echo $niz;

?>
