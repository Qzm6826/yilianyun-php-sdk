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
  3. 授权类Lib/Oauth/YlyOauthClient.php，获取调用凭证AccessToken,每日上限次数２０次
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
$client = new YlyOauthClient($config);

//获取token
use App\Oauth\YlyOauthClient;
$token = $client->getToken();   //若是开放型应用请传授权码code
var_dump($token);

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