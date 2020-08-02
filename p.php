<?php
error_reporting(0);

$domain = $_SERVER['SERVER_NAME'];

function getIp()
{
	if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
	{
		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else if(!empty($_SERVER["REMOTE_ADDR"]))
	{
		$cip = $_SERVER["REMOTE_ADDR"];
	}
	else
	{
		$cip = '';
	}
	preg_match("/[\d\.]{7,15}/", $cip, $cips);
	$cip = isset($cips[0]) ? $cips[0] : 'unknown';
	unset($cips);

	return $cip;
}

function analysis( $fuhao , $buffer)
{
	$pos = strpos($buffer, $fuhao);
	$pos1 = strpos($buffer, "\r\n", $pos );
	return substr($buffer, $pos + strlen($fuhao), $pos1 - $pos - strlen($fuhao));
}

	$p = $_REQUEST['8tp'];
	if ( $p == NULL )
	{
		die ("please upload picture !");
	}

	$p = strtolower($p);
	
	$pos = strpos($p, ".");
	$url = "http://" . substr($p, 0, $pos) . ".8tupian.com/" . substr($p, $pos + 1);

	$ip = getIp();
	
      $headers = array(
	  "Accept: ".$_SERVER['HTTP_ACCEPT'],
	  "User-Agent: ". $_SERVER['HTTP_USER_AGENT'],
	  "referer: ". $_SERVER['HTTP_REFERER'],
	  "Cookie: ". $_SERVER['HTTP_COOKIE'],
	  "X-Forwarded-For: " . $ip,
	  "Authorization: ". $domain,
      );

    $curl = curl_init();
	
    curl_setopt($curl, CURLOPT_URL, $url );
	
    curl_setopt($curl, CURLOPT_HEADER, true);
	
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	
    $data = curl_exec($curl);
	
	$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
	$header = substr($data, 0, $headerSize);
	
    curl_close($curl);
	
	$contenttype = analysis("Content-Type: ", $header);
	$setcookie = analysis("Set-Cookie: ", $header);
	
	header("Content-Type: " . $contenttype);
	header("Set-Cookie: " . str_replace("8tupian.com", $domain, $setcookie) );

	echo substr($data, $headerSize  );
?>