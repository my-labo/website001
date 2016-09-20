<?php

$pre_time = "";
$pre_minit = "";
$remake_now = "default";
$test_time = "";
$test_minit = "";

if(isset($_POST["pre_time"])){
$pre_time = $_POST["pre_time"];
}

if(isset($_POST["pre_minit"])){
$pre_minit = $_POST["pre_minit"];
}

if(isset($_POST["remake_now"])){
$remake_now = $_POST["remake_now"];
}

if(isset($_POST["test_time"])){
$test_time = $_POST["test_time"];
}

if(isset($_POST["test_minit"])){
$test_minit = $_POST["test_minit"];
}

$pre_remake_time = $pre_time.":".$pre_minit;
$test_remake_time = $test_time.":".$test_minit;




switch ($pre_remake_time) {
	case ':':
		break;
	default:
		$command1 = "sudo at ".$pre_remake_time." -f /root/prewww_cleate_instance.sh";
		echo system($command1);
		$msg = "<h2>".$pre_remake_time."に Previewサーバの再作成がスケジューリングされました<br>開始後10～15分で完了します</h2>";
		echo $msg;
		break;
}

switch ($test_remake_time) {
	case ':':
		break;
	default:
		$command2 = "sudo at ".$test_remake_time." -f /root/testhp_cleate_instance.sh";
		echo system($command2);
		$msg = "<h2>".$pre_remake_time."に Testサーバの再作成がスケジューリングされました<br>開始後10～15分で完了します</h2>";
		echo $msg;
		break;
}

switch ($remake_now) {
	case 'pre_remake_now':
		$msg = "<h2>Previewサーバの再作成を開始します。<br>10～15分で完了します</h2>";
		echo $msg;
		echo exec('sudo /root/prewww_cleate_instance.sh');
		break;
	case 'test_remake_now':
		$msg = "<h2>Testサーバの再作成を開始します。<br>10～15分で完了します</h2>";
		echo $msg;
		echo exec('sudo /root/testhp_cleate_instance.sh');
		break;
	default:
		break;
}








?>