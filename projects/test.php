<?php

$arr=[3,1,8,4,9,2,5,7,6,0]; 
$len=count($arr); 
for($i=0;$i<$len;$i++){ 
    for($j=$i+1;$j<$len;$j++){ 
        if($arr[$i]>$arr[$j]){ 
            list($arr[$i],$arr[$j])=[$arr[$j],$arr[$i]]; 
        } 
    } 
} 
var_dump($arr);


?>