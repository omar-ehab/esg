<?php

namespace App\Services;

class CvService extends StorageService
{
    /**
     * @param $file
     * @return string
     */
    public static function saveCv($file): string
    {
        // create cvs directory if not exists
        $cvs_dir = self::getCvsDir();
        parent::createDirIfNotExists($cvs_dir);

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

}
