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
	Put some text, then click GO!
	<form action="#" method="post">
		<textarea rows="10" cols="60" id='string'>642256332</textarea>
		<br /> <input type="button" id="gogogo" value="GO!" />
	</form>
<div id="loading" style='display:none;height: 30px;'> Loading...</div>
<div id="txt2css"><?php //echo file_get_contents("http://erevacation.com/text2css/realprint.php?fid=100001243880604&id=11")?></div>
<br/><br/><br/><br/><br/><br/>
Code:
<div id='kod'></div>
</body>
</html>
