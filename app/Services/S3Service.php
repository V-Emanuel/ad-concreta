<?php

namespace App\Traits;

use Aws\S3\S3Client;

trait S3Service
{
    public function uploadToS3($file, $directory = 'documentos')
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => config('filesystems.disks.s3.region'),
            'credentials' => [
                'key' => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret'),
            ],
        ]);

        $path = $directory . '/' . uniqid() . '.' . $file->getClientOriginalExtension();

        $s3->putObject([
            'Bucket' => config('filesystems.disks.s3.bucket'),
            'Key' => $path,
            'Body' => fopen($file->path(), 'rb'),
            'ACL' => 'public-read',
        ]);

        return $s3->getObjectUrl(config('filesystems.disks.s3.bucket'), $path);
    }
}
