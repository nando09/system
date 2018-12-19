<?php

$ch = curl_init("https://noticias.r7.com/tecnologia-e-ciencia/como-mark-zuckerberg-usa-sua-propria-conta-no-facebook-08112018");
$fp = fopen("pagina_exemplo.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
?>