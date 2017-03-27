<!DOCTYPE html>
<html>
  <head>
    <title>fileDown.html</title>
	
    <meta name="keywords" content="keyword1,keyword2,keyword3">
    <meta name="description" content="this is my page">
    <meta name="content-type" content="text/html; charset=UTF-8">
    
    <!--<link rel="stylesheet" type="text/css" href="./styles.css">-->

  </head>
  
  <body>
   				
<?php
header("Content-type: text/html; charset=utf-8");
function getfilename(){
	$downCount=$_GET['count'];
	$downCount=intval($downCount);
	$xmldoc=new DOMDocument();  
	$xmldoc->load("countFile.xml");
	$files=$xmldoc->getElementsByTagName('file');
	$file=$files->item($downCount);
	$fileNode=$file->getElementsByTagName("name");
	$filename=$fileNode->item(0)->nodeValue;
	$filename=strval($filename);
	$filename=trim($filename);
	$count=$file->getElementsByTagName("count")->item(0);
	$con=intVal($count->nodeValue);
	$count->nodeValue=$con+1;
	$xmldoc->save("countFile.xml"); 
	return $filename;
}

//取IP信息
function getIpAddress($ip=""){  
	$url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js";
	if($ip!="")$url .= "&ip=".$ip;
    $ipContent   = file_get_contents($url);  
    $jsonData = explode("=",$ipContent);    
    $jsonAddress = substr($jsonData[1], 0, -1);  
    return $jsonAddress;  
}  
//返回IP的地理地址
function showIpAddress($ip=""){
	if($ip){
		$cityArray = getIpAddress($ip); 
		$city_json = json_decode($cityArray,TRUE);
		$address = $city_json['country'].''.$city_json['province'].''.$city_json['city'];
		return $address;  
	}else{
		return '';  
	}
} 







function getTime(){
	$showtime=date("Y-m-d H:i:s");
	return $showtime;
}

function getbrowseMsg(){
	 $sys = $_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串
     if (stripos($sys, "Firefox/") > 0) {
         preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
         $exp[0] = "Firefox";
         $exp[1] = $b[1];  //获取火狐浏览器的版本号
     } elseif (stripos($sys, "Maxthon") > 0) {
         preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);
         $exp[0] = "Maxthon";
         $exp[1] = $aoyou[1];
     } elseif (stripos($sys, "MSIE") > 0) {
         preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
         $exp[0] = "IE";
         $exp[1] = $ie[1];  //获取IE的版本号
     } elseif (stripos($sys, "OPR") > 0) {
		     preg_match("/OPR\/([\d\.]+)/", $sys, $opera);
         $exp[0] = "Opera";
         $exp[1] = $opera[1];  
     } elseif(stripos($sys, "Edge") > 0) {
         //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配
         preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);
         $exp[0] = "Edge";
         $exp[1] = $Edge[1];
     } elseif (stripos($sys, "Chrome") > 0) {
		     preg_match("/Chrome\/([\d\.]+)/", $sys, $google);
         $exp[0] = "Chrome";
         $exp[1] = $google[1];  //获取google chrome的版本号
     } elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){
         preg_match("/rv:([\d\.]+)/", $sys, $IE);
		     $exp[0] = "IE";
         $exp[1] = $IE[1];
     }else {
		$exp[0] = "Don't know browse";
        $exp[1] = ""; 
	 }
	 

	 $agent = $_SERVER['HTTP_USER_AGENT'];
   	 $os = false;
 
    if (preg_match('/win/i', $agent) && strpos($agent, '95'))
    {
      $os = 'Windows 95';
    }
    else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
    {
      $os = 'Windows ME';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
    {
      $os = 'Windows 98';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
    {
      $os = 'Windows Vista';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
    {
      $os = 'Windows 7';
    }
	  else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
    {
      $os = 'Windows 8';
    }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent))
    {
      $os = 'Windows 10';#添加win10判断
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent))
    {
      $os = 'Windows XP';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent))
    {
      $os = 'Windows 2000';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent))
    {
      $os = 'Windows NT';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent))
    {
      $os = 'Windows 32';
    }
    else if (preg_match('/linux/i', $agent))
    {
      $os = 'Linux';
    }
    else if (preg_match('/unix/i', $agent))
    {
      $os = 'Unix';
    }
    else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent))
    {
      $os = 'SunOS';
    }
    else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent))
    {
      $os = 'IBM OS/2';
    }
    else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent))
    {
      $os = 'Macintosh';
    }
    else if (preg_match('/PowerPC/i', $agent))
    {
      $os = 'PowerPC';
    }
    else if (preg_match('/AIX/i', $agent))
    {
      $os = 'AIX';
    }
    else if (preg_match('/HPUX/i', $agent))
    {
      $os = 'HPUX';
    }
    else if (preg_match('/NetBSD/i', $agent))
    {
      $os = 'NetBSD';
    }
    else if (preg_match('/BSD/i', $agent))
    {
      $os = 'BSD';
    }
    else if (preg_match('/OSF1/i', $agent))
    {
      $os = 'OSF1';
    }
    else if (preg_match('/IRIX/i', $agent))
    {
      $os = 'IRIX';
    }
    else if (preg_match('/FreeBSD/i', $agent))
    {
      $os = 'FreeBSD';
    }
    else if (preg_match('/teleport/i', $agent))
    {
      $os = 'teleport';
    }
    else if (preg_match('/flashget/i', $agent))
    {
      $os = 'flashget';
    }
    else if (preg_match('/webzip/i', $agent))
    {
      $os = 'webzip';
    }
    else if (preg_match('/offline/i', $agent))
    {
      $os = 'offline';
    }
    else
    {
      $os = "not konw os";
    }
     return $exp[0].'('.$exp[1].')'."  ".$os;
}
	
	$date=getTime();
	$ip = $_SERVER["REMOTE_ADDR"];
	$userMsg= showIpAddress($ip);
	$browse=getbrowseMsg();
	
	

	$filename=getfilename();
	$contentA=$filename.$date."\r\n".$userMsg."\r\n".$browse."\r\n";
	$compile_dir = "./downfile.txt"; 
	$file = fopen($compile_dir,"a"); 
	fwrite($file,$contentA); 
	fclose($file);	

	function download_by_path($path_name, $save_name){
         ob_end_clean();
         $hfile = fopen($path_name, "rb") or die("Can not find file: $path_name\n");
         Header("Content-type: application/octet-stream");
         Header("Content-Transfer-Encoding: binary");
         Header("Accept-Ranges: bytes");
         Header("Content-Length: ".filesize($path_name));
         Header("Content-Disposition: attachment; filename=\"$save_name\"");
         while (!feof($hfile)) {
			
            echo fread($hfile, 32768);
         }
         fclose($hfile);
    }
download_by_path($filename,"yes.gif");
?>
  </body>
</html>