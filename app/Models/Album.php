<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function photos() :HasMany {
        return $this->hasMany(Photo::class);
    }

    public function insertPhotos($request){

        $photos = $request->photo;
        $photoNames = $request->photo_names;

        if ($photos and count($photos) > 0){
            foreach ($photos as $i=>$photo){
                $this->photos()->create([
                    'path' => uploadFile($photo,'albums'),
                    'name' => $photoNames[$i]
                ]);
            }
        }

        return true;
    }

    public function deleteAllPhotos(){
        $photos = $this->photos()->get();
        foreach ($photos as $photo){
            $path = $photo->path;
            deleteFile($path);
            $photo->delete();
        }
        return true;
    }

}
