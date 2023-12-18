<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AlbumController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return AlbumResource::collection(Album::all());
    }

    public function store(Request $request): AlbumResource
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

    public function show(Album $album): AlbumResource
    {
        return new AlbumResource($album);
    }

    public function update(Request $request, Album $album): AlbumResource
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

    public function destroy(Album $album): JsonResponse
    {
        $album->delete();

        return response()->json();
    }
}
