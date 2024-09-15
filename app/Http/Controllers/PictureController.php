<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Picture::class);

        return Picture::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', Picture::class);

        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'image' => ['required'],
            'user_id' => ['required', 'exists:users'],
        ]);

        return Picture::create($data);
    }

    public function show(Picture $picture)
    {
        $this->authorize('view', $picture);

        return $picture;
    }

    public function update(Request $request, Picture $picture)
    {
        $this->authorize('update', $picture);

        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'image' => ['required'],
            'user_id' => ['required', 'exists:users'],
        ]);

        $picture->update($data);

        return $picture;
    }

    public function destroy(Picture $picture)
    {
        $this->authorize('delete', $picture);

        $picture->delete();

        return response()->json();
    }
}
