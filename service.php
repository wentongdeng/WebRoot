<html>
<head>
	<title>Health Informatics Lab @ SIAT (Fengfeng Zhou)</title>
	<meta charset=utf-8" />
	
</head>
<body>
<?php 
	$date=$_POST['date'];
	$userMsg=$_POST['usermsg'];
	$browse=$_POST['browse'];
	$page=$_POST['paGe'];
	$page=$page."\r\n";
	$content=$date."\r\n".$userMsg."\r\n".$browse."\r\n";
	$compile_dir = "./usermsg.txt"; 
	$file = fopen($compile_dir,"a"); 
	fwrite($file,$page);
	fwrite($file,$content); 
	fclose($file); 
; ?>
</body>
</html>