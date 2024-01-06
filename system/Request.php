<?php

class Request
{
    public static function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'];

        if (str_contains($path, "?")) {
            $path = substr($path, 0, strpos($path, "?"));
        }

        return $path;
    }
}