<?php

namespace Http\services;

class ImageService
{
    public static function store($image) {
        $uniqueName = $image['name'] . uniqid();
        $targetFile = BASE_PATH . 'public/resources/uploads/' . $uniqueName;
        move_uploaded_file($image['tmp_name'], $targetFile);
        return '/resources/uploads/' . $uniqueName;
    }
}