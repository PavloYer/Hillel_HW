<?php

function addNewLog(string $fileName): void
{
    echo "Record: ";
    file_put_contents($fileName, fgets(STDIN), FILE_APPEND);
}

function getLastLog(string $fileName): string
{
    if (file_exists($fileName)) {
        $line = file($fileName);
        return $line[array_key_last($line)];
    }
    return "File doesn't exist";
}

echo "1: Add new notation
2: Get last notation
Choose option: ";
$option = fgets(STDIN);

echo "Enter file name: ";
$fileName = trim(fgets(STDIN));

switch ($option) {
    case 1:
        addNewLog($fileName);
        break;
    case 2:
        echo getLastLog($fileName);
        break;
    default:
        echo "Invalid operation";
}