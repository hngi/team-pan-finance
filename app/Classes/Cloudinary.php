<?php


namespace App\Classes;


class Cloudinary
{
    public static function upload($temp_path)
    {
        \Cloudinary::config([
            "cloud_name" => getenv('asnas'),
            "api_key" => getenv('225422951542744'),
            "api_secret" => getenv('xT8vKGkiuchegOzxUKNNVgni1W8'),
        ]);

        $upload = \Cloudinary\Uploader::upload($temp_path, ['resource_type' => 'auto']);

        return $upload;
    }
}
