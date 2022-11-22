<?php

namespace App\Services;

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
     * @param $file
     * @return string
     */
    public static function saveNewsImage($file): string
    {
        // create icons directory if not exists
        $news_images_dir = self::getNewsImagesDir();
        self::createDirIfNotExists($news_images_dir);

        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/news/' . $image_name);
        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        return 'news/' . $image_name;
    }

    /**
     * @param $file
     * @param string|null $oldPath
     * @return string
     */
    public static function updateNewsImage($file, ?string $oldPath): string
    {
        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/news/' . $image_name);

        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        //delete old image from storage
        if ($oldPath) {
            self::delete($oldPath);
        }

        return 'news/' . $image_name;
    }

    /**
     * @param $file
     * @return string
     */
    public static function saveServiceImage($file): string
    {
        // create icons directory if not exists
        $service_images_dir = self::getServiceImagesDir();
        self::createDirIfNotExists($service_images_dir);

        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/services/' . $image_name);
        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        return 'services/' . $image_name;
    }

    /**
     * @param $file
     * @param string|null $oldPath
     * @return string
     */
    public static function updateServiceImage($file, ?string $oldPath): string
    {
        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/services/' . $image_name);

        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        //delete old image from storage
        if ($oldPath) {
            self::delete($oldPath);
        }

        return 'services/' . $image_name;
    }

    /**
     * @param $file
     * @return string
     */
    public static function saveServiceItemImage($file): string
    {
        // create icons directory if not exists
        $service_items_images_dir = self::getServiceItemImagesDir();
        self::createDirIfNotExists($service_items_images_dir);

        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/service_items/' . $image_name);
        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        return 'service_items/' . $image_name;
    }

    /**
     * @param $file
     * @param string|null $oldPath
     * @return string
     */
    public static function updateServiceItemImage($file, ?string $oldPath): string
    {
        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/service_items/' . $image_name);

        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        //delete old image from storage
        if ($oldPath) {
            self::delete($oldPath);
        }

        return 'service_items/' . $image_name;
    }

    /**
     * @param $file
     * @return string
     */
    public static function saveCertificateImage($file): string
    {
        // create icons directory if not exists
        $certificate_images_dir = self::getCertificateImagesDir();
        self::createDirIfNotExists($certificate_images_dir);

        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/certificates/' . $image_name);
        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        return 'certificates/' . $image_name;
    }

    /**
     * @param $file
     * @param string|null $oldPath
     * @return string
     */
    public static function updateCertificateImage($file, ?string $oldPath): string
    {
        // create image name and path
        $time = time();
        $image_name = $time . md5($file->getClientOriginalName()) . '.webp';
        $image_path = storage_path('app/public/certificates/' . $image_name);

        Image::make($file)
            ->encode('webp')
            ->save($image_path);

        //delete old image from storage
        if ($oldPath) {
            self::delete($oldPath);
        }

        return 'certificates/' . $image_name;
    }


    /**
     * @return string
     */
    private static function getBannerImagesDir(): string
    {
        return storage_path('app/public/banners');
    }

    /**
     * @return string
     */
    private static function getServiceImagesDir(): string
    {
        return storage_path('app/public/services');
    }

    /**
     * @return string
     */
    private static function getServiceItemImagesDir(): string
    {
        return storage_path('app/public/service_items');
    }

    /**
     * @return string
     */
    private static function getNewsImagesDir(): string
    {
        return storage_path('app/public/news');
    }

    /**
     * @return string
     */
    private static function getCertificateImagesDir(): string
    {
        return storage_path('app/public/certificates');
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

}
