<?php

namespace App\Http\Controllers;

use App\Http\Resources\PictureResource;
use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PictureController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PictureResource::collection(Picture::all());
    }

    public function store(Request $request): PictureResource
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'album_id' => ['required'],
        ]);

        return new PictureResource(Picture::create($data));
    }

    public function show(Picture $picture): PictureResource
    {
        return new PictureResource($picture);
    }

    public function update(Request $request, Picture $picture): PictureResource
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'album_id' => ['required'],
        ]);

        $picture->update($data);

        return new PictureResource($picture);
    }

    public function destroy(Picture $picture): JsonResponse
    {
        $picture->delete();

        return response()->json();
    }
}
