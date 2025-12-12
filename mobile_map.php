<?php
include("./adbconfig.php");
include("./c_m.php");
include("./class_bas.php");

date_default_timezone_set('Asia/Seoul');
?>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, height=device-height">
<title>캠퍼스 길 찾기 웹 지도</title>
<?php 

function head(){
    ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

    <?php 	
}

function xfontstyle(){/// 1은 홈페이지   2는 모바일
	?>
	<meta charset="utf-8">
	<style>
	html, body { border:0; margin:0; padding:0; width:100%; height:100%; } 
	body,td,a,p,h,div,input,span,textarea{font-size:10pt;color:black;font-family:'Times New Roman';}
	table{border-collapse:collapse;}
	//td{padding:3px;border:1px solid #eeeeee;}
	A:Hover {color:red;font-weight:bold;text-decoration:underline;}
	A {color:black;text-decoration:none }
	Body {background-color:white;}
	</style>

	<style media='print'>
	   .noprint     { display: none }
	</style>
	<style type ='text/css'>
	   P.breakhere {page-break-before: always;}
	</style>		
	<?php
}

function home(){
	xfontstyle();
	?>

<h>home</h>
<br>
<br>	
	<?php

}

function bottompart(){
	?>

    <div id="map"></div>
    <div id="controls">
        <h2>캠퍼스 길 찾기</h2>
        <input type="text" id="start-input" placeholder="출발지">
        <input type="text" id="end-input" placeholder="도착지">
        <button onclick="findRoute()">경로 찾기</button>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>

    <script src="script.js"></script>

	<?php 
	
}
function bottommenu(){
	if( (!isset($_GET['whd'])) || ( ($_GET['whd']==1) ||  ($_GET['whd']=="") ) ){
        bottommenu();
	}	
    
}

xfontstyle();
head();

if(  (isset($_GET['a'])) && (strlen(trim($_GET['a']))>0)  ){
	
	$_GET['a']();
	bottompart();	
}else{
	
	home();	
	bottompart();	
}



