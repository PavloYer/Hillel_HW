<?php

namespace imageFormater;

class Image
{
    private string $path;
    private int $width;
    private int $height;
    private ImageFormat $format;

    public function __construct($imagePath)
    {
        $this->setPath($imagePath);
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        if (!file_exists($path)) {
            throw new \Exception('File not found');
        }

        $format = $this->getImageFormat($path);
        $allowedFormats = ImageFormat::JPEG->values();

        if (!in_array($format, $allowedFormats)) {
            throw new \Exception('Format is invalid. Allowed formats: ' . implode(', ', $allowedFormats));
        }
        $this->path = $path;
    }

    public function resize(int $width, int $height): Image
    {
        $this->setWidth($width);
        $this->setHeight($height);

        return $this;
    }

    public function convert(ImageFormat $newFormat): Image
    {
        $this->setFormat($newFormat);

        return $this;

    }

    public function save(?string $newName = null)
    {
        $format = $this->getImageFormat($this->getPath());
        $newFormat = $this->getFormat() ? $this->getFormat()->value : $format;

        $functionName = ImageFormat::JPEG->getImageFunction($format);
        $functionSaveName = ImageFormat::JPEG->getImageSaveFunction($format);

        $newImage = $functionName($this->getPath());

        [$oldWidth, $oldHeight] = getimagesize($this->getPath());
        $newWidth = $this->getWidth() ?? $oldWidth;
        $newHeight = $this->getHeight() ?? $oldHeight;

        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $newImage, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);

        $fileName = isset($newName) ? $newName . "." . $newFormat : $this->getPath();

        $functionSaveName($tmp, $fileName);

        imagedestroy($tmp);
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        if ($width <= 0) {
            throw new \Exception('Width is invalid');
        }
        $this->width = $width;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        if ($height <= 0) {
            throw new \Exception('Height is invalid');
        }
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param ImageFormat $format
     */
    public function setFormat(ImageFormat $format): void
    {
        $this->format = $format;
    }

    /**
     * @return ImageFormat
     */
    public function getFormat(): ImageFormat
    {
        return $this->format;
    }


    public function getImageFormat($path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }
}