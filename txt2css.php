<?php
class Txt2Css{
	private $random_arr;
	private $allowed = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789*-._!#$%^&()?";
	private $str;
	private $med_slo;
	private $pror;
	private $str_glo;
	public function txtTocss1($string){
		$lines=explode("\n", $string);
		$max_line=1;
		foreach ($lines as $lin){
			if(strlen($lin)>$max_line){
				$max_line=strlen($lin);
			}
		}
		$font_size = 5;
		$width=imagefontwidth($font_size)*$max_line+imagefontwidth($font_size);
		$height=imagefontheight($font_size)*count($lines)+imagefontheight($font_size);
		$im = imagecreate($width,$height);


		$chars = str_split($string);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$x=1;
		$y=0;
		$prored=imagefontheight($font_size);
		$medjslovima=imagefontwidth($font_size);
		foreach ($chars as $char){
			if($char=="\n" || $char=="\r" ){
				$pass++;
				$y=$y+$prored;
				$x=1;
				continue;
			}
			imagechar($im, $font_size, $x, $y, $char, $black);
			$x=$x+$medjslovima;
		}
		header('Content-type: image/png');
		imagepng($im);
	}
	public function txtTocssReal($string){
		$this->str_glo = $string;
		$this->str="";
		$temp = array();
		for($j=0;$j<strlen($string);$j++){
			$temp[]=$j;
		}
		if(count($temp)<3){
			$this->random_arr = $temp;
		}
		else if(count($temp)>14){
			$this->random_arr = array_rand($temp,round(strlen($string)/4));
		}
		else{
			$this->random_arr = array_rand($temp,round(strlen($string)/2));
		}
		//$string=utf8_decode($string);
		$lines=explode("\n", $string);
		$max_line=1;
		foreach ($lines as $lin){
			if(strlen($lin)>$max_line){
				$max_line=strlen($lin);
			}
		}
		$font_size = 5;
		$width=(imagefontwidth($font_size)+1)*$max_line+imagefontwidth($font_size);
		$height=imagefontheight($font_size)*count($lines);//+imagefontheight($font_size);
		$im = imagecreate($width,$height);


		$chars = $this->mb_str_split($string);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$x=1;
		$y=0;
		$prored=imagefontheight($font_size);
		$medjslovima=imagefontwidth($font_size);
		$this->med_slo = $medjslovima;
		$this->pror = $prored;
		$pass=0;
		foreach ($chars as $char){
			//$slovo_w=mb_strwidth($char);
			if($char=="\n" || $char=="\r" ){
				$pass++;
				$y=$y+$prored;
				$x=1;
				$this->str .= "\n";
				continue;
			}
			if(!in_array($pass, $this->random_arr)){
				$this->str .= $char;
				$x=$x+$medjslovima;
				$pass++;
				continue;
			}
			else if(strpos($this->allowed, $char)===false){
				if(utf8_decode($char)=="?"){
					$this->str .= $char;
				}
				else{
					$this->str .= utf8_decode($char);
				}
				$x=$x+$medjslovima;
				$pass++;
				continue;
			}
			else{
				$this->str .= " ";
			}
			$pass++;
			//$font = imageloadfont('./9917.ttf');
			imagechar($im, $font_size, $x, $y, $char, $black);
			$x=$x+$medjslovima;
		}
		//header('Content-type: image/png');
		//imagepng($im);
		$this->workReal($im,$width,$height);
	}

	public function txtTocssBezDB($string){
		$this->str_glo = $string;
		$this->str="";
		$temp = array();
		for($j=0;$j<strlen($string);$j++){
			$temp[]=$j;
		}
		if(count($temp)<3){
			$this->random_arr = $temp;
		}
		else if(count($temp)>14){
			$this->random_arr = array_rand($temp,round(strlen($string)/4));
		}
		else{
			$this->random_arr = array_rand($temp,round(strlen($string)/2));
		}
		//$string=utf8_decode($string);
		$lines=explode("\n", $string);
		$max_line=1;
		foreach ($lines as $lin){
			if(strlen($lin)>$max_line){
				$max_line=strlen($lin);
			}
		}
		$font_size = 5;
		$width=(imagefontwidth($font_size)+1)*$max_line+imagefontwidth($font_size);
		$height=imagefontheight($font_size)*count($lines);//+imagefontheight($font_size);
		$im = imagecreate($width,$height);


		$chars = $this->mb_str_split($string);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$x=1;
		$y=0;
		$prored=imagefontheight($font_size);
		$medjslovima=imagefontwidth($font_size);
		$this->med_slo = $medjslovima;
		$this->pror = $prored;
		$pass=0;
		foreach ($chars as $char){
			//$slovo_w=mb_strwidth($char);
			if($char=="\n" || $char=="\r" ){
				$pass++;
				$y=$y+$prored;
				$x=1;
				$this->str .= "\n";
				continue;
			}
			if(!in_array($pass, $this->random_arr)){
				$this->str .= $char;
				$x=$x+$medjslovima;
				$pass++;
				continue;
			}
			else if(strpos($this->allowed, $char)===false){
				if(utf8_decode($char)=="?"){
					$this->str .= $char;
				}
				else{
					$this->str .= utf8_decode($char);
				}
				$x=$x+$medjslovima;
				$pass++;
				continue;
			}
			else{
				$this->str .= " ";
			}
			$pass++;
			//$font = imageloadfont('./9917.ttf');
			imagechar($im, $font_size, $x, $y, $char, $black);
			$x=$x+$medjslovima;
		}
		//header('Content-type: image/png');
		//imagepng($im);
		$this->workReal($im,$width,$height);
	}


	public function txtTocss($string){
		$this->str_glo = $string;
		$this->str="";
		$temp = array();
		for($j=0;$j<strlen($string);$j++){
			$temp[]=$j;
		}
		if(count($temp)<3){
			$this->random_arr = $temp;
		}
		else if(count($temp)>14){
			$this->random_arr = array_rand($temp,round(strlen($string)/4));
		}
		else{
			$this->random_arr = array_rand($temp,round(strlen($string)/2));
		}
		//$string=utf8_decode($string);
		$lines=explode("\n", $string);
		$max_line=1;
		foreach ($lines as $lin){
			if(strlen($lin)>$max_line){
				$max_line=strlen($lin);
			}
		}
		$font_size = 5;
		$width=(imagefontwidth($font_size)+1)*$max_line+imagefontwidth($font_size);
		$height=imagefontheight($font_size)*count($lines);//+imagefontheight($font_size);
		$im = imagecreate($width,$height);


		$chars = $this->mb_str_split($string);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$x=1;
		$y=0;
		$prored=imagefontheight($font_size);
		$medjslovima=imagefontwidth($font_size);
		$this->med_slo = $medjslovima;
		$this->pror = $prored;
		$pass=0;
		foreach ($chars as $char){
			//$slovo_w=mb_strwidth($char);
			if($char=="\n" || $char=="\r" ){
				$pass++;
				$y=$y+$prored;
				$x=1;
				$this->str .= "\n";
				continue;
			}
			if(!in_array($pass, $this->random_arr)){
				$this->str .= $char;
				$x=$x+$medjslovima;
				$pass++;
				continue;
			}
			else if(strpos($this->allowed, $char)===false){
				if(utf8_decode($char)=="?"){
					$this->str .= $char;
				}
				else{
					$this->str .= utf8_decode($char);
				}
				$x=$x+$medjslovima;
				$pass++;
				continue;
			}
			else{
				$this->str .= " ";
			}
			$pass++;
			//$font = imageloadfont('./9917.ttf');
			imagechar($im, $font_size, $x, $y, $char, $black);
			$x=$x+$medjslovima;
		}
		//header('Content-type: image/png');
		//imagepng($im);
		$this->work($im,$width,$height);
	}
	function mb_str_split( $string ) {
		# Split at all position not after the start: ^
		# and not before the end: $
		return preg_split('/(?<!^)(?!$)/u', $string );
	}

	public function txtTocss2($string){
		//$string=utf8_decode($string);
		$lines=explode("\n", $string);
		$max_line=1;
		foreach ($lines as $lin){
			if(strlen($lin)>$max_line){
				$max_line=strlen($lin);
			}
		}
		$font_size = 4;
		$width=(imagefontwidth($font_size)+1)*$max_line+imagefontwidth($font_size);
		$height=imagefontheight($font_size)*count($lines);//+imagefontheight($font_size);
		$im = imagecreate($width,$height);


		$chars = str_split($string);
		$bg = imagecolorallocate($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		$x=1;
		$y=0;
		$prored=imagefontheight($font_size);
		$medjslovima=imagefontwidth($font_size);
		$this->med_slo = $medjslovima;
		//$font = imageloadfont('./Times New Roman.gdf');
		foreach ($chars as $char){
			if($char=="\n" || $char=="\r" ){
				$pass++;
				$y=$y+$prored;
				$x=1;
				$this->str .= "\n";
				continue;
			}
			imagechar($im, $font_size, $x, $y, $char, $black);
			$x=$x+$medjslovima;
		}
		//header('Content-type: image/png');
		//imagepng($im);
		$this->work($im,$width,$height);
	}

	public function workReal($im,$width,$height){
		//$im = imagecreatefrompng($img);
		echo "<span style='width:".$width."px;height:".$height."px;position:absolute;'>\n";
		//echo "<br/>";
		$left=0;
		$top=0;
		$slova = $this->mb_str_split($this->str);

		foreach ($slova as $s){
			if($s=="\n"){
				//echo "<br/>";
				$top+=$this->pror;
				$left=0;
				continue;
			}
			if($s==" "){
				$left+=$this->med_slo;
				continue;
			}
			//$izlaz.= "<span style='width:".$this->med_slo."px;position:absolute;font-size:16px;left:".$left."px;top:".$top."px;'>".$s."</span>\n";
			echo "<span style='width:".$this->med_slo."px;position:absolute;font-size:16px;z-index:100;left:".$left."px;top:".$top."px;'>".$s."</span>\n";
			$left+=$this->med_slo;
		}
		$broj=0;
		for($i=0;$i<$width;$i++){
			for($j=0;$j<$height;$j++){
				$rgb = imagecolorat($im, $i, $j);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				if($r<16){
					$rx="0".dechex($r);
				}
				else{
					$rx=dechex($r);
				}
				if($g<16){
					$gx="0".dechex($g);
				}
				else{
					$gx=dechex($g);
				}
				if($b<16){
					$bx="0".dechex($b);
				}
				else{
					$bx=dechex($b);
				}
				if($rx.$gx.$bx=="000000"){
					if($broj==20){
						$broj=0;
						$rx=dechex(rand(1, 128)+127);
						$gx=dechex(rand(1, 128)+127);
						$bx=dechex(rand(1, 128)+127);
						echo "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
						continue;
					}
					else{
						$broj++;
						continue;
					}
				}
				$osnova=rand(16, 64);
				$rx=dechex(rand($osnova, $osnova+5));
				$gx=dechex(rand($osnova, $osnova+5));
				$bx=dechex(rand($osnova, $osnova+5));
				//$izlaz .= "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
				echo "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
			}
		}
		//$izlaz .= "</span>";
		echo "</span>";
		//$err=$ct->errorInfo();
	}

	public function work($im,$width,$height){
		//$im = imagecreatefrompng($img);

		$izlaz="";
		$izlaz.="<span style='width:".$width."px;height:".$height."px;position:absolute;'>\n";
		echo "<span style='width:".$width."px;height:".$height."px;position:absolute;'>\n";
		//echo "<br/>";
		$left=0;
		$top=0;
		$slova = $this->mb_str_split($this->str);

		foreach ($slova as $s){
			if($s=="\n"){
				//echo "<br/>";
				$top+=$this->pror;
				$left=0;
				continue;
			}
			if($s==" "){
				$left+=$this->med_slo;
				continue;
			}
			$izlaz.= "<span style='width:".$this->med_slo."px;position:absolute;font-size:16px;left:".$left."px;top:".$top."px;'>".$s."</span>\n";
			echo "<span style='width:".$this->med_slo."px;position:absolute;font-size:16px;left:".$left."px;top:".$top."px;'>".$s."</span>\n";
			$left+=$this->med_slo;
		}
		for($i=0;$i<$width;$i++){
			for($j=0;$j<$height;$j++){
				$rgb = imagecolorat($im, $i, $j);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				if($r<16){
					$rx="0".dechex($r);
				}
				else{
					$rx=dechex($r);
				}
				if($g<16){
					$gx="0".dechex($g);
				}
				else{
					$gx=dechex($g);
				}
				if($b<16){
					$bx="0".dechex($b);
				}
				else{
					$bx=dechex($b);
				}
				if($rx.$gx.$bx=="000000"){
					if($broj==20){
						$broj=0;
						$rx=dechex(rand(1, 128)+127);
						$gx=dechex(rand(1, 128)+127);
						$bx=dechex(rand(1, 128)+127);
						$izlaz .= "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
						echo "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
						continue;
					}
					else{
						$broj++;
						continue;
					}
				}
				$osnova=rand(16, 64);
				$rx=dechex(rand($osnova, $osnova+5));
				$gx=dechex(rand($osnova, $osnova+5));
				$bx=dechex(rand($osnova, $osnova+5));
				$izlaz .= "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
				echo "<div style='width:1px;height:1px;position:absolute;left:".$i."px;top:".$j."px;background:#".$rx.$gx.$bx.";'></div>\n";
			}
		}
		$izlaz .= "</span>";
		echo "</span>";
		session_start();
		$f_id=$_SESSION['id'];
		//need to be changed, db table, user, name
		$conpdo = new PDO('mysql:host=localhost;dbname=baza_txt2css;charset=UTF8', "username", "password",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$sql = "INSERT INTO `strings` (`id`, `f_id`, `string`, `html`, `added_time`) VALUES (NULL, '".$f_id."', '".$this->str_glo."',:html, CURRENT_TIMESTAMP);";
		$conpdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$ct = $conpdo->prepare($sql);
		$ct->bindParam(':html', $izlaz);
		$ct->execute();
	}
	function writeToFile($stringData,$myFile){
		$fh = fopen($myFile, 'a') or die("can't open file");
		fwrite($fh, $stringData."\n");
		fclose($fh);

	}
}
if(isset($_POST['string']) && strlen($_POST['string'])>0){
	$t2c=new Txt2Css();
	if(isset($_POST['gogo'])){
		$t2c->txtTocssBezDB(stripslashes($_POST['string']));
	}
	else{
		$t2c->txtTocss(stripslashes($_POST['string']));
	}
}
?>
