<?php


$host = stristr(stristr($_SERVER['REQUEST_URI'] , strrchr($_SERVER['REQUEST_URI'] ,'/'), true), strrchr(stristr($_SERVER['REQUEST_URI'] , strrchr($_SERVER['REQUEST_URI'] ,'/'), true) ,'/'), true);
echo $link = 'https://'.$_SERVER['HTTP_HOST'].$host ;
$qr = 'http://api.qrserver.com/v1/create-qr-code/?data='.$link.'&size=150x150';
$code = '<center><img src="'.$qr.'"  </center>';
echo $code;
?>