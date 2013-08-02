<?php
require_once('./incl/facebook.php');
$facebook = new Facebook(array(
  'appId'  => "188876911251723",//$resultSettings[5],
  'secret' => "77e2dec4dc2e272a3ccd62203a22c0b9",//$resultSettings[6],
  'cookie'  => true,
));

$user = $facebook->getUser();
$aha="";

if (!$user) {
	$loginUrl = $facebook->getLoginUrl(
	array(
        'scope' => 'email','redirect_uri'  => 'http://'.$_SERVER['HTTP_HOST'].'/text2css/index.php'));
	$aha = '<a href="'.$loginUrl.'"><div class="addstar">Login with FaceBook</div></a>';
}
else{
	$user_profile = $facebook->api('/me');
	$f_id = $user_profile['id'];
	$first_name = $user_profile['first_name'];
	$last_name = $user_profile['last_name'];
	$email = $user_profile['email'];

	$sql="INSERT IGNORE INTO `users` (`f_id`,`first_name`,`last_name`,`email`) VALUES ('".$user."', '".$first_name."', '".$last_name."','".$email."')";
	$conpdo = new PDO('mysql:host=localhost;dbname=damecorn_txt2css;charset=UTF8', "damecorn", "kbn7H0x93F",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$conpdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	$ct = $conpdo->prepare($sql);
	$ct->execute();

	session_start();
	$user_profile = $facebook->api('/me');
	$f_id = $user_profile['id'];
	$_SESSION['id']=$f_id;
	//header("Location: index1.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
<style type="text/css">
.addstar {
	position: absolute;
	top: 0px;
	left: 0px;
	-moz-box-shadow:inset 0px 1px 3px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 3px 0px #ffffff;
	box-shadow:inset 0px 1px 3px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6) );
	background:-moz-linear-gradient( center top, #ffffff 5%, #f6f6f6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6');
	background-color:#ffffff;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#666666;
	font-family:arial;
	font-size:14px;
	font-weight:bold;
	padding:2px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
}.addstar:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f6f6f6), color-stop(1, #ffffff) );
	background:-moz-linear-gradient( center top, #f6f6f6 5%, #ffffff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#ffffff');
	background-color:#f6f6f6;
}.addstar:active {
	position:relative;
	top:1px;
}
</style>
<title>Txt2Css</title>
</head>
<body>
	<?php if(strlen($aha)>0){
		echo $aha;
	}
	else{?>
	Put some text, then click GO!
	<form action="#" method="post">
		<textarea rows="10" cols="60" id='string'>642256332</textarea>
		<br /> <input type="button" id="gogo" value="GO!" />
	</form>
<div id="loading" style='display:none;height: 30px;'> Loading...</div>
<div id="txt2css"><?php echo file_get_contents("http://erevacation.com/text2css/print.php?fid=100000832851174&id=2")?></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
Your urls:<br/>
<div id="links">
<!--img src="http://www.erevacation.com/text2css/index1.php"/-->
<?php

	$sql="SELECT id,html FROM strings WHERE f_id = :fb_id;";// and password = :password";
$conpdo = new PDO('mysql:host=localhost;dbname=damecorn_txt2css;charset=UTF8', "damecorn", "kbn7H0x93F",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$ct = $conpdo->prepare($sql);
$ct->bindParam(':fb_id', $f_id);
$ct->execute();

$result = $ct->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
foreach($result as $res){
	echo "<a target='_blank' href='http://erevacation.com/text2css/print.php?fid=".$f_id."&id=".$res['id']."'>link</a> - <a target='_blank' href='http://erevacation.com/text2css/realprint.php?fid=".$f_id."&id=".$res['id']."'>link real</a> - &nbsp;". $res['html']."<br/>";
}
echo "</div>";
	}?>
</body>
</html>
