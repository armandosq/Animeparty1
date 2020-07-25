<?php
error_reporting(0);

$fembedUrl = $_GET['url'];
$partSize = 3; //MB
$personalKey = 'sBBcAcKK123';  //Una clave para el token, la que quieran...

class xURL{
    public function __construct($cookies=NULL, $agent=NULL, $proxy=NULL){
        $this->resources = [];
        $this->SETOPT = array(
            'RETURNTRANSFER' => 1,
            'FOLLOWLOCATION' => 1,
            'SSL_VERIFYHOST' => 0,
            'SSL_VERIFYPEER' => 0,
            'CUSTOMREQUEST'  => 'GET',
        );
        $this->proxy = $proxy;
        if($cookies){
            $this->SETOPT['COOKIEJAR'] = $cookies;
            $this->SETOPT['COOKIEFILE'] = $cookies;
        }
        $this->SETOPT['USERAGENT'] = $agent;
    }

    public function cURLOPT($c=''){
        if(!$c) $c = $this->lastResource;
        curl_setopt_array($c, array_combine(array_map(function($k){ return constant('CURLOPT_'.$k); }, array_keys($this->SETOPT)), $this->SETOPT));
        return $this;
    }

    public function cURL($o=''){
        $this->lastResource = curl_init();
        if(!$this->firstResource) $this->firstResource = $this->lastResource;
        if($this->proxy){
            $proxyData = array_flip(explode('@', $this->proxy));
            $this->SETOPT['PROXY'] = $proxyData[0];
            if($pD[1]) $this->SETOPT['PROXYUSERPWD'] = $proxyData[1];
            if($this->URL) $this->SETOPT['URL'] = $this->URL;
            if(!$this->SETOPT['PROXYTYPE']) $this->SETOPT['PROXYTYPE'] = 'HTTP';
        }
        if($o) $this->ADDOPT($o);
        if(@$this->httpHeaders) curl_setopt($c, CURLOPT_HTTPHEADER, $this->httpHeaders);
        $this->resources[] = $this->lastResource;
        return $this;
    }

    public function browse($URL=NULL, $ref=NULL, $post=NULL){
        if($URL) $this->SETOPT['URL'] = $URL;
        if($ref) $this->SETOPT['REFERER'] = $ref;
        if($this->SETOPT['POSTFIELDS'] || $this->SETOPT['POSTFIELDS'] = $post){
            $this->SETOPT['POST'] = 1;
            $this->SETOPT['CUSTOMREQUEST'] = 'POST';
        }else{
            $this->SETOPT['POST'] = 0;
            unset($this->SETOPT['CUSTOMREQUEST']);
        }
        return $this->exec($this->cURL()->cURLOPT()->lastResource);
    }

    public function exec($c=''){
        if(!$c) $c = $this->lastResource;
        $this->result = curl_exec($c);
        return $this;
    }

    private function close($c){
        return curl_close($c);
    }

    public function getSize(){
        $s = $this->getHeader('Content-Range') ? explode('/', $this->getHeader('Content-Range')[1])[1] : $this->getHeader('Content-Length')[1];
        return $s;
    }

    public function searchHeader($h){
        foreach($this->headers AS $k => $v) if($e = explode(': ', $v) AND stristr($e[0], $h)) return array_map('trim', $e);
        return false;
    }

    public function getHeader($header=NULL, $follow=1){
        $this->cURL(
            array(
                'HEADER' => 1,
                'FOLLOWLOCATION' => $follow,
                //'NOBODY' => 1
                'RANGE' => '0-200'
            )
        );
        $this->headers = array_filter(array_map('trim', explode(PHP_EOL, $this->exec($this->cURLOPT()->lastResource)->result)));
        if($header) return $this->searchHeader($header);
        return $this;
    }

    private function flushBytes($c, $str){
        echo $str;
        $this->flush();
        return strlen($str);
    }

    public function flush(){
        ob_end_flush();
        ob_flush();
        flush();
        ob_start();
        return $this;
    }

    public function ADDOPT($a){
        $this->SETOPT = array_merge($this->SETOPT, $a);
        return $this;
    }

    function cmd($c){
        preg_match_all('/curl "[^"]+|-H "[^"]+|--[^"]+"[^"]+/', str_replace('^', '', str_replace('\^"', "'", $c)), $cmdInfo);
        $this->SETOPT['POSTFIELDS'] = '';
        foreach($cmdInfo[0] AS $curlInfo)
            !strstr($curlInfo, '--data')
                ?
                    strstr($curlInfo, '-H "')
                        &&
                    ($curlInfo = str_replace('-H "', '', $curlInfo))
                        &&
                    $this->headers[] = $curlInfo
                :
                    $this->SETOPT['POSTFIELDS'] = urldecode(preg_replace('/--[^"]+"/', '', $curlInfo))
        ;

        return $this->browse(str_replace('curl "', '', $cmdInfo[0][0]), '');
    }

    private function setRange($x, $r, $r2){
        $this->ADDOPT(
            array(
                'HEADER' => 0,
                'RANGE' => $r.'-'.$r2,
                'NOPROGRESS' => 0,
                'BUFFERSIZE' =>  $this->bufferSize,
                'TIMEOUT' => 0,
                'CONNECTTIMEOUT' => 0,
                'WRITEFUNCTION' => array($this, 'flushBytes')
            )
        );
        return $this->cURLOPT($x);
    }
 
    public function streamVideo($i=0, $end=NULL, $s = 0, $bf = 10240){
            $this->bufferSize = $bf;
            if(!$s) $s = $this->getSize();
            if(!$end) $end = $s;
            header('Content-Length:'.$end+1);
            $this->setRange($this->lastResource, $i, $end);
            $this->exec($curl);
    }
}


$size = isset($_COOKIE['size_FStream']) ? $_COOKIE['size_FStream'] : '';
$videoLocation = isset($_COOKIE['videoLocation_FStream']) ? $_COOKIE['videoLocation_FStream'] : '';
$token = isset($_COOKIE['token_FStream']) ? $_COOKIE['token_FStream'] : '';

if(isset($_GET['reset']) OR $token != md5($size.$videoLocation.$personalKey)){
    $xURL = new xURL('cookies.txt', $_SERVER['HTTP_USER_AGENT']);

    $host = str_ireplace('www.', '', parse_url($fembedUrl)['host']);

    preg_match('/v\/([a-z0-9-]+)/', $fembedUrl, $fembedId);

    $xURL->cmd('curl "https://'.$host.'/api/source/'.$fembedId[1].'" -H "authority: '.$host.'" -H "accept: */*" -H "origin: '.$host.'" -H "x-requested-with: XMLHttpRequest" -H "user-agent: '.$_SERVER['HTTP_USER_AGENT'].'" -H "content-type: application/x-www-form-urlencoded; charset=UTF-8" -H "sec-fetch-site: same-origin" -H "sec-fetch-mode: cors" -H "referer: https://'.$host.'/v/'.$fembedId.'" -H "accept-language: es-ES,es;q=0.9" --data "r=^&d='.$host.'" --compressed');

    $videoData = json_decode($xURL->result);
    $xURL = new xURL('cookies.txt', $_SERVER['HTTP_USER_AGENT']);
    $videoLocation = $videoData->data[count($videoData->data)-1]->file;
    $xURL->SETOPT['URL'] = $videoLocation;

    $size = $xURL->getSize();
    $token = md5($size.$videoLocation.$personalKey.$fembedUrl);
    setcookie('videoLocation_FStream', urlencode($videoLocation), time()+7200);
    setcookie('size_FStream', $size, time()+7200);
    setcookie('token_FStream', $token, time()+7200);
}else{
    $xURL = new xURL('cookies.txt', $_SERVER['HTTP_USER_AGENT']);
}

if($_SERVER['HTTP_RANGE'])
    $rangeReceived = explode('-', explode('=', $_SERVER['HTTP_RANGE'])[1]);
;

$beginReceived = preg_replace("/[^0-9](.*)$/", '', $rangeReceived[0]);

$endReceived = preg_replace("/[^0-9](.*)$/", '', $rangeReceived[1]);

$begin = $beginReceived OR $begin = 0;

$end = $endReceived OR $end = 1024*1024*$partSize+$begin;

$begin > 0 || $end < $size
    ?
        header('HTTP/1.0 206 Partial Content')
    :
        header('HTTP/1.0 200 OK')
;

$length = $end-$begin+1;
header("Content-Length: $length");
header("Content-Type: video/mp4");
header('Accept-Ranges: bytes');
header("Content-Transfer-Encoding: BINARY");
header("Content-Disposition: inline");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Connection: close');

header("Content-Range: bytes $begin-$end/$size");

$xURL->SETOPT['URL'] = $videoLocation;
$xURL->streamVideo($begin, $end, $size, 10240);
