<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function editFile($file, $folder, $pathToDelete, $name = null){
    $newFile = uploadFile($file, $folder,$name);
    if ($newFile){
        deleteFile($pathToDelete);
    }

    return $newFile;

}

function uploadFile($file, $folder, $name = null, $disk = 'public')
{
    $hashedValue = hash('sha256', time() . Str::random(10));
    $FileName = !is_null($name) ? $name.'-'.$hashedValue : $hashedValue;
    return $file->storeAs(
        $folder,
        $FileName . "." . $file->getClientOriginalExtension(),
        $disk
    );
}

function deleteFile($path, $disk = 'public')
{
    $storagePath = 'public/'.$path;
    if (!empty($path) && Storage::disk('local')->exists($storagePath)){
        return Storage::disk($disk)->delete($path);
    }
}


function showImage($path){
    $fakeImagePath = 'assets/images/users/avatar-1.jpg';
    $storagePath = 'public/'.$path;

    $image = !empty($path) && Storage::disk('local')->exists($storagePath)
        ? asset('storage/'.$path)
        : asset($fakeImagePath);

    return $image;
}
