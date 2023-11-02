<h1 align="center">yilianyun-php-sdk</h1>
<p align="center">
<a href="https://travis-ci.org/Qzm6826/yilianyun-php-sdk"><img src="https://travis-ci.org/Qzm6826/yilianyun-php-sdk.svg?branch=master" alt="Build Status"></a>
</p>

# Requirement

```
PHP >= 5.4
```
# Installation

```shell
composer require yly-openapi/yly-openapi-sdk
```

# Usage
  1. 接口类Lib/Api/*.php，集成了所有的易联云接口
  2. 配置类Lib/Config/YlyConfig.php
  3. 授权类Lib/Oauth/YlyOauthClient.php，获取调用凭证AccessToken，每日上限次数２０次，２４小时后更新次数
  4. 接口调用类Lib/Protocol/YlyRpcClient.php，包括了md5工具函数，Sign工具函数，uuid函数，可以直接用这个类直接进行接口调用
  
```php
<?php
//composer下加载方式
include_once __DIR__ . "/vendor/autoload.php";

//gitHub下载加载方式
include_once __DIR__ . "/Lib/Autoloader.php";

//初始化配置
use App\Config\YlyConfig;
$config = new YlyConfig('你的应用id', '你的应用密钥');
//v2.0接口需设置请求域名
$config->setRequestUrl('https://open-api.10ss.net/v2');

//获取token
use App\Oauth\YlyOauthClient;
$client = new YlyOauthClient($config);
$token = $client->getToken();   //若是开放型应用请传授权码code
var_dump($token);

//授权打印机(自有型应用使用,开放型应用请跳过该步骤)
use App\Api\PrinterService;
$printer = new PrinterService($token->access_token, $config);
$data = $printer->addPrinter('你的机器码', '你的机器密钥', '机器昵称也可不填', 'gprs卡号没有可不填');
var_dump($data);

//调取文本打印
use App\Api\PrintService;
$print = new PrintService($token->access_token, $config);
$data = $print->index('你的机器码','打印内容排版可看Demo下的callback.php','你的系统内部id自定义32位以内');
var_dump($data);

//调取图形打印
use App\Api\PicturePrintService;
$print = new PicturePrintService($token->access_token, $config);
$data = $print->index('你的机器码','打印内容排版可看Demo下的callback.php','你的系统内部id自定义32位以内');
var_dump($data);

```

# ChangeLog
#### [v2.0.3]
* Release Date : 2023-11-01
1. [Feature]v2新增[K8推送开关设置](https://www.kancloud.cn/ly6886/oauth-api/3208323)接口。
2. [Feature]v2新增[K8高级设置](https://www.kancloud.cn/ly6886/oauth-api/3208324)接口。
#### [v2.0.1]
* Release Date : 2023-10-18
1. [Feature]v2更新[K8关键词设置](https://www.kancloud.cn/ly6886/oauth-api/3198288)接口。
#### [v2.0]
* Release Date : 2023-06-07
1. [Feature]更新接口v2.0版本，[文档](https://www.kancloud.cn/ly6886/oauth-api/3170299)
2. [Feature]v2新增[订单重打（单订单）](https://www.kancloud.cn/ly6886/oauth-api/3170332)接口。
3. [Feature]v2新增[面单取消](https://www.kancloud.cn/ly6886/oauth-api/3170326)

#### [v1.0.3]
1. 无
