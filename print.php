<?php
$sql="SELECT html FROM strings WHERE f_id = :fb_id and id = :id LIMIT 1;";// and password = :password";
$conpdo = new PDO('mysql:host=localhost;dbname=damecorn_txt2css;charset=UTF8', "damecorn", "kbn7H0x93F",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$ct = $conpdo->prepare($sql);
$ct->bindParam(':fb_id', $_GET['fid']);
$ct->bindParam(':id', $_GET['id']);
$ct->execute();

$result = $ct->fetch(PDO::FETCH_ASSOC);

if($result!=null){
	echo $result['html'];
}
else{
	echo "dummy";
}
?>