<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadFile
{


    public function upload(UploadedFile $file, $old = null)
    {
        if($file->isValid()){
            $file_name = $old ?? Str::random('40') . $file->getClientOriginalExtension();
            return $file->storeAs('', basename($file_name)) ?: null;
        }

        return null;
    }

}
