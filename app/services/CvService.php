<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CvService
{
    /**
     * @param $file
     * @return string
     */
    public static function saveCv($file): string
    {
        // create cvs directory if not exists
        $cvs_dir = self::getCvsDir();
        self::createDirIfNotExists($cvs_dir);

        $uniqueFileName = uniqid() . $file->getClientOriginalName();
        $file->move($cvs_dir, $uniqueFileName);

        return 'cvs/' . $uniqueFileName;
    }


    /**
     * @return string
     */
    private static function getCvsDir(): string
    {
        return storage_path('app/public/cvs');
    }

    /**
     * @return string
     */
    private static function getProfilesDir(): string
    {
        return storage_path('app/public/profiles');
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
    protected static function createDirIfNotExists(string $path): void
    {
        $exists = File::isDirectory($path);
        if (!$exists) {
            File::makeDirectory($path, 0644, true);
        }
    }

}
