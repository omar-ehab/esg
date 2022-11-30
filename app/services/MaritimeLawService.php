<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MaritimeLawService
{
    /**
     * @param $file
     * @return string
     */
    public static function savePdf($file): string
    {
        // create profiles directory if not exists
        $pdf_dir = self::getPdfDir();
        self::createDirIfNotExists($pdf_dir);
        $uniqueFileName = uniqid() . trim($file->getClientOriginalName());
        $file->move($pdf_dir, $uniqueFileName);

        return 'maritime_laws/' . $uniqueFileName;
    }


    /**
     * @return string
     */
    private static function getPdfDir(): string
    {
        return storage_path('app/public/maritime_laws');
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
