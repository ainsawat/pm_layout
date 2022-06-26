<?php
$ServerName = '10.144.130.34';
$port = '3306';
$server = $ServerName . ':' . $port;
$uName = 'stwhost';
$uPass = 'stwhost';
$database = 'pm';
$database1 = 'mttr';
$CHAR_SET = 'charset=utf8'; // เช็ตให้อ่านภาษาไทยได้

try{
		$db = new PDO('mysql:host='.$ServerName.';dbname='.$database.';'.$CHAR_SET,$uName,$uPass);
} catch (PDOException $e) {

			die( "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : ".$e->getMessage());

}	


?>
