<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PictureApiController extends Controller
{
    use AuthorizesRequests;

    /**
     * @return \Illuminate\Database\Eloquent\Collection<int, Picture>
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        $this->authorize('viewAny', Picture::class);

        return Picture::all();
    }

    public function store(Request $request): Picture
    {
        $this->authorize('create', Picture::class);

        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'image' => ['required'],
            'rating' => ['integer|required'],
            'user_id' => ['required', 'exists:users'],
        ]);

        return Picture::create($data);
    }

    public function show(Picture $picture): Picture
    {
        $this->authorize('view', $picture);

        return $picture;
    }

    public function update(Request $request, Picture $picture): Picture
    {
        $this->authorize('update', $picture);

        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'image' => ['required'],
            'rating' => ['integer|required'],
            'user_id' => ['required', 'exists:users'],
        ]);

        $picture->update($data);

        return $picture;
    }

    public function destroy(Picture $picture): \Illuminate\Http\JsonResponse
    {
        $this->authorize('delete', $picture);

        $picture->delete();

        return response()->json();
    }
}
