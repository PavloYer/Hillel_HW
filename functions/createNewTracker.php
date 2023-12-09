<?php

function createNewTracker(string $trackerName): void
{
    $filePath = ROOT . "files/$trackerName";
    $format = pathinfo($filePath, PATHINFO_EXTENSION);

    if (file_exists($filePath)) {
        throw new \Exception('File already exists');
    }
    if(!in_array($format, ['txt'])) {
        throw new \Exception('Format is invalid');
    }
    fclose(fopen($filePath, 'a'));

}