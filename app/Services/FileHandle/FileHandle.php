<?php

namespace App\Services\FileHandle;

use Illuminate\Support\Facades\Storage;

class FileHandle
{
    public function addFile($request)
    {
        if ($request->file) {

            $fileName = $request->file('file')->getClientOriginalName() . '_' . date("Y-m-d-H-i-s");

            Storage::putFileAs('public/uploaded_files/', $request->file('file'), $fileName);

            return $fileName;

        }
    }
}
