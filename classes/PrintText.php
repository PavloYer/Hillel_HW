<?php

namespace classes;

class PrintText
{
    protected string $text = 'Some text';

    public function print(): void
    {
        echo ucfirst($this->text);
    }
}