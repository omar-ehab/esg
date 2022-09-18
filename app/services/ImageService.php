<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * @param $file
     * @return string
     */
    public static function saveBannerImage($file): string
    {
        // create icons directory if not exists
        $banners_images_dir = self::getBannerImagesDir();
        self::createDirIfNotExists($banners_images_dir);

        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/banners/' . $image_name);
        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        return 'banners/' . $image_name;
    }

    /**
     * @param $file
     * @param string|null $oldPath
     * @return string
     */
    public static function updateBannerImage($file, ?string $oldPath): string
    {
        // create image name and path
        $extension = $file->getClientOriginalExtension();
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/banners/' . $image_name);

        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        //delete old image from storage
        if ($oldPath) {
            self::delete($oldPath);
        }

        return 'banners/' . $image_name;
    }


    /**
     * @param string $file_name
     * @return bool
     */
    public static function delete(string $file_name): bool
    {
        return Storage::disk('public')->delete($file_name);
    }

    /**
     * @param string $path
     * @return void
     */
    private static function createDirIfNotExists(string $path): void
    {
        $exists = File::isDirectory($path);
        if (!$exists) {
            File::makeDirectory($path, 0644, true);
        }
    }


    /**
     * @return string
     */
    private static function getBannerImagesDir(): string
    {
        return storage_path('app/public/banners');
    }

}
