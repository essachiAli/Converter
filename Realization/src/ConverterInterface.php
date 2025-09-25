<?php

namespace App;

interface ConverterInterface {
    public function toDecimal(): int;
    public function toBinary(): string;
}