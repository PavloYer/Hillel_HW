<?php

namespace imageFormater;

enum ImageFormat: string
{
    case PNG = 'png';
    case JPG = 'jpg';
    case JPEG = 'jpeg';
    case WEBP = 'webp';

    /**
     * @return string
     */
    public function values(): array
    {
        $cases = ImageFormat::cases();
        $values = [];
        foreach ($cases as $case) {
            $values[] = $case->value;
        }
        return $values;
    }

    public function getImageFunction(string $currentFormat): string
    {
        return match ($currentFormat) {
            'png' => 'imagecreatefrompng',
            'webp' => 'imagecreatefromwebp',
            default => 'imagecreatefromjpeg',
        };
    }

    public function getImageSaveFunction(string $currentFormat): string
    {
        return match ($currentFormat) {
            'png' => 'imagepng',
            'webp' => 'imagewebp',
            default => 'imagejpeg',
        };
    }
}
