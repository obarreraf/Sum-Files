<?php
$sum = [];
foreach($firstArray as $key => $value){
    if(array_key_exists($key,$secondArray)){
        $newArray = [$key=>$value+$secondArray[$key]]; 
        $sum = array_merge($sum,$newArray);
    }else{
        $newArray = [$key=>$value]; 
        $sum = array_merge($sum,$newArray);
    }
}

//your final required result
var_dump($sum);
?>