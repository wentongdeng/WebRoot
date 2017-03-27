
<?php
	function getfilename($downCount){
		try{
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
		}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to read file name"."\r\n";
			fwrite($bugfile,$bug); 
			fwrite($bugfile,$bugreason);
			fclose($file);	  
			exit("unable to read file name");   
		}   
		
	}

function getTime(){
	try{
		$showtime=date("Y-m-d H:i:s");
		return $showtime;
	}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to get time"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to get time");   
		}   
	
}

function getbrowseMsg(){
	 try{
		$sys = $_SERVER['HTTP_USER_AGENT'];  
     if (stripos($sys, "Firefox/") > 0) {
         preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
         $exp[0] = "Firefox";
         $exp[1] = $b[1];  
     } elseif (stripos($sys, "Maxthon") > 0) {
         preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);
         $exp[0] = "Maxthon";
         $exp[1] = $aoyou[1];
     } elseif (stripos($sys, "MSIE") > 0) {
         preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
         $exp[0] = "IE";
         $exp[1] = $ie[1];  
     } elseif (stripos($sys, "OPR") > 0) {
		     preg_match("/OPR\/([\d\.]+)/", $sys, $opera);
         $exp[0] = "Opera";
         $exp[1] = $opera[1];  
     } elseif(stripos($sys, "Edge") > 0) {
         
         preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);
         $exp[0] = "Edge";
         $exp[1] = $Edge[1];
     } elseif (stripos($sys, "Chrome") > 0) {
		     preg_match("/Chrome\/([\d\.]+)/", $sys, $google);
         $exp[0] = "Chrome";
         $exp[1] = $google[1];  
     } elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){
         preg_match("/rv:([\d\.]+)/", $sys, $IE);
		     $exp[0] = "IE";
         $exp[1] = $IE[1];
     }else {
		$exp[0] = "Don't know browse";
        $exp[1] = ""; 
	 }
	 }catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to get browse"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to get browse mesgae");   
		}  
	 
	 
	try{
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
      $os = 'Windows 10';
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
	}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to get os mesage"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to get os mesgae");   
		}  
	 
}

function getIP()
{	
	try{
		static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
	}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to get ip"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to get ip");   
		}  
    
}
 
function getCity($ip = ''){
	try{
		if($ip == ''){
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url),true);
        $data = $ip;
    }else{
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));   
        if((string)$ip->code=='1'){
		   
           return false;
        }
        $data = (array)$ip->data;
    }
    
    return $data;   

	}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to get city"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to get city");   
		} 
    
}

function download_by_path($path_name){
		 try{
			 ob_end_clean();
         $hfile = fopen($path_name, "rb") or die("Can not find file: $path_name\n");
         Header("Content-type: application/octet-stream");
         Header("Content-Transfer-Encoding: binary");
         Header("Accept-Ranges: bytes");
         Header("Content-Length: ".filesize($path_name));
         Header("Content-Disposition: attachment; filename=\"$path_name\"");
         while (!feof($hfile)) {
			
            echo fread($hfile, 1024);
         }
         fclose($hfile);
		}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to down file"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to down file");   
		}  
        
    }
	
		


function writeMesage(){
		try{
		$address="  ";
		$ip=getIP();
		$City1=getCity($ip);
		$City2=getCity();
		if($City1!=false){
			$address=$City1['country']."  ".$City1['country_id']."  ".$City1['area']."  ".$City1['area_id']."  ".$City1['region']."  ".$City1['region_id'].
			"  ".$City1['city']."  ".$City1['city_id']."  ".$City1['isp']."  ".$City1['isp_id']."    ".$ip."\r\n";
		}else{
			$address=$City2['country']."  ".$City2['province']."  ".$City2['city']."  ".$City2['district']."  ".$City2['isp']."  ".$City2['type']."  ".$City2['desc'].$ip."\r\n";

		}
		}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to  transform city"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to transform city");   
		}  	
		try{
			$date=getTime();
			$browse=getbrowseMsg();
	
	
			$downcount=$_POST['count'];
			$filename=getfilename($downcount);
			$contentA=$filename."  ".$date."\r\n".$browse.$address."\r\n";
			$compile_dir = "./downfile.txt"; 
			$file = fopen($compile_dir,"a"); 
			fwrite($file,$contentA); 
			fclose($file);
		}catch (Exception $e){   
			$bug = $e->getMessage(); 
			$compile_dir = "./debug.txt"; 
			$bugfile = fopen($compile_dir,"a"); 
			$bugreason="unable to  write file"."\r\n";
			fwrite($bugfile,$bug);
			fwrite($bugfile,$bugreason); 
			fclose($file);	  
			exit("unable to write file");  
		
		}
	
	}
		
	writeMesage();
	$downcount=$_POST['count'];
	$filename=getfilename($downcount);
	download_by_path($filename);		
	
	

	
;?>
