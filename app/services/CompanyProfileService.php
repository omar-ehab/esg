<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyProfileService
{
    /**
     * @param $file
     * @return string
     */
    public static function saveProfile($file): string
    {
        // create profiles directory if not exists
        $profiles_dir = self::getProfilesDir();
        self::createDirIfNotExists($profiles_dir);
        $uniqueFileName = uniqid() . $file->getClientOriginalName();
        $file->move($profiles_dir, $uniqueFileName);

        return 'profiles/' . $uniqueFileName;
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
