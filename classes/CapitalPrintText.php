<?php

namespace classes;
require_once 'PrintText.php';

class CapitalPrintText extends PrintText
{
    public function print(): void
    {
        echo strtoupper($this->text);
    }
}