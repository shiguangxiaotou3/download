## Google Translate Client

#### 下载

```sh
composer require google/cloud-translate
```

#### 构造方法

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
```

#### $config 配置项

| 键 | 类型 | 默认值 | 说明 |
|---|----|-----|----|
| apiEndpoint | string |  | 具有可选端口的主机名，用于代替服务的默认端点 |
| key | string |  | 公共API访问密钥 |
| target | string | en | 要分配给客户端的目标语言。必须是有效的ISO 639-1语言代码。默认为"en"（英语） |
| authCache | object |  | 用于存储访问令牌的缓存。默认为简单的内存实现。 |
| authCacheOptions | array |  | 缓存配置选项 |
| authHttpHandler | callable |  | 一种处理程序，用于传递专门用于身份验证的Psr7请求 |
| credentialsFetcher | object |  | 凭据获取器实例 |
| httpHandler | callable |  | 用于传递Psr7请求的处理程序。仅对通过REST发送的请求有效 |
| keyFile | array |  | 从Google开发者控制台检索到的服务帐户凭据.json文件的内容。例如：`json_decode(file_get_contents($path),true)` |
| keyFilePath | string |  | Google开发者控制台检索到的服务帐户凭据.json文件的完整路径 |
| requestTimeout | float | REST:0 gRPC:60 | 请求超时前等待的秒数.REST默认为:0,gRPC默认为:60 |
| retries | int | 3 | 失败请求的重试次数。默认为3 |
| scopes | array |  | 用于请求的范围 |
| quotaProject | string |  | 指定要为与请求关联的访问费用计费的用户项目 |

#### 语言检测

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
$result = $translate->detectLanguage('Hello world!');
var_dump($result);
```

##### 返回

```json
{
  "languageCode": "en",
  //语言编码 
  "input": "Hello world!",
  //检测语言
  "confidence": 0.75532191991806
  //可信度的
}
```

### 批量检测语言

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
$results = $translate->detectLanguageBatch([
    'Hello World!',
    'My name is David.'
]);
foreach ($results as $result) {
    var_dump($result);
}
```

##### 返回

```json
{
  "languageCode": "en",
  "input": "Hello world!",
  "confidence": 0.75532191991806
},
{
"languageCode": "en", //语言编码 
"input": "Hello world!", //检测语言
"confidence": 0.75532191991806    //可信度的
}
```

#### 获取所有支持的语言, ISO 639-1 语言代码列表

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
$languages = $translate->languages();
foreach ($languages as $language) {
    echo $language;
}
```

##### 返回

```json
[
  "af",
  "ak",
  "am",
  "ar",
  "as",
  "ay",
  "az",
  "be",
  "bg",
  "bho",
  "bm",
  "bn",
  "bs",
  "ca",
  "ceb",
  "ckb",
  "co",
  "cs",
  "cy",
  "da",
  "de",
  "doi",
  "dv"
]
```

#### 获取支持的语言

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
$languages = $translate->localizedLanguages();
$arr=[];
foreach ($languages as $language) {
    $arr[] = $language;
}
```

##### 返回

```json
[
  {
    "code": "af",
    "name": "Afrikaans"
  },
  {
    "code": "ak",
    "name": "Akan"
  },
  {
    "code": "sq",
    "name": "Albanian"
  }
]
```

#### 将字符串从一种语言翻译成另一种语言

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
$options=[
    "source"=>"en",
    "target"=>"zh-CN",
    "format"=>"text"
];
$result = $translate->translate('Hello world!',$options);
var_dump($result);
```

##### $options 配置项

| 键 | 类型 | 默认值 | 说明 |
|---|----|-----|----|
| **string** | string |  | 要翻译的字符串 |
| options<br />↳source |  |  | 要翻译的源语言(ISO 639-1),如果未提供，服务器将自动检测该值 |
| options<br />↳ target |  | en | 要翻译成的目标语言(ISO 639-1) |
| options<br />↳ format |  | html/text | 指示要翻译的字符串是纯文本还是 HTML |
| options<br />↳ model |  |  | 用于翻译请求的模型 |

##### 返回

```josn
{
  "source"=> "en",
  "input"=>"Hello world!",
  "text"=>"你好世界！",
  "model"=>NULL,
}
```

#### 将多个字符串从一种语言翻译成另一种语言

```php
use Google\Cloud\Translate\V2\TranslateClient;
$translate = new TranslateClient(["key"=>"asdasdas"]);
$options=[
    "source"=>"en",
    "target"=>"zh-CN",
    "format"=>"text"
];
$results = $translate->translate(
    ['Hello world!','My name is David.'],
    $options
);
$arr=[];
foreach ($results as $result) {
    $arr[] = $result)
}
var_dump($arr);
```

##### 返回

```josn
[{
  "source"=> "en",
  "input"=>"Hello world!",
  "text"=>"你好世界！",
  "model"=>NULL,
},
{
  "sourcejk"=> "en",
  "input"=>"Hello world!",
  "text"=>"你好世界！",
  "model"=>NULL,
}]
```