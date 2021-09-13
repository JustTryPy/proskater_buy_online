<?php

$cryptosoftsign = 'signkz.jar';
//$cryptosoftsign = $siteroot.'/crypto/signkz.jar';
$mainkey = 'securestor/GOST.p12'; // ввести полный путь к ключу
$mainkeypass = '1234567890';
$podpishi_apilogin = 'xxxxxxxxxxx@xxxxxxxxx.xxx'; // указать логин для сервиса Подпиши.онлайн
$podpishi_apipass = '505875595488360fdd3d39a42880ff4'; // указать пароль API для сервиса Подпиши.онлайн
$PHP_SELF = $_SERVER["PHP_SELF"];

$mydata = array();
$mydata['firm'] = 'ТОО «Подпиши Онлайн»';
$mydata['bin'] = '151545656556';
$mydata['acc'] = 'KZ9999558885544488';
$mydata['swift'] = 'HSBKKZKX';
$mydata['bankname'] = 'ДБ "Халыкбанк"';
$mydata['adr'] = 'индекс 050000, г. Алматы, пр. Абая 1, офис 1';
$mydata['phone'] = '+7 999 777 77 77';
$mydata['email'] = 'thisok@emaill.kzz';
$mydata['fio'] = 'Петролло А.Б.';
$mydata['dolgnost'] = 'Директор';
$mydata['osnovanie'] = 'Устав';
$mydata['kbe'] = '17';
$mydata['knp'] = '851';



$verh = <<<BB
<!DOCTYPE html>
<html lang="ru" id='page-inside'>
<head>
    <meta charset='UTF-8'>

	<!-- <meta name='viewport' content='width=device-width, initial-scale=1.0'> -->
	<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1">

    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Подпиши.Онлайн http://podpishi.kz</title>


	<link href='/favicon.ico' type='image/x-icon' rel='shortcut icon'>
	<link href='/i/logo.svg' rel='image_src'>

	<link rel='apple-touch-icon' sizes='57x57' href='/apple-touch-icon-57x57.png?201710201637'>
	<link rel='apple-touch-icon' sizes='60x60' href='/apple-touch-icon-60x60.png?201710201637'>
	<link rel='apple-touch-icon' sizes='72x72' href='/apple-touch-icon-72x72.png?201710201637'>
	<link rel='apple-touch-icon' sizes='76x76' href='/apple-touch-icon-76x76.png?201710201637'>
	<link rel='apple-touch-icon' sizes='114x114' href='/apple-touch-icon-114x114.png?201710201637'>
	<link rel='apple-touch-icon' sizes='120x120' href='/apple-touch-icon-120x120.png?201710201637'>
	<link rel='apple-touch-icon' sizes='144x144' href='/apple-touch-icon-144x144.png?201710201637'>
	<link rel='apple-touch-icon' sizes='152x152' href='/apple-touch-icon-152x152.png?201710201637'>
	<link rel='apple-touch-icon' sizes='180x180' href='/apple-touch-icon-180x180.png?201710201637'>
	<link rel='apple-touch-icon' sizes='180x180' href='/apple-touch-icon.png?201710201637'>
	<link rel='icon' type='image/png' sizes='16x16' href='/favicon-16x16.png?201710201637'>
	<link rel='icon' type='image/png' sizes='32x32' href='/favicon-32x32.png?201710201637'>
	<link rel='icon' type='image/png' sizes='96x96' href='/favicon-96x96.png?201710201637'>
	<link rel='icon' type='image/png' sizes='194x194' href='/favicon-194x194.png?201710201637'>
	<link rel='icon' type='image/png' sizes='192x192' href='/android-chrome-192x192.png?201710201637'>
	<link rel='manifest' href='/manifest.json'>
	<link rel='mask-icon' href='/safari-pinned-tab.svg' color='#ce4239'>
	<meta name='apple-mobile-web-app-title' content='Подпиши.Онлайн'>
	<meta name='application-name' content='Подпиши.Онлайн'>
	<meta name='msapplication-TileColor' content='#fe5f55'>
	<meta name='msapplication-TileImage' content='/mstile-144x144.png?201710201637'>
	<meta name='theme-color' content='#1b2630'>
	<meta name='format-detection' content='telephone=no'>



	<link rel='stylesheet' type='text/css' href='styles8.css'>
	<link rel='stylesheet' type='text/css' href='jquery.confirm/jquery.confirm.css'>

	 
        	<!-- 22 -->


  <style type="text/css">
 .gra {
    padding: 3px; /* Поля вокруг содержимого таблицы */
    border: 1px solid maroon; /* Параметры рамки */
    text-align: left; /* Выравнивание по левому краю */
   }

  .errtable {color: red;}
  .err1 {color: red}
  .okd {color:green}
  .menufields {display:none;}

.fortext
{
    width: 800px; /* Ширина блока */
}

.fortext2
{
    width: 700px; /* Ширина блока */
}
.fortext3
{
    width: 800px; /* Ширина блока */
    text-align: justify;
}



.table4erraction
{
// border: 1px solid grey;
}

.tdzagolovok
{
 font-size:130%;
} 

.som { line-height: 1.0;}
.som2 {  line-height: 1.0; font-size: 150%;}


.mizer 
{
    line-height: 10px;
}

.lenfiles 
{
	width: 200px;
	min-width: 200px;
	max-width: 300px;
}

#layer, #modal {
    position: fixed;
    display: none;
}
#layer {
    top:0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.5);
    z-index: 5;
}
#modal {
    padding: 10px;
    top: 50%;
    left: 50%;
    z-index: 10;
    background: #dcdcdc;
    -webkit-border-radius: 10px;
       -moz-border-radius: 10px;
            border-radius: 10px;
}
iframe {
    width: 700px;
    height: 500px;
    border: none;
}


.fordogovor1 {
	text-decoration: underline;
}
.fordogovor2 {
	text-align: right;
}
.fordogovor3 {
	text-align: center;
}

.fordoccount {
	text-align: center;
	font-size:300%;
}

#errin {
border: 1px solid red;
box-shadow:  1px 1px 1px 0 red;
}

 .im7 {background: url(/img/sign_del.png); background-repeat: no-repeat; background-position: center;}
 .im8 {background: url(/img/sign_ok.png); background-repeat: no-repeat; background-position: center;}


.auto-style4 {
	text-align: left;
}
.auto-style5 {
	text-align: center;
}


.frame 
{
    overflow: scroll;
    width: 800px;
    height: 700px; 
}

td.mm0:hover {
border-top: 1px solid #FF0000;
border-bottom: 1px solid #FF0000;
border-left: 1px solid #FF0000;
border-right: 1px solid #FF0000;
} 
  </style>


	<!--[if IE]><link href='/css/ie.css' rel='stylesheet' type='text/css' media='screen'><![endif]-->

</head>
<body>

BB;

$niz = <<<BB


</body>
</html>

BB;


?>
