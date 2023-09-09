<?php

namespace Core\validators;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;

    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function onlyNumbers($value) {
        return preg_match('/^[0-9]+(\.[0-9]+)?$/', $value) === 1;
    }

    public static function imageType($file) {
        // Check using exif_imagetype
        if (function_exists('exif_imagetype')) {
            $imageType = exif_imagetype($file['tmp_name']);
            if ($imageType !== false) {
                // Check if the image type is one of the supported image types
                $supportedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF, IMAGETYPE_BMP];
                if (in_array($imageType, $supportedTypes)) {
                    return true;
                }
            }
        }

        // Check using MIME type
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
        $fileMimeType = mime_content_type($file['tmp_name']);
        if (in_array($fileMimeType, $allowedMimeTypes)) {
            return true;
        }

        return false;
    }

    public static function isFileSelected($inputName) {
        // Check if a file with the given input name exists in $_FILES
        return isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK;
    }

    public static function array($array) {
        foreach ($array as $value) {

        }
    }



}
