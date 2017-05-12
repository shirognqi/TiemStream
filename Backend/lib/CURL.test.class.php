<?php
echo httpcopy("http://www.baidu.com/img/baidu_sylogo1.gif");
  
function httpcopy($url, $file="", $timeout=60) {
  $file = empty($file) ? pathinfo($url,PATHINFO_BASENAME) : $file;
  $dir = pathinfo($file,PATHINFO_DIRNAME);
  !is_dir($dir) && @mkdir($dir,0755,true);
  $url = str_replace(" ","%20",$url);
  
  if(function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $temp = curl_exec($ch);
    if(@file_put_contents($file, $temp) && !curl_error($ch)) {
      return $file;
    } else {
      return false;
    }
  } else {
    $opts = array(
      "http"=>array(
      "method"=>"GET",
      "header"=>"",
      "timeout"=>$timeout)
    );
    $context = stream_context_create($opts);
    if(@copy($url, $file, $context)) {
      //$http_response_header
      return $file;
    } else {
      return false;
    }
  }
}

?>


再来个远程下载文件到服务器


<form method="post">
<input name="url" size="50" />
<input name="submit" type="submit" />
</form>
< ?php
// maximum execution time in seconds
set_time_limit (24 * 60 * 60);
if (!isset($_POST['submit'])) die();
// folder to save downloaded files to. must end with slash
$destination_folder = 'temp/';

$url = $_POST['url'];
$newfname = $destination_folder . basename($url);
$file = fopen ($url, "rb");
if ($file) {
		$newf = fopen ($newfname, "wb");
		if ($newf)
				while(!feof($file)) {
						fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
				}
}
if ($file) {
		fclose($file);
}
if ($newf) {
		fclose($newf);
}
?>
