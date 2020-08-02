<?php 

error_reporting(0);

header("Content-type: text/html; charset=utf-8");
ini_set('date.timezone','Asia/Shanghai');

require_once 'model/builder/AlipayTradePrecreateContentBuilder.php';
require_once 'service/AlipayTradeService.php';

if (!empty($_REQUEST['order_id'])&& trim($_REQUEST['order_id'])!=""){

    $out_trade_no = $_REQUEST['order_id'];

    //订单名称，必填
    $subject = "图片支付";
    if ( isset($config['subjectname']) )
    {
    	$subject = $config['subjectname'];
    }

    //付款金额，必填
    $total_amount = $_REQUEST['fee'] / 100;
	
	$picurl = $_REQUEST['picurl'];

	$timeExpress = "5m";

	$appAuthToken = "";//根据真实值填写
	

	// 创建请求builder，设置请求参数
	$qrPayRequestBuilder = new AlipayTradePrecreateContentBuilder();
	$qrPayRequestBuilder->setOutTradeNo($out_trade_no);
	$qrPayRequestBuilder->setTotalAmount($total_amount);
	$qrPayRequestBuilder->setTimeExpress($timeExpress);
	$qrPayRequestBuilder->setSubject($subject);
	$qrPayRequestBuilder->setBody($body);

	$qrPayRequestBuilder->setAppAuthToken($appAuthToken);
	
	if ( strcasecmp( substr($config['notify_url'], 0, 14), "http://http://" ) == 0 )
	{
		$config['notify_url'] = substr($config['notify_url'], 7);
	}

	$qrPay = new AlipayTradeService($config);
	$qrPayResult = $qrPay->qrPay($qrPayRequestBuilder);

	switch ($qrPayResult->getTradeStatus()){
		case "SUCCESS":
			$response = $qrPayResult->getResponse();
?>
<script language="javascript">
window.location.href = "<?php echo $response->qr_code ; ?>";
</script>
<?php
			break;
		case "FAILED":
			echo "支付宝创建订单二维码失败!!!"."<br>--------------------------<br>";
			if(!empty($qrPayResult->getResponse())){
				print_r($qrPayResult->getResponse());
			}
			break;
		case "UNKNOWN":
			echo "系统异常，状态未知!!!"."<br>--------------------------<br>";
			if(!empty($qrPayResult->getResponse())){
				print_r($qrPayResult->getResponse());
			}
			break;
		default:
			echo "不支持的返回状态，创建订单二维码返回异常!!!";
			break;
	}
	return ;
}

?>