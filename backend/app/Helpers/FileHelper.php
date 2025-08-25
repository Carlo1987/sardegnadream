<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

trait FileHelper
{
    public function saveFile($file, $path)
    {
        if ($file) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put("$path/$file_name", $file);
            return $fileName;
        }
    }
}