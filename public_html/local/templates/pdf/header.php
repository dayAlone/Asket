<!DOCTYPE html><html lang='ru'>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/layout/css/frontend.css">
</head>
<body class="print <?=$APPLICATION->AddBufferContent("body_class");?>">
  <div class="container">
  <?
    function full_path()
    {
        $s = &$_SERVER;
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
        $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
        $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
        $uri = $protocol . '://' . $host . $s['REQUEST_URI'];
        $segments = explode('?', $uri, 2);
        $url = $segments[0];
        return $url;
    }
  ?>
  <div class="note">Ссылка на страницу: <a href="<?=full_path()?>"><?=full_path()?></a> </div>
  <hr>