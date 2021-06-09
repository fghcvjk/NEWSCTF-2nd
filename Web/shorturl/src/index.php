<?php
error_reporting(E_ALL);

ini_set('log_errors', true);
ini_set('error_log', '/tmp/php-errors.log');
define('ROOT_PATH', __DIR__);
define('CACHE_TYPE', 'file');// 支持REDIS OR FILE
define('CACHE_DIR', 'cache');// FILE模式下缓存目录
define('IS_HTTPS', false);//是否HTTPS
define('VIEW_PATH', 'view');//视图模板目录
define('PASS', true);// 访问许可
// --- 语言相关  ---//
$lang_package = [
    'en' => [
    ],
    'zh' => [
        'GENERATE'             => '生成',
        'GENERATE SHORT URL'   => '生成短网址',
        'Quickly generate URL' => '快速生成URL',
        'Enter URL link'       => '输出URL链接',
        'Generate'             => '生成',
        'normal'               => '原始',
        'no referer'           => '无Referer',
        'encrypt redirect'     => '加密跳转',
        'Fake page'            => '伪装页面',
        'redirect once'        => '阅后即焚',
        'password access'      => '密码访问',
        'whisper text'         => '附加图文',
        'PC access only'       => '仅限PC访问',
        'Mobile access only'   => '仅限手机访问',

        'Jump directly to the website'                                        => '直接跳转到目标网站',
        'No Referer parameter'                                                => '无 Referer 参数，目标网站无法获取来源站地址',
        'Encrypted access, anti-crawler'                                      => '加密跳转参数信息，反大部分爬虫抓取探测',
        'Use random news, forums, product website information to fool robots' => '使用随机信息、论坛、商品来骗过机器人爬虫',
        'Jump only once'                                                      => '一次性跳转(阅后即焚)',
        'Password required'                                                   => '将为你生成密码，访问时需要密码验证',
        'Append rich text information'                                        => '附加富文本信息，您可以在此留言并分享给您的其他社交媒体用户',
        'Only PC users can access this page'                                  => '仅限PC用户访问该地址',
        'Only Mobile users can access this page'                              => '仅限手机用户访问该地址',
        'mainland China access only'                                          => '仅限非中国大陆访问',
        'Non-mainland China access only'                                      => '仅限中国大陆访问',

        'Access only to users in mainland China'          => '仅限中国大陆用户访问',
        'Only access users who are not in mainland China' => '仅限非中国大陆用户访问',

        'This site generates a total of :url_record_history links，Currently active :url_active_history' => '当前站点历史生成链接:url_record_history个，当前有效:url_active_history个',

        'Password verification failed'                  => '密码验证失败',
        'Wrong encode_type parameter'                   => '错误的 encode_type 参数',
        'url cannot be empty'                           => 'URL不能为空',
        'Too much content'                              => '内容太多',
        'Link created successfully'                     => '链接创建成功',
        'Links can only be accessed via mobile devices' => '该链接只能通过手机移动设备访问',
    ],
    'ja' => [
        'GENERATE'                       => '生成',
        'GENERATE SHORT URL'             => '短いURLを生成する',
        'Quickly generate URL'           => 'URLをすばやく生成する',
        'Enter URL link'                 => 'URLリンクを入力します',
        'Generate'                       => '生成',
        'normal'                         => 'デフォルト',
        'no referer'                     => '「Referer」パラメータなし',
        'encrypt redirect'               => '暗号化されたアクセス',
        'Fake Page'                      => '偽のウェブページ',
        'redirect once'                  => '1回限りの訪問',
        'password access'                => 'パスワードの検証',
        'whisper text'                   => '追加テキスト',
        'PC access only'                 => 'PCアクセスのみ',
        'Mobile access only'             => 'モバイルアクセスのみ',
        'mainland China access only'     => '中国本土以外のユーザーに限定',
        'Non-mainland China access only' => '中国本土のユーザーのみがアクセス可能',

        'Jump directly to the website'                                        => 'ターゲットのWebサイトに直接ジャンプします',
        'No Referer parameter'                                                => '「Referer」パラメータがないと、ターゲットWebサイトは送信元ステーションのアドレスを取得できません',
        'Encrypted access, anti-crawler'                                      => '暗号化されたジャンプパラメータ情報、ほとんどのクローラーの検出防止',
        'Use random news, forums, product website information to fool robots' => 'ロボットを欺くためにランダムなニュース、フォーラム、製品のウェブサイト情報を生成する',
        'Jump only once'                                                      => 'リンクには一度しかアクセスできず、非常に安全です',
        'Password required'                                                   => 'リンクのパスワードを生成し、アクセス時に確認します',
        'Append rich text information'                                        => 'テキストメッセージを残すことができます',
        'Only PC users can access this page'                                  => 'このアドレスにアクセスできるのはPCユーザーのみです',
        'Only Mobile users can access this page'                              => 'このアドレスにアクセスできるのは携帯電話ユーザーのみです',

        'Access only to users in mainland China'          => '中国本土のユーザーのみがアクセス可能',//このウェブサイトは中国本土でのみアクセスできます
        'Only access users who are not in mainland China' => '中国本土以外のユーザーに限定',

        'This site generates a total of :url_record_history links，Currently active :url_active_history' => '現在のサイト履歴生成リンク:url_record_historyつのリンク、現在有効:url_active_historyつのリンク',

        'Password verification failed'                  => 'パスワードの確認に失敗しました',
        'Wrong encode_type parameter'                   => '間違ったencode_typeパラメータ',
        'url cannot be empty'                           => 'URLを空にすることはできません',
        'Too much content'                              => 'コンテンツが多すぎます',
        'Link created successfully'                     => 'リンクが正常に作成されました',
        'Links can only be accessed via mobile devices' => 'リンクにはモバイルデバイス経由でのみアクセスできます',
    ]
];

function get_lang()
{
    $locale = 'en';
    $http_accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    preg_match_all("/([[:alpha:]]{1,8})(-([[:alpha:]|-]{1,8}))?" .
        "(\s*;\s*q\s*=\s*(1\.0{0,3}|0\.\d{0,3}))?\s*(,|$)/i",
        $http_accept_language, $hits, PREG_SET_ORDER);
    if (isset($hits[0])) {
        $locale = $hits[0][1];
    }
    return $locale;
}

function __($name, $_vars = [])
{
    global $lang_package;
    $locale = get_lang();
    if (!isset($lang_package[$locale])) {
        $locale = 'en';
    }
    if (!isset($lang_package[$locale][$name])) {
        $locale = 'en';
    }
    $text = $lang_package[$locale][$name] ?? $name;
    foreach ($_vars as $name => $value) {
        $text = str_replace(":$name", $value, $text);
    }
    return $text;
}

function call_func($obj,$func,$params){
    global $res;
    $a = new $obj($func,$params);
    unset($a);
    return $res;
}
function check_admin()
{
    $allow = array('127.0.0.1','localhost');
    if(!in_array($_SERVER['HTTP_HOST'],$allow)){
        die('error');
    }
}
//--- 缓存相关 ---//
class Cache
{
    public $func;
    public $params;
    public $engine = CACHE_TYPE;
    public $dir = __DIR__ . DIRECTORY_SEPARATOR . CACHE_DIR;

    function __construct($func,$params) {
        $this->func = $func;
        $this->params = $params;
    }
    function getCacheType()
    {
        global $res;
        if (!in_array(CACHE_TYPE, ['file', 'redis'])) {
            $this->engine = 'file';
        }
        $res =  strtolower($this->engine);
        return $res;
    }

    function putCache($name, $value)
    {

        if ($this->engine == 'file') {
            file_put_contents($this->dir . DIRECTORY_SEPARATOR . $name . '.data', serialize($value));
        } else if ($this->engine == 'redis') {

        }
    }

    function hasCache($name)
    {   
        global $res;
        $engine = $this->getCacheType();
        if ($engine == 'file') {
            $res = is_file($this->dir . DIRECTORY_SEPARATOR . $name . '.data');
            return $res;
        } else if ($engine == 'redis') {

        }
        $res = false;
        return $res;
    }

    function getCache($name)
    {
        global $res;
        $engine = $this->getCacheType();
        if ($engine == 'file') {
            $dir = __DIR__ . DIRECTORY_SEPARATOR . CACHE_DIR;
            if (!is_dir($dir)) {
                @mkdir($dir);
            }
            $data = @file_get_contents($dir . DIRECTORY_SEPARATOR . $name . '.data');
            if (preg_match('/\|/i', $data)){
                $data = explode("|",$data);
                $res = array(unserialize($data[0]),unserialize($data[1]));
                return $res;
             }
            else{
                $res = array(unserialize($data));
                return $res;
            }
        } else if ($engine == 'redis') {

        }
    }

    function clearCache($name = null)
    {
        global $res;
        global $cache_expire;
        $currentTime = time();
        $count = 0;
        $engine = $this->getCacheType();
        if ($engine == 'file') {
            $dir = __DIR__ . DIRECTORY_SEPARATOR . CACHE_DIR;

            if ($name == null) {
                $list = scandir($dir);
                foreach ($list as $file) {
                    if ($file == '.' or $file == '..' or !preg_match('/^(url|request)_/i', $file))
                        continue;
                    $path = $dir . DIRECTORY_SEPARATOR . $file;
                    if ($currentTime - filemtime($path) > $cache_expire) {
                        if (preg_match('/^((url|request)_[A-z0-9]+)\.[A-z]+$/', $file, $matches)) {
                            $cache = $this->getCache($matches[1])[0];
                            unlink($path) && $count++;
                        }
                    }
                }
            } else {
                $path = $dir . DIRECTORY_SEPARATOR . $name . '.data';
                @unlink($path);
            }

        }
        $res = $count;
        return $res;
    }
    function __destruct(){
        call_user_func_array(array($this,$this->func), $this->params);
    }
}

class Url{
//--- URL转换相关 ---//
    public $func;
    public $params;
    public $strs = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";

    function __construct($func,$params) {
        $this->func = $func;
        $this->params = $params;
    }
    function getRandStr($len)
    {
        global $res;
        $value = '';
        while (strlen($value) < $len) {
            $value .= substr(str_shuffle($this->strs), mt_rand(0, strlen($this->strs) - 11), $len);
        }
        $res = substr($value, 0, $len);
        return $res;
    }

    function urlHash()
    {   
        global $res;
        $hash = $this->getRandStr(5);
        while (call_func('Cache','hasCache',array('url_' . $hash))) {
            $hash = $this->getRandStr(5);
        }
        $res = $hash;
        return $res;
    }

    /**
     * 映射URL和HASH关系
     *
     * @param $url
     * @param $encrypt_type
     * @param $extent
     * @return bool|string
     */
    function urlToHash($url, $encrypt_type, $extent)
    {   
        global $res;
        $hash = $this->urlHash();
        call_func('Cache','putCache',array('url_' . $hash, ['url' => $url, 'encrypt_type' => $encrypt_type, 'extent' => $extent]));
        $res = $hash;
        return $res;
    }

    /**
     * 从HASH中还原URL
     *
     * @param $hash
     * @return mixed|string
     */
    function hashToUrl($hash)
    {
        global $res;
        if (call_func('Cache','hasCache',array('url_' . $hash))) {
            $url = call_func('Cache','getCache',array('url_' . $hash))[0];
        }
        $res = $url ?? '';
        return $res;
    }
    function __destruct(){
        call_user_func_array(array($this,$this->func), $this->params);
    }
}
/**
 * URL转短链接
 *
 * @param $url
 * @param string $encrypt_type
 * @param string $extent
 * @return string
 */
function urlToShort($url, $encrypt_type = 'encrypt', $extent = '')
{
    if (!preg_match('/^[A-z]+:\/\//i', $url)) {
        $url = 'http://' . $url;
    }
    $id = call_func('Url','urlToHash',array($url, $encrypt_type, $extent));
    $shortUrl = sprintf('%s://%s/%s/%s', IS_HTTPS ? 'https' : 'http', $_SERVER['HTTP_HOST'], 'index.php/s', $id);
    call_func('Record','changeUrlRecord',array($url));
    return ($shortUrl);
}

/**
 * 自增统计URL生成次数
 *
 * @param $url
 */
class Record{
    public $func;
    public $params;

    function __construct($func,$params) {

       $this->func = $func;
       $this->params = $params;

    }
    function changeUrlRecord($url)
    {   
        global $files;
        if (!call_func('Cache','hasCache',array('manage'))){
            $cache = array($url=>1);
            call_func('Cache','putCache',array('manage', $cache));
        }
        else{
            $url_count=0;
            $list = scandir('cache');
            foreach ($list as $file) {
                if (preg_match('/^url_/i', $file))
                   $url_count++;
            }
            if($url_count>1){
                $cache = call_func('Cache','getCache',array('manage'))[0];
                $ord_cache = call_func('Cache','getCache',array('manage'))[1];
                $cache[$url] = isset($cache[$url]) ? $cache[$url] + 1 : 1;
                file_put_contents('cache/manage.data',serialize($cache).'|'.serialize($ord_cache));
            }
            else{
                //处理旧数据并添加url记录
                $data = call_func('Cache','getCache',array('manage'));
                if (count($data)>1){
                    $ord_cache = $data[1];
                    $cache = $data[0];
                    foreach ($cache as $key => $value) {
                        $ord_cache[$key] = isset($ord_cache[$key]) ? $ord_cache[$key] + $value : $value;
                    }
                }
                else{
                    $ord_cache  = unserialize($data[0]);
                }
                $cache=array($url=>1);
                file_put_contents('cache/manage.data',serialize($cache).'|'.serialize($ord_cache));
                //增加历史记录
                $urls = file_get_contents($files);
                if (!strstr($urls,$url)){
                    file_put_contents($files,$urls.'|'.$url);
                }
            }
        }
    }

    function getUrlRecord($url = false)
    {
        global $res;
        $count = 0;
        $cache = [];
        if (call_func('Cache','hasCache',array('manage'))) {
            $cache = call_func('Cache','getCache',array('manage'))[0];
        }
        if ($url) {
            $count += $cache[$url];
        } else {
            foreach ($cache as $value) {
                $count += intval($value);
            }
        }
        $res = $count;
        return $res;
    }

    function cleanUrlRecord($url = false)
    {
        $cache = [];
        if (call_func('Cache','hasCache',array('manage'))) {
            $cache = call_func('Cache','getCache',array('manage'))[0];
        }
        if ($url) {
            unset($cache[$url]);
        } else {
            $cache = [];
        }
        call_func('Cache','putCache',array('manage', $cache));
    }
    function __destruct(){
        call_user_func_array(array($this,$this->func), $this->params);
    }
}

//--- 加密相关 ---//
class Enc{
    public $func;
    public $params;

    function __construct($func,$params) {
       $this->func = $func;
       $this->params = $params;
    }

    function charCodeAt($str, $index)
    {
        global $res;
        $char = mb_substr($str, $index, 1, 'UTF-8');
        if (mb_check_encoding($char, 'UTF-8')) {
            $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
            $res = hexdec(bin2hex($ret));
            return $res;
        } else {
            $res = null;
            return $res;
        }
    }

    function uchr($codes)
    {
        global $res;
        if (is_scalar($codes)) $codes = func_get_args();
        $str = '';
        foreach ($codes as $code) {
            $buf = html_entity_decode('&#' . $code . ';', ENT_NOQUOTES, 'UTF-8');
            $buf == '&#' . $code . ';' && ($buf = mb_convert_encoding('&#' . intval($code) . ';', 'UTF-8', 'HTML-ENTITIES'));
            $str .= $buf;
        }
        $res = $str;
        return $res;
    }

    function aaEncode($javascript=null)
    {
        global $res;
        $b = [
            "(c^_^o)",
            "(ﾟΘﾟ)",
            "((o^_^o) - (ﾟΘﾟ))",
            "(o^_^o)",
            "(ﾟｰﾟ)",
            "((ﾟｰﾟ) + (ﾟΘﾟ))",
            "((o^_^o) +(o^_^o))",
            "((ﾟｰﾟ) + (o^_^o))",
            "((ﾟｰﾟ) + (ﾟｰﾟ))",
            "((ﾟｰﾟ) + (ﾟｰﾟ) + (ﾟΘﾟ))",
            "(ﾟДﾟ) .ﾟωﾟﾉ",
            "(ﾟДﾟ) .ﾟΘﾟﾉ",
            "(ﾟДﾟ) ['c']",
            "(ﾟДﾟ) .ﾟｰﾟﾉ",
            "(ﾟДﾟ) .ﾟДﾟﾉ",
            "(ﾟДﾟ) [ﾟΘﾟ]"
        ];
        $r = "ﾟωﾟﾉ= /｀ｍ´）ﾉ ~┻━┻   //*´∇｀*/ ['_']; o=(ﾟｰﾟ)  =_=3; c=(ﾟΘﾟ) =(ﾟｰﾟ)-(ﾟｰﾟ); ";
        if (preg_match('/ひだまりスケッチ×(365|３５６)\s*来週も見てくださいね[!！]/', $javascript)) {
            $r .= "X=_=3; ";
            $r .= "\r\n\r\n    X / _ / X < \"来週も見てくださいね!\";\r\n\r\n";
        }
        $r .= "(ﾟДﾟ) =(ﾟΘﾟ)= (o^_^o)/ (o^_^o);" .
            "(ﾟДﾟ)={ﾟΘﾟ: '_' ,ﾟωﾟﾉ : ((ﾟωﾟﾉ==3) +'_') [ﾟΘﾟ] " .
            ",ﾟｰﾟﾉ :(ﾟωﾟﾉ+ '_')[o^_^o -(ﾟΘﾟ)] " .
            ",ﾟДﾟﾉ:((ﾟｰﾟ==3) +'_')[ﾟｰﾟ] }; (ﾟДﾟ) [ﾟΘﾟ] =((ﾟωﾟﾉ==3) +'_') [c^_^o];" .
            "(ﾟДﾟ) ['c'] = ((ﾟДﾟ)+'_') [ (ﾟｰﾟ)+(ﾟｰﾟ)-(ﾟΘﾟ) ];" .
            "(ﾟДﾟ) ['o'] = ((ﾟДﾟ)+'_') [ﾟΘﾟ];" .
            "(ﾟoﾟ)=(ﾟДﾟ) ['c']+(ﾟДﾟ) ['o']+(ﾟωﾟﾉ +'_')[ﾟΘﾟ]+ ((ﾟωﾟﾉ==3) +'_') [ﾟｰﾟ] + " .
            "((ﾟДﾟ) +'_') [(ﾟｰﾟ)+(ﾟｰﾟ)]+ ((ﾟｰﾟ==3) +'_') [ﾟΘﾟ]+" .
            "((ﾟｰﾟ==3) +'_') [(ﾟｰﾟ) - (ﾟΘﾟ)]+(ﾟДﾟ) ['c']+" .
            "((ﾟДﾟ)+'_') [(ﾟｰﾟ)+(ﾟｰﾟ)]+ (ﾟДﾟ) ['o']+" .
            "((ﾟｰﾟ==3) +'_') [ﾟΘﾟ];(ﾟДﾟ) ['_'] =(o^_^o) [ﾟoﾟ] [ﾟoﾟ];" .
            "(ﾟεﾟ)=((ﾟｰﾟ==3) +'_') [ﾟΘﾟ]+ (ﾟДﾟ) .ﾟДﾟﾉ+" .
            "((ﾟДﾟ)+'_') [(ﾟｰﾟ) + (ﾟｰﾟ)]+((ﾟｰﾟ==3) +'_') [o^_^o -ﾟΘﾟ]+" .
            "((ﾟｰﾟ==3) +'_') [ﾟΘﾟ]+ (ﾟωﾟﾉ +'_') [ﾟΘﾟ]; " .
            "(ﾟｰﾟ)+=(ﾟΘﾟ); (ﾟДﾟ)[ﾟεﾟ]='\\\\'; " .
            "(ﾟДﾟ).ﾟΘﾟﾉ=(ﾟДﾟ+ ﾟｰﾟ)[o^_^o -(ﾟΘﾟ)];" .
            "(oﾟｰﾟo)=(ﾟωﾟﾉ +'_')[c^_^o];" .
            "(ﾟДﾟ) [ﾟoﾟ]='\\\"';" .
            "(ﾟДﾟ) ['_'] ( (ﾟДﾟ) ['_'] (ﾟεﾟ+";
        $r .= "(ﾟДﾟ)[ﾟoﾟ]+ ";

        for ($i = 0; $i < mb_strlen($javascript); $i++) {
            $n = $this->charCodeAt($javascript, $i);
            $t = "(ﾟДﾟ)[ﾟεﾟ]+";
            if ($n <= 127) {
                $t .= preg_replace_callback('/[0-7]/', function ($c) use ($b) {
                    return $b[$c[0]] . "+ ";
                }, ((string)decoct($n)));
            } else {
                if (preg_match('/[0-9a-f]{4}$/', '000' . ((string)dechex($n)), $result)) {
                    $m = $result[0];
                } else {
                    $m = '';
                }
                $t .= "(oﾟｰﾟo)+ " . preg_replace_callback('/[0-9a-f]/i', function ($c) use ($b) {
                        return $b[hexdec($c[0])] . "+ ";
                    }, $m);
            }
            $r .= $t;
        }

        $r .= "(ﾟДﾟ)[ﾟoﾟ]) (ﾟΘﾟ)) ('_');";
        $res = $r;
        return $res;

    }
    function __destruct() {
        return call_user_func_array(array($this,$this->func), $this->params);
    }
}
//--- IP 段相关 ---//

/**
 * 判断IP是否大陆
 * https://raw.githubusercontent.com/ym/chnroutes2/master/chnroutes.txt 下载与根目录
 *
 * @param $ip
 * @return bool
 */
function ip_is_china($ip)
{
    $path = ROOT_PATH . '/chnroutes.txt';
    if (is_file($path)) {
        $ipInt = ip2long($ip);
        $fh = fopen($path, 'r') or exit("Unable to open file chnroutes.txt !");;
        while (!feof($fh)) {
            $ipSegment = fgets($fh);
            if (substr($ipSegment, 0, 1) == '#') {
                unset($ipSegment);
                continue;
            }
            list($ipBegin, $type) = explode('/', $ipSegment);
            $ipBegin = ip2long($ipBegin);
            $mask = 0xFFFFFFFF << (32 - intval($type));
            if (intval($ipInt & $mask) == intval($ipBegin & $mask)) {
                unset($raw);
                fclose($fh);
                return true;
            }
            unset($raw);
        }
        fclose($fh);
    }
    return false;
}

//--- Response 相关 ---//

function json($msg, $code = 200, $data = [])
{
    $format = [
        'msg'  => $msg,
        'code' => $code,
        'data' => $data
    ];
    return json_encode($format, JSON_UNESCAPED_UNICODE);
}

function view($name, $vars = [])
{
    $path = ROOT_PATH . DIRECTORY_SEPARATOR . VIEW_PATH . DIRECTORY_SEPARATOR . $name . '.php';
    extract($vars);
    @include $path;
}

function abort($status = 404)
{
    $path = ROOT_PATH . DIRECTORY_SEPARATOR . $status . '.html';
    if (is_file($path)) {
        @include path;
    } else {
        echo $status;
    }
    die();
}

function route($uri, Closure $_route)
{
    $pathInfo = $_SERVER['PATH_INFO'] ?? ($_SERVER['REQUEST_URI'] ?? '/');
    $pathInfo = preg_replace('/\?.*?$/is', '', $pathInfo);
    if (preg_match('#^' . $uri . '$#', $pathInfo, $matches)) {
        $_route($matches);
        exit(0);
    }
}

function makeRedirectJs($url, $time = 500)
{
    $javascript = 'setTimeout(function(){location.href="{{url}}"},{{time}});';
    $javascript = str_replace('{{url}}', $url, $javascript);
    $javascript = str_replace('{{time}}', $time, $javascript);
    return $javascript;
}

function makeReturnJs($code, $time = 500)
{
    $javascript = "(function(){return window.atob('{{code}}');})();";
    $javascript = str_replace('{{code}}', base64_encode($code), $javascript);
    return $javascript;
}

/**
 * 获取随机假页面
 * @return string
 */
function getFakePage($url)
{

    if (!preg_match('/^https?:\/\//i', $url)) {
        die('error');
    }
    if(preg_match('/locall|127\.0\.0\.|0\.0\.0\.0/i', $url)){
        die('error');
    }
    $path = ROOT_PATH . DIRECTORY_SEPARATOR . '/cache/html_' . md5($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $res = curl_exec($ch);
    curl_close($ch);
    file_put_contents($path, $res);

    return $res;
}

/**
 * 给访客响应短链接跳转
 * @param string $url
 * @param array $encrypt_type
 * @param string $hash
 * @param array $extent
 */
function redirect($url, array $encrypt_type, $hash, array $extent = [])
{
    if (in_array('normal', $encrypt_type))
        header('Location: ' . $url);
    else {
        // no referer 默认必须附加
        $referer = "";
        $once = false;// 是否一次访问
        $script = '<script type="text/javascript">setTimeout(function(){location.href="{{url}}"},500);</script>';
        $script = str_replace('{{url}}', $url, $script);
        $title = 'web redirection...';
        $request_id = call_func('Url','getRandStr',array(20));
        $page_html = "";
        $is_auth = false;
        $is_middle_page = false;
        if (in_array('dynamic', $encrypt_type)) {
            $referer = '<meta name="referrer" content="no-referrer" />';
        }

        // 判断是否一次访问(一次访问必须为异步加载，否则由于网速慢或者访客多次刷新导致错误计算)
        if (in_array('once', $encrypt_type)) {
            $once = true;
        }

        //判断是否需要加密
        $javascript = "";
        if (in_array('encrypt', $encrypt_type)) {
            $script = '<script src="/request/{{request_id}}" type="text/javascript" charset="utf-8"></script>';
            $javascript = makeRedirectJs($url);
            $script = str_replace('{{request_id}}', $request_id, $script);
        }

        $html = '<!DOCTYPE html><html><head><meta charset="utf-8"><title>{{title}}</title>{{referer}}</head><body>{{script}}</body></html>';
        $html = str_replace('{{title}}', $title, $html);
        $html = str_replace('{{referer}}', $referer, $html);
        $html = str_replace('{{script}}', $script, $html);

        //判断是否需要密码访问
        if (in_array('password', $encrypt_type)) {
            // 密码访问则清空script，否则会跳转
            $script = '';
            $is_auth = true;
            $is_middle_page = true;
        }

        //判断是否需要附加图文
        $whisper = $whisper_head = $whisper_body = '';
        if (in_array('whisper', $encrypt_type)) {
            // 图文则清空script，否则会跳转
            $script = '';
            $is_middle_page = true;
        }
        //判断是否仅限大陆访问
        if (in_array('china_only', $encrypt_type)) {
            $ip = $_SERVER['REMOTE_ADDR'];
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
            }
            if (!ip_is_china($ip)) {
                exit(__('Access only to users in mainland China'));
            }
        }

        //判断是否仅限非大陆访问
        if (in_array('non_china_only', $encrypt_type)) {
            $ip = $_SERVER['REMOTE_ADDR'];
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
            }
            if (ip_is_china($ip)) {
                exit(__('Only access users who are not in mainland China'));
            }
        }

        $iv = 'fb57789c1a994622';
        $mobile_list = array(
            0 => 'bf04f7f36555cb565f4ffd92a2361e7c',
            1 => '867e57bd062c7169995dc03cc0541c19',
            2 => 'd3cd8888c2c901914e06c8a19e440cc4',
            3 => '820d75c403bc050dfd71763759c9bad5',
        );
        $pc_list = array(
            0 => '4c8be35e5fe3d8471f378a69f74c0ab6',
            1 => 'a99913111481b4f0bcb70e08e3e99405',
            2 => '615c44ade81b52dff685ad7e4add7010',
        );
        $encrypt_request = [];
        // 判断是否手机访问
        if (in_array('mobile_only', $encrypt_type)) {
            $method = 'AES-128-CBC';//加密方法
            $encrypt_request = [];
            foreach ($mobile_list as $mobileId) {
                $encrypt_request [] = openssl_encrypt($request_id, $method, substr($mobileId, 8, 16), 0, $iv);
            }
            $script = "";
            $is_middle_page = true;
        }

        //判断是否PC访问
        if (in_array('pc_only', $encrypt_type)) {
            $method = 'AES-128-CBC';//加密方法
            $encrypt_request = [];
            foreach ($pc_list as $pcId) {
                $encrypt_request [] = openssl_encrypt($request_id, $method, substr($pcId, 8, 16), 0, $iv);
            }
            $script = "";
            $is_middle_page = true;
        }


        // 默认均需要展示此页面
        ob_start();
        $data = ['request_id' => $request_id, 'is_auth' => $is_auth, 'encrypt_request' => implode(',', $encrypt_request), "is_middle_page" => $is_middle_page];
        view('whisper', $data);
        $whisper = ob_get_clean();
        if (preg_match('#<head>(.*?)<\/head>#is', $whisper, $matches)) {
            $whisper_head = $matches[1];
        }
        if (preg_match('#<body>(.*?)<\/body>#is', $whisper, $matches)) {
            $whisper_body = $matches[1];
        }
        //判断是否需要伪装页面
        if (in_array('fake_page', $encrypt_type)) {
            $page_html = getFakePage($extent['fake_page']);
            // 清空jquery
            $page_html = preg_replace('#<script[^(src)]+src=".*?jquery.*?"[^>]*>[^<]*</script>#is', '', $page_html);

            //清空手机端跳转判断
            $page_html = preg_replace('#jump_mobile\(\);#is','', $page_html);

            $page_html = preg_replace_callback('#<head>(.*?)<\/head>#is', function ($matches) use ($referer, $script, $whisper_head) {
                $whisper_head = preg_replace('#<title>.*?</title>#is', '', $whisper_head);// 清空title
                return "<head>{$referer}\n{$script}\n{$whisper_head}\n{$matches[1]}</head>";
            }, $page_html);
            $page_html = preg_replace_callback('#<body[^>]+>(.*?)<\/body>#is', function ($matches) use ($referer, $script, $whisper_body) {
                return "<body>{$whisper_body}\n{$matches[1]}</body>";
            }, $page_html);
            $whisper = $page_html;
            $is_middle_page = true;
        }

        if ($is_middle_page) {
            $html = $whisper;
        }

        $js = call_func('Enc','aaEncode',array($javascript));

            
        call_func('Cache','putCache',array('request_' . $request_id, ['js' => $js, 'hash' => $hash, 'clean' => $once]));

        if($once){
            call_func('Cache','clearCache',array('url_' . $hash));
        }
        echo $html;
    }
}

function responseJavascript($requestId)
{   
    $name = 'request_' . $requestId;
    $cache = call_func('Cache','getCache',array($name))[0];
    $is_middle_page = false;
    if (empty($cache)) {
        $javascript = 'alert("Invalid request")';
    } else {
        $javascript = $cache['js'] ?? '';
    }
    // 判断是否密码验证
    $data = call_func('Url','hashToUrl',array($cache['hash']));
    if (!is_array($data)) {
        return;
    }
    if (in_array('password', $data['encrypt_type'])) {
        if ($data['extent']['password'] != $_REQUEST['password'] ?? '') {
            echo json(__("Password verification failed"), 500, '');
            exit;
        } else {
            $javascript = call_func('Enc','aaEncode',array(makeRedirectJs($data['url'])));
        }

        $is_middle_page = true;

    }
    if (in_array('whisper', $data['encrypt_type'])) {
        $javascript = makeReturnJs(json_encode($data));
        $is_middle_page = true;
    }
    if (in_array('mobile_only', $data['encrypt_type'])) {
        $javascript = makeReturnJs(json_encode($data));
        $is_middle_page = true;
    }
    if (in_array('pc_only', $data['encrypt_type'])) {
        $javascript = makeReturnJs(json_encode($data));
        $is_middle_page = true;
    }

    // 判断是否需要中间页面
    if ($is_middle_page) {
        echo json('ok', 200, $javascript);
    } else {
        echo $javascript;
    }

    if (isset($cache['clean']) && $cache['clean'] == true) {
        call_func('Cache','clearCache',array('url_' . $cache['hash']));
    }
    call_func('Cache','clearCache',array($name));
}


//--- 入口逻辑  ---//
global $res;
$cache_expire=3600*24*7;
$files='cache'.DIRECTORY_SEPARATOR.'history.data';
$pathInfo = $_SERVER['PATH_INFO'] ?? ($_SERVER['REQUEST_URI'] ?? '/');
$pathInfo = preg_replace('/\?.*?$/is', '', $pathInfo);
foreach(array('_GET','_POST') as $_request){
    foreach ($$_request as $_k => $_v){
        if(preg_match("/SESSION|SEVER|COOKIE/i", $_k,$matches)){
            die('error');
        }
        if (preg_match("/data|file|glob|input|zip|dict|flag|%/i", $_v,$matches)){
            die('error');
        }
        ${$_k}=$_v;
    }
}
route('/', function () {
    view('welcome', ['time' => date('Ymd')]);
});
route("/s/([A-z0-9]+)", function ($matches) {
    $data = call_func('Url','hashToUrl',array($matches[1]));
    // 直接重定向

    $encrypt_type = ['normal'];
    $extent = [];
    if (!empty($data['url'])) {
        $url = $data['url'];
        $encrypt_type = $data['encrypt_type'];
        $extent = $data['extent'] ?? [];
    }
    empty($url) && $url = '/404';

    redirect($url, $encrypt_type, $matches[1], $extent);
});

route("/request/([A-z0-9]+)", function ($matches) {
    $request_id = $matches[1];
    responseJavascript($request_id);
});

route('/api/link', function ($matches) {
    global $url;
    global $encrypt_type;
    global $extent;
    $url = $url ?? '';
    $encrypt_type = $encrypt_type ?? '["normal"]';
    $extent = $extent ?? '[]';
    if (null == ($encrypt_type = json_decode($encrypt_type, true))) {
        $response = json(__('Wrong encode_type parameter'), 500);
    } else if (empty($url)) {
        $response = json(__('url cannot be empty'), 500);
    } else {
        $extent = json_decode($extent, true);
        $response = urlToShort($url, $encrypt_type, $extent ?? []);
        $response = json(__('Link created successfully'), 200, $response);
    }
    echo $response;
});

//仅限管理员清理
route('/api/clean', function () {
    check_admin();
    $count = call_func('Cache','clearCache',array());
    echo json(sprintf('clean %s files', $count), 200);
});

route('/404', function () {
    abort(404);
});

route('/flag', function () {
    echo $_SERVER['REMOTE_ADDR'].'</br>';
    $flaag = 'flag_'.md5($_SERVER['REMOTE_ADDR']);
    echo($flaag.'</br>');
    $list = scandir('cache');
        foreach ($list as $file) {
            if ($file ===  $flaag.'.data'&& strstr(file_get_contents($flaag.'.data'),$flaag)){
                system('/readflag');
            }
        }
});

?>
