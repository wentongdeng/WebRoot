
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Health Informatics Lab @ SIAT (Fengfeng Zhou)</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- <meta http-equiv="refresh" content="30"> -->
</head>
<body>
<div id="sina_ip_info"></div>
<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> 
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script> 
<script type="text/javascript">

var uip = returnCitySN["cip"];
$.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='+uip, function(_result){
	if (remote_ip_info.ret == '1'){
		var userMsg="ip: "+uip+"country: "+remote_ip_info.country+"  province: "+remote_ip_info.city+"  district: "+remote_ip_info.district+
		"  isp: "+remote_ip_info.isp+"  type: "+remote_ip_info.type+"  other: "+remote_ip_info.desc;
		var date = new Date();
    	var seperator1 = "-";
   		var seperator2 = ":";
    	var year = date.getFullYear();
    	var month = date.getMonth() + 1;
    	var strDate = date.getDate();
    	if (month >= 1 && month <= 9) {
       	 	month = "0" + month;
    	}
   	 	if (strDate >= 0 && strDate <= 9) {
        	strDate = "0" + strDate;
    	}
    	var currentdate = year + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
        
       var txt = "浏览器代码名: " + navigator.appCodeName + "  "; 
       txt+= "浏览器名称: " + navigator.appName + "  "; 
       txt+= "浏览器平台和版本: " + navigator.appVersion + "  "; 
       txt+= "是否开启cookie: " + navigator.cookieEnabled + "  "; 
       txt+= "操作系统平台: " + navigator.platform + "  ";
       txt+= "User-agent头部值: " + navigator.userAgent + "  ";
       var page="resource";
            
		$.post("service.php",{usermsg:userMsg,date:currentdate,browse:txt,paGe:page
		  });	 
		
	} else {
		
		alert('错误', '没有找到匹配的 IP 地址信息！');
	}
});
</script>
<!-- <?php
	$xmldoc=new DOMDocument();  
	$xmldoc->load("countFile.xml");
	$files=$xmldoc->getElementsByTagName('file');
	for($n=0;$n<$files->length;$n++){
		$onefile=$files->item($n);
		$filecount=$onefile->getElementsByTagName("count");
		$fileArray[$n]=$filecount->item(0)->nodeValue;
	}
	
	;?>
	 -->
	<div id="header">	
			<a href="index.html" class="logo"><img src="images/logo.png"></a>
		<ul>
			<li>
				<a href="index.html">Introduction</a>
			</li>
			<li>
				<a href="news.html">News</a>
			</li>
			<li>
				<a href="publications.html">Publications</a>
			</li>
			<li class="selected">
				<a href="resource.php">Resource</a>
			</li>
			<li>
				<a href="team.html">Team</a>
			</li>
			
			<li>
				<a href="contact.html">Contact</a>
			</li>
			<li>
				<a href="prephoto.html">photo</a>
			</li>
			
		</ul>
	</div>

	<div id="body">
		<div class="content">
			<img src="images/lobby.jpg" alt="">
			<h2>RESOURCE</h2>
			<div class="section">
				<div>
					<span>book</span>
					<ul>
						<!-- <li class="hen">
							Resource:resource's name;information informationinformation informationinformation informationinformation information<br/>
							information information information information informationinformation informationinformation information
							<ul>
								<li>
									<a href="fileDown.php?count=0" style="text-decoration:none;">Chick here to download &nbsp;&nbsp;<label><?php echo $fileArray[0]; ?></label>
									</a>
								</li>
							</ul>
						</li>
						-->
						<li class="hen">
							Resource:resource's name;information informationinformation informationinformation information<br/>
							information information information information informationinformation informationinformation information
							<ul>
								<li>
                                //由于服务器那边的问题不能使用PHP下载文件所以只能通过静态链接的方法下载
								<!-- 	<form name="form" action="userDownmsg.php" method="post">										
										<input type="hidden" name="count" value="1" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[1];?>
									</form> -->
									<a href="test.gif" download="test.gif">download</a>
								</li>
							</ul>
						</li>
						<li class="hen">
							Resource:resource's name;<br/>
							information information information information information
							<ul>
								<li>
								<!--
									<form name="form" action="userDownmsg.php" method="post">
										<input type="hidden" name="count" value="2" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[2];?>
									</form>
									 -->
									 <a href="WebRoot.rar" download="Web.rar">download</a>
								</li>
							</ul>
						</li>
						<li>
							Resource:resource's name;<br/>
							information information information information information
							<ul>
								<li>
								<!--
									<form name="form" action="userDownmsg.php" method="post">
										<input type="hidden" name="count" value="3" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[3];?>
									</form>
									-->
									 <a href="debug.txt" download="bug.txt">download</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="last">
						<li class="hen">
							Resource:resource's name;<br/>
							information information information information information
							<ul>
								<li>
								<!--
									<form name="form" action="userDownmsg.php" method="post">
										<input type="hidden" name="count" value="4" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[4];?>
									</form>
									-->
									 <a href="56867.pdf" download="56867.pdf">download</a>
								</li>
							</ul>
						</li>
						<li class="hen">
							Resource:resource's name;<br/>
							information information information information information
							<ul>
								<li>
								<!--
									<form name="form" action="userDownmsg.php" method="post">
										<input type="hidden" name="count" value="5" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[5];?>
									</form>
									-->
									 <a href="debug.txt" download="bug.txt">download</a>
								</li>
							</ul>
						</li>
						<li class="hen">
							Resource:resource's name;<br/>
							information information information information information
							<ul>
								<li>
								<!--
									<form name="form" action="userDownmsg.php" method="post">
										<input type="hidden" name="count" value="6" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[6];?>
									</form>
									-->
									 <a href="debug.txt" download="bug.txt">download</a>
								</li>
							</ul>
						</li>
						<li class="hen">
							Resource:resource's name;<br/>
							information information information information information
							<ul>
								<li>
								<!--
									<form name="form" action="userDownmsg.php" method="post">
										<input type="hidden" name="count" value="7" />
  										<input type="submit" name="download" value="downlaod"/>&nbsp;&nbsp;&nbsp;<?php echo $fileArray[7];?>
									</form>
									-->
									 <a href="debug.txt" download="bug.txt">download</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		<div class="sidebar">
			<h3>contact</h3>
			<ul>
				<li>
					<span class="address">address</span>
					<ul>
						<li>
							Health Informatics Lab
						</li>
						<li>
							 jilin province
						</li>
						<li>
							changchun city
						</li>
						<li>
							Hi-tech development zone
						</li>
						<li>
							 2699 forward street
						</li>
						<li>
							jilin university
						</li>					
					</ul>
				</li>
				<li>
					<span class="phone">telephone</span>
					<ul>
						<li>
							18675591420
						</li>
					</ul>
				</li>
				<li>
					<span class="email">email</span>
					<ul>
						<li>
							<a href="ffzhou_hilab@qq.com">ffzhou_hilab@qq.com</a>
						</li>
					</ul>
				</li>
				<li>
					<span class="twitter">twitter</span>
					<ul>
						<li>
							<a href="#">@mattovolumeone</a>
						</li>
					</ul>
				</li>
				<li>
					<span class="facebook">facebook</span>
					<ul>
						<li>
							<a href="#">www.facebook/illumelabs</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<div>
			<p>
				<span>2016 &copy; Illumelabs Diagnostic Center.</span><a href="#" >Terms of Service</a> | <a href="#" >Privacy Policy</a>
			</p>
			<ul>
				<li id="facebook">
					<a href="#">facebook</a>
				</li>
				<li id="twitter">
					<a href="#">twitter</a>
				</li>
				<li id="googleplus">
					<a href="#">googleplus</a>
				</li>
				<li id="rss">
					<a href="#" >rss</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>
