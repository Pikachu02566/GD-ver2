<?php
chdir (dirname (__FILE__));
include dirname (__FILE__)."/../lib/connection.php";
$url = $host."/updateGJDesc20.php";

$levelDesc = $_POST['levelDesc'];
$levelID = $_POST['levelID'];
$udid = $_POST['udid'];
$accountID = $_POST['accountID'];
$gjp = $_POST['gjp'];
$secret = $_POST['secret'];

$array = ["levelDesc" => $levelDesc, "levelID" => $levelDesc, "udid" => $udid, "accountID" => $accountID, "gjp" => $gjp, "secret" => $secret];
$function = array (
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POSTFIELDS => $array);
$ch = curl_init();
curl_setopt_array ($ch, $function);
$response = curl_exec($ch);
if (!empty ($response)){
	echo $response;
	} elseif (empty ($host)){
		$server = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		exit ("<b>Error</b>: You just not setup at ".dirname($server)."/config/host.php");
		} else {
		echo "<b>Error</b>: You are currently <b style='color:red'>OFFLINE</b>!";
		}