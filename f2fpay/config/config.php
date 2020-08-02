<?php
$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => "RSA2",

		//支付宝公钥
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgN6FPz7VAGO0DPLvlYKewD2JPUQSJimDU0OjB025YePQ3/gjRl+aDl8yUfh8PD5fO0uAakcQAAXct13xnnUx3YSeAdXt6TNWq3Qp1lcvfkbv5a3v7REQ3r33TEnT8TCgn9qo0+X/9ypkNMIEhDXHqw6YZ5Pfi5GgUjZWIWcc4Vafn6ur+LAKBTjhyVwirDCLQp+fZDBeKFjiEwK5NKZ5V52MGUpiS3y0XyVBgFg9QAfvSPmw6EgW97cEZkfsHY719EX5JQNcvvhoHLPcMIVyyKnL6qsIGcjjPKdE7EMRlR+VPui65nu5fty/v/AG4jyAz0ZEG8+c3klWNZ89UMQbcQIDAQAB",

		//商户私钥
		'merchant_private_key' => "MIIEpQIBAAKCAQEAzB2y6CwSq/PL6j8stmikyUF++G8O5144R8zdzWNjpmcS5r5raMirXHgKgIEiu8cA8ZYXGqrws5sRjvfqY+FHFB6I93OqiUk+AG9OhC3Csvp8uGxgBd/Sb6UaweR7L1vYglDVkl6h3AKCfOzxCyjXBVUKAkZiTgfXlqbAh7MVqSv5Gzkp0lTC1OZTBhV1DgISGtw57D9xeSx9QzcHHILBZf4TUr0IbLNUoSjEXoSLqbMlH3EAf8Tm3Q01RdNduMliLL7dhxDm+G1CvHIFS83S19/Nj867E2+27tV5cu7GfRxk99pG9peho3e0xD8uLsswGo/gU/3T5n5UYfZdBVhhdwIDAQABAoIBAQCSX3XNotVc8/62I8mXoWESZeJ8m3+vkVSAwLwKLozmZqIaUFFMGiMws3CsiG51BBd8J2q4F/92fOxRfx1ZtNI47lDASvTvcFODEk7W4M3vdUt9IVKWw9PvdhHDG2rvIkkX4onVZgFieXZDydJtc0MGst3zla+nT15dzYThix4sanCIbPuo+5cIF6+/RCpLkeAY1mIkyUpYkEJsvptEElrqM3o5xINq2+DaDxW6sKuTi/oCOAPiNxdzP9woGdFmyFq4nk6LwQSFq5+/dLAaLyauGHT9+Vdbi3Pex3L3xuaNG8WQSa35B+jcgnkrGYyfQORIIJe1XqyeZTiS2i/OWxHxAoGBAPXN4gjmhnXmFvzgoEl2jiwDXip7BjgO8djGpzhzQDXdYKSIToTBvv19ce8jGg60fbT1RTi5Pm7PLNoYix0uOnsYp+XVM4jgHHbcyIrCarhLw3RQ6xx30F88jCK0JRWHqWjqhSso90x+79Ej4WHnRsSfCEdd6SrZy8arQ6mgNhzfAoGBANSVJFa+oZh7L0XPgIZIYuZoxbOQbYyHSU5r5hLmQl7t5xej7sARvDhMTSHMbZB2gqSi2OEp1oRJYoezwDkWFT+iDw1MQX7k3c38mxhaNTp+WFOnj1QWApqUr1UxDFGuuhq8T2Sjg9VqXfKkIGCZ3rmv7/zZ9dy4j8NDpmRdYLZpAoGBAKUYPYNg4lr5yeLbNI1jFaa2NF8v9kNctk+1Tcd6kVwcbrbT3nkIcLFtukK2PuA1lmEeg/nPYgGnISbzaSyWSi03qD2Ub2K1tCiZrhCU+H0EVikf2GpshwYQcsc0W9wUHFMdgYg1obQ9ZfIAuXa6kiup7TOR/fQMCPRNP8sEkpPdAoGAbKUEe2jWAa4DTPRtxTM9iHBHiivoMQf7SR8P6NzRUt7XWlen73Wg8kzcpsdpv4kx355ypTDSt60htCUDuqk0lt7mPm+YkZe6XEoboeiIh6qGzco3EExnbEVNDocQurZH2t4e3VpMSEgiV53WBkjdcZ0fU+S5KOMSZkMuyOCISvECgYEAmDePruy6BmAqjl/q07GbsNhQouIguN+/5KrMdZeqjyVs4+m839PN0ZPjFGY0lH5KXC2XVF0NCVzlpjwK52gxwIVjUDC42Yoo+Z4muxbN3m+UHW07DqR3ADPf8CP0Kc4zgx8lgJNNIpFIrFZFgW0alVDP1p/OMYBuUJlZX6K6aYI=",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID
		'app_id' => "2021001184670643",

		//支付通知地址
		'notify_url' => "http://你的网站域名/notify_url.php",
		
		//手机支付页面显示的客服QQ，留空则不显示。建议填写（写到双引号里面）
		'contactqq' => " ",
		
		//支付宝账单里显示的商品说明，可以修改（比如改成你的产品名称或者联系方式等）
		'subjectname' => "853766587",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);