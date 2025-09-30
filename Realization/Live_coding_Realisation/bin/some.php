<?php
require __DIR__ . "/../vendor/autoload.php";


// use App;
use App\SomFormatter;


try{

    $num1 = $argv[1];
    $num2 = $argv[2];

    if($num1 > 10 || $num2 > 10){
        throw new InvalidArgumentException("The input must be less then 10");
    }else{
        $some = new SomFormatter();
        $somResult = $some->som($num1, $num2);
        echo "The result is: " . $somResult . PHP_EOL;
    }


    exit(0);
}catch(Exception $e){
    echo "Error: ".$e->getMessage();
    exit(1);
}