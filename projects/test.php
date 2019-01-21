<?php

$str=file_get_contents("houseSourceModel (1).csv");
$str = iconv('GBK','utf-8', $str);
echo $str;


?>