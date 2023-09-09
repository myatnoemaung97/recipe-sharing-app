<?php

namespace Http\services;

class ImageService
{
    public static function store($image) {
        $targetFile = BASE_PATH . 'public/resources/uploads/' . $image['name'];
        move_uploaded_file($image['tmp_name'], $targetFile);
        return '/resources/uploads/' . $image['name'];
    }
}