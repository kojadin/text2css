<?php
session_start();
$sql="SELECT id,html FROM strings WHERE f_id = :fb_id;";// and password = :password";
$conpdo = new PDO('mysql:host=localhost;dbname=damecorn_txt2css;charset=UTF8', "damecorn", "kbn7H0x93F",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$ct = $conpdo->prepare($sql);
$ct->bindParam(':fb_id', $_SESSION['id']);
$ct->execute();

$result = $ct->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
foreach($result as $res){
	echo "<a target='_blank' href='http://erevacation.com/text2css/print.php?fid=".$_SESSION['id']."&id=".$res['id']."'>link</a> - <a target='_blank' href='http://erevacation.com/text2css/realprint.php?fid=".$_SESSION['id']."&id=".$res['id']."'>link real</a> - &nbsp;". $res['html']."<br/>";
}
?>