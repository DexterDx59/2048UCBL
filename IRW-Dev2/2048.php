<?php

?>
<?php 


function html_tile($tileid){
	$string = "";
	$tilevalue = $_GET[$tileid];
	if($tilevalue==0){
		return $string;
	}else{
		if($tilevalue <= 2048){
			$string = '<div class="tile_'.$tilevalue.'"><br/>'.$tilevalue.'</div>';
			return $string;
		}
		else{
			$string = '<div class="tile_max"><br/>'.$tilevalue.'</div>';
			return $string;
		}
	}
}

function gettiles(){
	$string = "c11=".$_GET["c11"]."&c12=".$_GET["c12"]."&c13=".$_GET["c13"]."&c14=".$_GET["c14"]."&c21=".$_GET["c21"]."&c22=".$_GET["c22"]."&c23=".$_GET["c23"]."&c24=".$_GET["c24"]."&c31=".$_GET["c31"]."&c32=".$_GET["c32"]."&c33=".$_GET["c33"]."&c34=".$_GET["c34"]."&c41=".$_GET["c41"]."&c42=".$_GET["c42"]."&c43=".$_GET["c43"]."&c44=".$_GET["c44"]."" ;
	return $string;
}

function line_move($v1,$v2,$v3,$v4){
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}

	if( $v4 == $v3 ){
		$v4 = $v4 * 2 ;
		$v3 = 0 ;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}

	if( $v3 == $v2 ){
		$v3 = $v3 * 2 ;
		$v2 = 0 ;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}
	
	if( $v2 == $v1 ){
		$v2 = $v2 * 2 ;
		$v1 = 0 ;
	}
	$ret = [ 1 => $v1 , 2 => $v2 , 3 => $v3 , 4 => $v4 ] ;
	return $ret ;
}

function getmoveresult($direction){
	$result = "";
	if($direction == 1){
		$a1 = line_move($_GET["c41"],$_GET["c31"],$_GET["c21"],$_GET["c11"]) ;
		$a2 = line_move($_GET["c42"],$_GET["c32"],$_GET["c22"],$_GET["c12"]) ;
		$a3 = line_move($_GET["c43"],$_GET["c33"],$_GET["c23"],$_GET["c13"]) ;
		$a4 = line_move($_GET["c44"],$_GET["c34"],$_GET["c24"],$_GET["c14"]) ;
		$result = "c11=".$a1[4]."&c12=".$a2[4]."&c13=".$a3[4]."&c14=".$a4[4]."&c21=".$a1[3]."&c22=".$a2[3]."&c23=".$a3[3]."&c24=".$a4[3]."&c31=".$a1[2]."&c32=".$a2[2]."&c33=".$a3[2]."&c34=".$a4[2]."&c41=".$a1[1]."&c42=".$a2[1]."&c43=".$a3[1]."&c44=".$a4[1] ;
		return $result ;
	}
	if($direction == 2){
		$a1 = line_move($_GET["c11"],$_GET["c12"],$_GET["c13"],$_GET["c14"]) ;
		$a2 = line_move($_GET["c21"],$_GET["c22"],$_GET["c23"],$_GET["c24"]) ;
		$a3 = line_move($_GET["c31"],$_GET["c32"],$_GET["c33"],$_GET["c34"]) ;
		$a4 = line_move($_GET["c41"],$_GET["c42"],$_GET["c43"],$_GET["c44"]) ;
		$result = "c11=".$a1[1]."&c12=".$a1[2]."&c13=".$a1[3]."&c14=".$a1[4]."&c21=".$a2[1]."&c22=".$a2[2]."&c23=".$a2[3]."&c24=".$a2[4]."&c31=".$a3[1]."&c32=".$a3[2]."&c33=".$a3[3]."&c34=".$a3[4]."&c41=".$a4[1]."&c42=".$a4[2]."&c43=".$a4[3]."&c44=".$a4[4] ;
		return $result ;
	}
	if($direction == 3){
		$a1 = line_move($_GET["c11"],$_GET["c21"],$_GET["c31"],$_GET["c41"]) ;
		$a2 = line_move($_GET["c12"],$_GET["c22"],$_GET["c32"],$_GET["c42"]) ;
		$a3 = line_move($_GET["c13"],$_GET["c23"],$_GET["c33"],$_GET["c43"]) ;
		$a4 = line_move($_GET["c14"],$_GET["c24"],$_GET["c34"],$_GET["c44"]) ;
		$result = "c11=".$a1[1]."&c12=".$a2[1]."&c13=".$a3[1]."&c14=".$a4[1]."&c21=".$a1[2]."&c22=".$a2[2]."&c23=".$a3[2]."&c24=".$a4[2]."&c31=".$a1[3]."&c32=".$a2[3]."&c33=".$a3[3]."&c34=".$a4[3]."&c41=".$a1[4]."&c42=".$a2[4]."&c43=".$a3[4]."&c44=".$a4[4] ;
		return $result ;
	}
	if($direction == 4){
		$a1 = line_move($_GET["c14"],$_GET["c13"],$_GET["c12"],$_GET["c11"]) ;
		$a2 = line_move($_GET["c24"],$_GET["c23"],$_GET["c22"],$_GET["c21"]) ;
		$a3 = line_move($_GET["c34"],$_GET["c33"],$_GET["c32"],$_GET["c31"]) ;
		$a4 = line_move($_GET["c44"],$_GET["c43"],$_GET["c42"],$_GET["c41"]) ;
		$result = "c11=".$a1[4]."&c12=".$a1[3]."&c13=".$a1[2]."&c14=".$a1[1]."&c21=".$a2[4]."&c22=".$a2[3]."&c23=".$a2[2]."&c24=".$a2[1]."&c31=".$a3[4]."&c32=".$a3[3]."&c33=".$a3[2]."&c34=".$a3[1]."&c41=".$a4[4]."&c42=".$a4[3]."&c43=".$a4[2]."&c44=".$a4[1] ;
		return $result ;
	}
	return $result;
}

function addrandtile(){
	$test = hasvoid() ;
	while($test){
		$x = rand(1,4) ;
		$y = rand(1,4) ;
		if ($_GET["c".$x.$y] == 0) {
			$newtilevalue = 2 * rand(1,2) ;
			$test = false;
			$returnurl = gentileget($newtilevalue,$x,$y,11)."&".gentileget($newtilevalue,$x,$y,12)."&".gentileget($newtilevalue,$x,$y,13)."&".gentileget($newtilevalue,$x,$y,14)."&" ;
			$returnurl = $returnurl.gentileget($newtilevalue,$x,$y,21)."&".gentileget($newtilevalue,$x,$y,22)."&".gentileget($newtilevalue,$x,$y,23)."&".gentileget($newtilevalue,$x,$y,24)."&" ;
			$returnurl = $returnurl.gentileget($newtilevalue,$x,$y,31)."&".gentileget($newtilevalue,$x,$y,32)."&".gentileget($newtilevalue,$x,$y,33)."&".gentileget($newtilevalue,$x,$y,34)."&" ;
			$returnurl = $returnurl.gentileget($newtilevalue,$x,$y,41)."&".gentileget($newtilevalue,$x,$y,42)."&".gentileget($newtilevalue,$x,$y,43)."&".gentileget($newtilevalue,$x,$y,44) ;
			return $returnurl ;
		}
	}
	return (gettiles());
}

function gentileget ($tv,$sx,$sy,$tile_sid) {
	if("c".$sx.$sy == "c".$tile_sid){
				return "c".$tile_sid."=".$tv ;
			} else {
				return "c".$tile_sid."=".$_GET["c".$tile_sid];
			}
}

function canplay(){
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<=4;$for_2++){
			if ($_GET["c".$for_1.$for_2] == 0){
				return true;
			}
		}
	}
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<=3;$for_2++){
			if($_GET["c".$for_1.$for_2] == $_GET["c".$for_1.($for_2 + 1)]){
				return true ;
			}
		}
	}
	for($for_1=1;$for_1<=3;$for_1++){
		for($for_2=1;$for_2<=4;$for_2++){
			if($_GET["c".$for_1.$for_2] == $_GET["c".($for_1 + 1).$for_2]){
				return true ;
			}
		}
	}
	return false;
}

function randomstart(){
	$randomstart = rand(1,10) ;
	if( $randomstart == 1 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=0&c21=2&c22=0&c23=0&c24=0&c31=0&c32=0&c33=2&c34=0&c41=0&c42=0&c43=0&c44=0" ;
	}
	if( $randomstart == 2 ){
		return "Location:2048.php?score=0&c11=2&c12=0&c13=0&c14=0&c21=0&c22=2&c23=0&c24=0&c31=0&c32=0&c33=0&c34=0&c41=0&c42=0&c43=0&c44=0" ;
	}
	if( $randomstart == 3 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=0&c21=0&c22=0&c23=0&c24=0&c31=0&c32=0&c33=0&c34=0&c41=0&c42=2&c43=0&c44=4" ;
	}
	if( $randomstart == 4 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=0&c21=0&c22=2&c23=4&c24=0&c31=0&c32=0&c33=0&c34=0&c41=0&c42=0&c43=0&c44=0" ;
	}
	if( $randomstart == 5 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=2&c21=0&c22=0&c23=0&c24=0&c31=0&c32=0&c33=4&c34=0&c41=0&c42=0&c43=0&c44=0" ;
	}
	if( $randomstart == 6 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=2&c14=0&c21=0&c22=0&c23=2&c24=0&c31=0&c32=0&c33=0&c34=0&c41=0&c42=0&c43=0&c44=0" ;
	}
	if( $randomstart == 7 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=0&c21=0&c22=0&c23=4&c24=0&c31=0&c32=0&c33=0&c34=0&c41=0&c42=4&c43=0&c44=0" ;
	}
	if( $randomstart == 8 ){
		return "Location:2048.php?score=0&c11=2&c12=0&c13=0&c14=0&c21=0&c22=2&c23=0&c24=4&c31=0&c32=0&c33=0&c34=0&c41=0&c42=0&c43=2&c44=0" ;
	}
	if( $randomstart == 9 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=2&c21=0&c22=0&c23=0&c24=2&c31=0&c32=2&c33=0&c34=0&c41=0&c42=0&c43=0&c44=0" ;
	}
	if( $randomstart == 10 ){
		return "Location:2048.php?score=0&c11=0&c12=0&c13=0&c14=0&c21=0&c22=0&c23=0&c24=0&c31=0&c32=0&c33=2&c34=2&c41=0&c42=0&c43=0&c44=0" ;
	}
}

function haswon(){
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<=4;$for_2++){
			if ($_GET["c".$for_1.$for_2] >= 2048 ){
				return true;
			}
		}
	}
	return false;
}

function hasvoid(){
	for($for_1=1;$for_1<=4;$for_1++){
		for($for_2=1;$for_2<=4;$for_2++){
			if ($_GET["c".$for_1.$for_2] == 0){
				return true;
			}
		}
	}
	return false;
}

function getmovedscore( $direction ){ 
	if($direction == 1){
		$a1 = lm_score($_GET["c41"],$_GET["c31"],$_GET["c21"],$_GET["c11"]) ;
		$a2 = lm_score($_GET["c42"],$_GET["c32"],$_GET["c22"],$_GET["c12"]) ;
		$a3 = lm_score($_GET["c43"],$_GET["c33"],$_GET["c23"],$_GET["c13"]) ;
		$a4 = lm_score($_GET["c44"],$_GET["c34"],$_GET["c24"],$_GET["c14"]) ;
		return $_GET["score"] + $a1 + $a2 + $a3 + $a4 ;
	}
	if($direction == 2){
		$a1 = lm_score($_GET["c11"],$_GET["c12"],$_GET["c13"],$_GET["c14"]) ;
		$a2 = lm_score($_GET["c21"],$_GET["c22"],$_GET["c23"],$_GET["c24"]) ;
		$a3 = lm_score($_GET["c31"],$_GET["c32"],$_GET["c33"],$_GET["c34"]) ;
		$a4 = lm_score($_GET["c41"],$_GET["c42"],$_GET["c43"],$_GET["c44"]) ;
		return $_GET["score"] + $a1 + $a2 + $a3 + $a4 ;
	}
	if($direction == 3){
		$a1 = lm_score($_GET["c11"],$_GET["c21"],$_GET["c31"],$_GET["c41"]) ;
		$a2 = lm_score($_GET["c12"],$_GET["c22"],$_GET["c32"],$_GET["c42"]) ;
		$a3 = lm_score($_GET["c13"],$_GET["c23"],$_GET["c33"],$_GET["c43"]) ;
		$a4 = lm_score($_GET["c14"],$_GET["c24"],$_GET["c34"],$_GET["c44"]) ;
		return $_GET["score"] + $a1 + $a2 + $a3 + $a4 ;
	}
	if($direction == 4){
		$a1 = lm_score($_GET["c14"],$_GET["c13"],$_GET["c12"],$_GET["c11"]) ;
		$a2 = lm_score($_GET["c24"],$_GET["c23"],$_GET["c22"],$_GET["c21"]) ;
		$a3 = lm_score($_GET["c34"],$_GET["c33"],$_GET["c32"],$_GET["c31"]) ;
		$a4 = lm_score($_GET["c44"],$_GET["c43"],$_GET["c42"],$_GET["c41"]) ;
		return $_GET["score"] + $a1 + $a2 + $a3 + $a4 ;
	}
	return 0;
}

function lm_score($v1,$v2,$v3,$v4){
	$newlinescore = 0 ;
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v4 == 0 ){
		$v4=$v3;
		$v3=0;
	}

	if( $v4 == $v3 ){
		$v4 = $v4 * 2 ;
		$v3 = 0 ;
		$newlinescore = $newlinescore + $v4 ;
	}
	if( $v3 == 0 ){
		$v3=$v2;
		$v2=0;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}

	if( $v3 == $v2 ){
		$v3 = $v3 * 2 ;
		$v2 = 0 ;
		$newlinescore = $newlinescore + $v3 ;
	}
	if( $v2 == 0 ){
		$v2=$v1;
		$v1=0;
	}

	if( $v2 == $v1 ){
		$v2 = $v2 * 2 ;
		$v1 = 0 ;
		$newlinescore = $newlinescore + $v2 ;
	}
	return $newlinescore ;
}




?>
<?php

if(!isset($_GET["score"])){
	header(randomstart());
	exit();
}

if(isset($_GET["move"])){
	header("Location:2048.php?score=".$_GET["score"]."&".addrandtile()) ;
	exit();
}

if( ! isset($_GET["page"]) || $_GET["page"] == 0){
	if( ! canplay() ) {
		header("Location:2048.php?score=".$_GET["score"]."&page=1") ;
		exit() ;
	}	
}

if(isset($_GET["page"])){
	$page = $_GET["page"] ;
} else {
	$page = 0 ;
}
?>
<!Doctype html>
<html>
<head>
	
	<meta charset="UTF-8"/>
	<title>
		2048
	</title>
	<link rel="icon" type="image" href="res/2048.ico">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<style type="text/css">

	</style>
</head>
<body class="body1" background="res/2048back.png">
	<!--<div>
		<img class="image" src="res/2048_logo.png">
	</div> -->
	<!--	<h1 class="Class">
			2048
		</h1>
-->		
		<img class="cb" src="res/kisspng-claude-bernard-university-lyon-1-university-of-lyo-5bf898b8034648.5271944415430186800134-removebg-preview.png">
		
	
		
		<h1 class="beginning">Best game ever!</h1>
	<div class="bas">
	<div class="page">
		<?php
		if($page == 0) {
		
		?>
		
		<header class="sub">
			<br/>
			<span class="title">
				<strong>
					2048
				</strong>
			</span>
			<span class="score">
				score :
				<?php echo($_GET["score"]) ; ?>
			</span>
			<span class="new">
				<a href="2048.php">New game</a>
			</span>
		</header>
		<br/>
		<div class="grid">
			<table>
				<tr>
					<th class="g"><?php echo(html_tile("c11")) ;?></th>
					<th class="g"><?php echo(html_tile("c12")) ;?></th>
					<th class="g"><?php echo(html_tile("c13")) ;?></th>
					<th class="g"><?php echo(html_tile("c14")) ;?></th>
				</tr>
				<tr>
					<th class="g"><?php echo(html_tile("c21")) ;?></th>
					<th class="g"><?php echo(html_tile("c22")) ;?></th>
					<th class="g"><?php echo(html_tile("c23")) ;?></th>
					<th class="g"><?php echo(html_tile("c24")) ;?></th>
				</tr>
				<tr>
					<th class="g"><?php echo(html_tile("c31")) ;?></th>
					<th class="g"><?php echo(html_tile("c32")) ;?></th>
					<th class="g"><?php echo(html_tile("c33")) ;?></th>
					<th class="g"><?php echo(html_tile("c34")) ;?></th>
				</tr>
				<tr>
					<th class="g"><?php echo(html_tile("c41")) ;?></th>
					<th class="g"><?php echo(html_tile("c42")) ;?></th>
					<th class="g"><?php echo(html_tile("c43")) ;?></th>
					<th class="g"><?php echo(html_tile("c44")) ;?></th>
				</tr>
			</table>
		</div>
		<div class="dpad">
			<table>
			<tr>
				<th></th>
				<th class="key"><a href="<?php echo("2048.php?score=".getmovedscore(1)."&move=1&".getmoveresult(1)) ; ?>">■■</a></th>
				<th></th>
			</tr>
			<tr>
				<th class="key"><a href="<?php echo("2048.php?score=".getmovedscore(4)."&move=1&".getmoveresult(4)) ; ?>">■■</a></th>
				<th></th>
				<th class="key"><a href="<?php echo("2048.php?score=".getmovedscore(2)."&move=1&".getmoveresult(2)) ; ?>">■■</a></th>
			</tr>
			<tr>
				<th></th>
				<th class="key"><a href="<?php echo("2048.php?score=".getmovedscore(3)."&move=1&".getmoveresult(3)) ; ?>">■■</a></th>
				<th></th>
			</tr>
			</table>
		</div>
		<br/>
		<header class="sub">
			
			<?php
			
			if(haswon()){
			?>
			<article class="hbox">
				<header>
					<h1>
						Because you won
					</h1>
				</header>
				<div class="article_body">
					<p>
						Congrats
					</p>
				</div>
				<div class="hidden"><br/></div>
			</article>
			<?php
			}

			if( $_GET["score"] > 300000 ){
			?>
			<article class="hbox">
				<header>
					<h1>
						Because you cheated
					</h1>
				</header>
				<div class="article_body">
					<p>
						Congrats
					</p>
				</div>
				<div class="hidden"><br/></div>
			</article>
			<?php
			}
			?>
		</header>
		<br/>
		<?php
		} 
		if($page == 1){

		?>
		
		<header class="sub">
			<br/>
			<span class="title">
				<strong>
					2048
				</strong>
			</span>
			<span class="score">
				score :
				<?php echo($_GET["score"]) ; ?>
			</span>
			<span class="new">
				<a href="2048.php">New game</a>
			</span>
		</header>
		<header>
			<article class="textbox">
				<br/>
				<header>
					<h1>
						Game Over
					</h1>
				</header>
				<br/>
				<div class="article_body">
					<p>
						Game Over. Try again
					</p>
				</div>
				<div class="hidden"><br/></div>
			</article>
			<br/><br/>
		</header>
		<?php
		}
		if($page == 2){
		?>
		<header class="sub">
			<br/>
			<span class="title">
				<strong>
					2048
				</strong>
			</span>
			<span class="score">
				score :
				<?php echo($_GET["score"]) ; ?>
			</span>
			<span class="new">
				<a href="2048.php?score=<?php echo($_GET["score"]."&".gettiles()) ; ?>">Continue</a>
			</span>
		</header>
		
		
		
		<?php
		} 
		?>
	</div>
	</div>
	
</body>

</html>
