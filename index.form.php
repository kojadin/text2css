<?php
if(isset($_POST['string']) && strlen($_POST['string'])>0){
	include_once 'txt2css.php';
	include_once 'Encoding.php';
	$t2c = new Txt2Css();
	$string = $_POST['string'];
	/*$string="Alo bre,
još sam tu, 
i ću budem jači";
*/
	//$t2c->txtTocss(Encoding::toUTF8($string));
	$t2c->txtTocss($string);
}
?>
<html>
<head>
<title>Unesi text</title>
</head>
<body>
	<form action="#" method="post">
		<textarea rows="10" cols="60" name='string'></textarea><br/>
		<input type="submit" value="GO!" />
	</form>
</body>
</html>
