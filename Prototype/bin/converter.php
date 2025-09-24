<?php

require __DIR__ . '/../vendor/autoload.php';

use App\NumberConverter;

try{

    $number = null;
    $options = [];
    
    for($i = 1; $i < count($argv); $i++) {
        $arg = $argv[$i];
        
        if(str_starts_with($arg, '--')) {
            if(str_contains($arg, '=')) {
                [$option, $value] = explode('=', substr($arg, 2), 2);
                $options[$option] = $value;
            } else {
                $option = substr($arg, 2);
                $options[$option] = true;
            }
        } else if($number === null && is_numeric($arg)) {
            $number = $arg;
        }
    }

    if($number === null || !is_numeric($number)){
        throw new InvalidArgumentException("Please Provide A Valid Integer");
    }

    $converter = new NumberConverter((int)$number);

    echo $converter->format("Decimal" , $converter->toDecimal());
    echo $converter->format("Binary" , $converter->toBinary());
    echo $converter->format("Hexa" , $converter->toHexa());


    if(isset($options['and'])){
        echo $converter->format("AND", $converter->BitwiseAnd((int)$options['and']));
    }

    if(isset($options['or'])){
        echo $converter->format("OR", $converter->BitwiseOr((int)$options['or']));
    }

    if (isset($options['xor'])){
        echo $converter->format("XOR", $converter->BitwiseXor((int)$options['xor']));
    }

    if (isset($options['not'])){
        echo $converter->format("NOT", $converter->BitwiseNot());
    }

    if (isset($options['shift-left'])){
        echo $converter->format("Shift Left", $converter->ShiftLeft((int)$options['shift-left']));
    }

    if (isset($options['shift-right'])){
        echo $converter->format("Shift Right", $converter->ShiftRight((int)$options['shift-right']));
    }


}
catch(Throwable $e){
    fwrite(STDERR, "Error: " . $e->getMessage() . PHP_EOL);
    exit(1);
}