<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<title>网站检测</title>
<CENTER>
<h3>
今天是
<?php

date_default_timezone_set('PRC');
 

$datetime = new DateTime();
$week = $datetime->format('w');



echo $datetime->format('Y年m月d日  星期w');

?>
<br>
<br>
<form action="./index.php" method="post">
		
  <label>请输入网址以检测（不要在网址前加 http）</label><br>
  <input type="text" name="password">
<button type="submit">检测</button>
	</form>
	
	</h3>
<h2>


<BR>
<?php
error_reporting(0);
# Domain Name
$sitename = trim($_POST['password']); 

function DomainCheck($sitename){
	$starttime = microtime(true);
	$openDomain = fsockopen ($sitename, 80, $errno, $errstr, 10);
	$finishTime = microtime(true);
	$serverStatus    = 0;
	
	if (!$openDomain) $serverStatus = -1;
	else {
		fclose($openDomain);
		$status = ($finishTime - $starttime) * 1000;
		$serverStatus = floor($serverStatus);
	}
	return $serverStatus;
}

$serverStatus = DomainCheck($sitename);

if($sitename == null){
    exit('');
}else{

}


#输出结果
if($serverStatus !=-1) {
	echo '状态码200，该网站请求成功';
	
}else{
	exit('该网站没有请求成功。');
	
}
?>
<br>
<br>

<?php
$host = trim($_POST['password']); 
$port = '80';
$num = 3; //Ping次数
//获取时间
function mt_f (){
list($usec,$sec) = explode(" ",microtime());
return ((float)$usec + (float)$sec); //微秒加秒
}
function ping_f($host,$port){
$time_s = mt_f();
$ip = gethostbyname($host);
$fp = @fsockopen($host,$port);
$time_k = mt_f();
$time = $time_k - $time_s;
$timeyeahout = ceil($time * 1000);
if((!$fp || $timeyeahout > 900))
return '回复大于900ms，请求超时！<br>';
$get = "GET / HTTP/1.1\r\nHost:".$host."\r\nConnect:".$port."Close\r\n";
fputs($fp,$get);
fclose($fp);
$time_e = mt_f();
$time = $time_e - $time_s;
$time = ceil($time * 1000);
return '来自 '.$ip.':'.$port.' 的回复： 时间 = '.$time.'ms<br />';
}
echo ''.$host.':'.$port.' ['.gethostbyname($host).'] 的 Ping 统计信息：<br>';
for($i = 0;$i < $num;$i++){
echo ping_f($host,$port);
//每次运行中间间隔1S
sleep(1);
//刷新输出缓存
ob_flush();
flush();
}
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</h2>
<p>
    
    <center>
    

<br>
    Copyright &copy;2020-<?php echo date("Y"); ?>
     | 
     <a class="footerlink" href='https://yesalan.top' target="_blank">Akashi Soft</a>
     <br>
     Design By. Akashi
     <br>
     All Rights Reserved.
     </p>
     </center>
     
</p>
