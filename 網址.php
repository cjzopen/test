<?php

$_SERVER['HTTP_HOST']
$_SERVER['REQUEST_URI']
$_SERVER['PHP_SELF']
$_SERVER['QUERY_STRING']

//假設我們的網址是 http://www.wibibi.com/test.php?tid=333

//則以上 $_SERVER 分別顯示結果會是

echo $_SERVER['HTTP_HOST'];　//顯示 www.wibibi.com
echo $_SERVER['REQUEST_URI'];　//顯示 /test.php?tid=222
echo $_SERVER['PHP_SELF'];　//顯示 /test.php
echo $_SERVER['QUERY_STRING'];　//顯示 tid=222

//透過這幾個 $_SERVER，我們已經取得了網址的各個部分，接著就是把網址給組合起來
$URL='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $URL;


//另一種 url array 'parse_url'
$row5['url'] = parse_url($row5['link']);
$row5['imgx'] = $row5['url']['scheme'].'://'.$row5['url']['host'].$row5['url']['path'].'images/img_index_focus.jpg';
?>

<script type="text/javascript">
// 來源網址
var webf = decodeURIComponent(document.referrer);
var doma = webf.match(/:\/\/(.[^/]+)/)[1];


　alert('location.href: '+location.href);　//輸出値為 location.href: http://www.wibibi.com/test.html?tid=222#333
　alert('location.protocol: '+location.protocol);　//輸出値為 location.protocol: http:
　alert('location.hostname: '+location.hostname);　//輸出値為 location.hostname: www.wibibi.com
　alert('location.host: '+location.host);　//輸出値為 location.host: www.wibibi.com
　alert('location.port: '+location.port);　//輸出値為 80
　alert('location.pathname: '+location.pathname);　//輸出値為 location.pathname: /test.html
　alert('location.search: '+location.search);　//輸出値為 location.search: ?tid=222
　alert('location.hash: '+location.hash);　//輸出値為 location.hash: #333
</script>