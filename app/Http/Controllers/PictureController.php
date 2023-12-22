<?php

namespace App\Http\Controllers;

use App\Http\Resources\PictureResource;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        return PictureResource::collection(Picture::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'album_id' => ['required'],
        ]);

        return new PictureResource(Picture::create($data));
    }

    public function show(Picture $picture)
    {
        return new PictureResource($picture);
    }

    public function update(Request $request, Picture $picture)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'album_id' => ['required'],
        ]);

        $picture->update($data);

        return new PictureResource($picture);
    }

    public function destroy(Picture $picture)
    {
        $picture->delete();

        return response()->json();
    }
}
