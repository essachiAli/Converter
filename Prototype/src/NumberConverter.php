<?php

namespace App;

class NumberConverter implements ConverterInterface{

    use FormatterTrait;

    private int $number;

    public function __construct(int $number){
        $this->number = $number;
    }

    public function toDecimal(): int{
        return $this->number;
    }

    public function toBinary(): string{
        return decbin($this->number);
    }

    public function toHexa(): string{
        return strtoupper(dechex($this->number));
    }

    public function BitwiseAnd(int $other): int{
        return $this->number & $other;
    }

    public function BitwiseOr(int $other): int{
        return $this->number | $other;
    }

    public function BitwiseXor(int $other): int{
        return $this->number ^ $other;
    }

    public function BitwiseNot(): int{
        return ~$this->number;
    }

    public function ShiftLeft(int $positions): int{
        return $this->number << $positions;
    }

    public function ShiftRight(int $positions): int{
        return $this->number >> $positions;
    }
}