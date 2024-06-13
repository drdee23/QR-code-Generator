<?php

namespace App\Helpers;

use App\Models\Session;

use App\User;
use Illuminate\Support\Facades\Auth;

class Qs
{

    public static function getUploadPath($orgname)
    {
        return 'public/uploads/'.$orgname;
    }

    public static function getDefaultUserImage()
    {
        return asset('global_assets/images/user.png');
    }


    ///////////////file uploads////


    public static function getqrUploadPath($title)
    {
        // Define the base directory where QR codes will be uploaded
        $baseDir = 'uploads';
    
        // Example: Append the title to the base directory
        // You might need to adjust this based on your specific requirements
        $path = $baseDir . '/' . $title;
    
        return $path;
    }
    
    public static function getPublicUploadPath()
    {
        return 'uploads';
    }

    public static function getUserUploadPath()
    {
        return 'uploads/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
    }

    public static function getFileMetaData($file)
    {
        //$dataFile['name'] = $file->getClientOriginalName();
        $dataFile['ext'] = $file->getClientOriginalExtension();
        $dataFile['type'] = $file->getClientMimeType();
        $dataFile['size'] = self::formatBytes($file->getSize());
        return $dataFile;
    }

    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

    ///////////////////
}
