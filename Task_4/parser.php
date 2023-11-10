<?php

//$url = "https://sd-design.tk/";
$url = "https://www.bills.ru/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);

curl_close($ch);

