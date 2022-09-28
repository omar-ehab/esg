<?php

namespace App\Services;

class CompanyProfileService extends StorageService
{
    /**
     * @param $file
     * @return string
     */
    public static function saveProfile($file): string
    {
        // create cvs directory if not exists
        $profiles_dir = self::getProfilesDir();
        parent::createDirIfNotExists($profiles_dir);
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

}
