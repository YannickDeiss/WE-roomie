<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/21/2018
 * Time: 1:06 PM
 */

namespace service;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use config\Config;

class AWSUploadService
{

    public function uploadImage($image) {

        require 'vendor/autoload.php';

        // File details
        $name = $image['name'];
        $tmp_name = $image['tmp_name'];

        $extension = explode('.', $name);
        $extension = strtolower(end($extension));

        // Temp details
        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extension}";
        $tmp_file_path = "files/{$tmp_file_name}";

        // Move the file
        move_uploaded_file($tmp_name, $tmp_file_path);

        // S3
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'eu-central-1',
            'credentials' => [
                'key' => Config::s3Config('key'),
                'secret' => Config::s3Config('secret'),
            ]
        ]);

        try {
            // Upload data
            $result = $s3->putObject([
                'Bucket' => Config::s3Config('name'),
                'Key' => "uploads/{$tmp_file_name}",
                'Body' => fopen($tmp_file_path, 'rb'),
                'ACL' => 'public-read'
            ]);
            //Remove the temp file
            unlink($tmp_file_path);
            // Print the URL to the object.
            return $result['ObjectURL'] . PHP_EOL;
        } catch (S3Exception $e) {
            return $e->getMessage() . PHP_EOL;
        }
    }


//    TODO: DELETE IMAGE ON S3 WHEN LISTING IS DELETED
}