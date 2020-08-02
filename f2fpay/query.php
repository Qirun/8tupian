<?php
/**
 * Created by PhpStorm.
 * User: airwalk
 * Date: 16/5/20
 * Time: 下午7:54
 */

ini_set("display_errors","Off");

header("Content-type: text/html; charset=utf-8");
require_once 'service/AlipayTradeService.php';

if (!empty($_REQUEST['out_trade_no'])&& trim($_REQUEST['out_trade_no'])!="")
{
    ////获取商户订单号
    $out_trade_no = trim($_REQUEST['out_trade_no']);

    //第三方应用授权令牌,商户授权系统商开发模式下使用
    $appAuthToken = "";//根据真实值填写

    //构造查询业务请求参数对象
    $queryContentBuilder = new AlipayTradeQueryContentBuilder();
    $queryContentBuilder->setOutTradeNo($out_trade_no);

    $queryContentBuilder->setAppAuthToken($appAuthToken);


    //初始化类对象，调用queryTradeResult方法获取查询应答
    $queryResponse = new AlipayTradeService($config);
    $queryResult = $queryResponse->queryTradeResult($queryContentBuilder);

    //根据查询返回结果状态进行业务处理
    switch ($queryResult->getTradeStatus()){
        case "SUCCESS":
            echo "ok";
            break;
        case "FAILED":
            echo "支付宝查询交易失败或者交易已关闭!!!"."<br>--------------------------<br>";
            if(!empty($queryResult->getResponse())){
                print_r($queryResult->getResponse());
            }
            break;
        case "UNKNOWN":
            echo "系统异常，订单状态未知!!!"."<br>--------------------------<br>";
            if(!empty($queryResult->getResponse())){
                print_r($queryResult->getResponse());
            }
            break;
        default:
            echo "不支持的查询状态，交易返回异常!!!";
            break;
    }
    return ;
}

echo "failed";
?>