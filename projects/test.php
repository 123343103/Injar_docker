<?php
$order_money = 423548;
$real_money = "4235.48";
$real_money *= 100;
$real_money = round($real_money);
var_dump($order_money);
var_dump($real_money);
var_dump($order_money > $real_money);





?>