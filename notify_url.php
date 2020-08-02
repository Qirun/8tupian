<?php
error_reporting(0);

require_once 'f2fpay/config/config.php';
require_once 'f2fpay/service/AlipayTradeService.php';
ini_set('date.timezone','Asia/Shanghai');

//八图片平台配置信息：
$config_8tupian['key_id'] = "8d0a0966667a4bac37068be82bc95d11“;   //key
$config_8tupian['api_url'] = "http://web.8tupian.com/api/notify.php";   //通知地址，不用修改

function sign($data, $key)
{
    ksort($data);
    $sign = md5(urldecode(http_build_query($data)).'&key='.$key);
    return $sign;
}

$arr=$_POST;
$alipaySevice = new AlipayTradeService($config); 
$result = $alipaySevice->check($arr);

if($result)   //验证成功
{
	
	//商户订单号
	$out_trade_no = $_POST['out_trade_no'];
	
	//支付宝交易号	
	$trade_no = $_POST['trade_no'];
	
	//交易状态
	$trade_status = $_POST['trade_status'];
	
	//订单金额
	$price = $_POST['total_amount'];
	
	if($_POST['trade_status'] == 'TRADE_FINISHED') 
	{
	}
	else if ($_POST['trade_status'] == 'TRADE_SUCCESS') 
	{
			$orderid = $out_trade_no;
			$fee = $price * 100;
			$postdata = array(
				'orderid'      => $orderid,
				'fee'      => $fee 
			);
		
			$sign =  sign($postdata, trim( $config_8tupian['key_id']) );
			
			$url = sprintf("%s?orderid=%s&fee=%d&sign=%s", $config_8tupian['api_url'], $orderid, $fee , $sign);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
		  if($response == "success") 
			{
		     echo "success";
		  }
			else
			{
				echo "fail";
			}
			  
			curl_close($ch);
			
			die(0);
	}
	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	    
	echo "success";		//请不要修改或删除
}
else 
{
    //验证失败
    echo "fail";	//请不要修改或删除

}
?>

