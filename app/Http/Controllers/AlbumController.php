<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return AlbumResource::collection(Album::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'user_id' => ['required'],
            'settings' => ['required'],
            'uuid' => ['required'],
        ]);

        return new AlbumResource(Album::create($data));
    }

    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    public function update(Request $request, Album $album)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'user_id' => ['required'],
            'settings' => ['required'],
            'uuid' => ['required'],
        ]);

        $album->update($data);

        return new AlbumResource($album);
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json();
    }
}
