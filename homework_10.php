<?php

echo "1: Add new notation to logs.txt
2: Get last notation from logs.txt
Choose option: ";

switch (fgets(STDIN)) {
    // Task 1
    case 1:
        file_put_contents('logs.txt', fgets(STDIN), FILE_APPEND);
        break;
    // Task 2
    case 2:
        if (file_exists('logs.txt')) {
            $lines = file('logs.txt');
            echo $lines[array_key_last($lines)];
        } else {
            echo "File doesn't exist";
        }
        break;

    default: echo "Invalid operation";
}