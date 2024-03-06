<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->get();
        return view('albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddAlbumRequest $request)
    {
        $data['name'] = $request->name;
        $album = Album::create($data);
        $album->insertPhotos($request);
        return redirect()->route('albums.create')->with(['success' => 'Album has been created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::findOrFail($id);
        $albums = Album::latest()->where('id','!=',$id)->get();
        $photos = $album->photos()->get();
        return view('albums.edit',compact('album','photos','albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, string $id)
    {
        $data['name'] = $request->name;
        $album = Album::findOrFail($id);
        $album->update($data);
        $album->insertPhotos($request);
        return redirect()->route('albums.edit',$id)->with(['success' => 'Album has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);
        $album->deleteAllPhotos();
        $album->delete();
        return redirect()->route('albums.index')->with(['success' => 'Album has been deleted successfully']);
    }

    public function movePhoto(Request $request,$id){
        $albumId = $request->album_id;
        $photo = Photo::findOrFail($id);
        $album = Album::findOrFail($albumId);
        $photo->update(['album_id' => $albumId]);
        return redirect()->back()->with(['success' => 'Photo has been moved successfully']);
    }

    public function deletePhoto($id){

        $photo = Photo::findOrFail($id);
        deleteFile($photo->path);
        $photo->delete();
        return redirect()->back()->with(['success' => 'Photo has been deleted successfully']);
    }

    public function deleteAllPhotos($id){
        $album = Album::findOrFail($id);
        $album->deleteAllPhotos();
        return redirect()->back()->with(['success' => 'All Photos of album have been deleted successfully']);
    }

}
