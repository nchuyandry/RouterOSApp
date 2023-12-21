<?php
$API= new RouterosAPI();
$ip = '10.16.0.1';
$username = 'monitor';
$password = 'monitor@tvip.co.id';
//$this->RouterosAPI->debug = TRUE;
if ($API->connect($ip, $username, $password)) {
	
	//$array = $this->RouterosAPI->comm("/ip/route/print");
	//var_dump( $array[0]);
	echo "<pre>";
	//print_r($array);
	$id = "*9";
	$API->write("/ip/route/set", FALSE);
	$API->write("=.id=".$id, false);
	$API->write("=disable=yes",true);
	$READ = $API->read(false);
    $ARRAY = $API->parseResponse($READ);
    return(true);
	echo "</pre>";
	
	
}
$API->disconnect();
?>