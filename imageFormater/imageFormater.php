<?php
declare(strict_types=1);

use imageFormater\Image;
use imageFormater\ImageFormat;

require_once 'configs.php';
require_once ROOT . 'classes/ImageFormat.php';
require_once ROOT . 'classes/Image.php';


$image = new Image('test.png');
$image->resize(1280, 760)
    ->convert(ImageFormat::WEBP)
    ->save('gd');

