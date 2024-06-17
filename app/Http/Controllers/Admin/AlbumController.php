<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Album::all());

        return view('admin.album.index', ['album' => Album::orderByDesc('id')->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        // dd($request->all());

        $validated = $request->validated();

        $validated['$upload_image'] = Storage::put('upload', $request->upload_image);
        // dd($validated);

        Album::create($validated);

        return to_route('album')->with('message', 'Album created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('admin.album.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        // dd($request->all());

        $validated = $request->validated();

        if($request->has('upload_image')){
            if ($album->upload_image) {
                Storage::delete($album->upload_image);
            }

            $image_path = Storage::put('uploads', $request->upload_image);
            $validated['upload_image'] = $image_path;
        }
        // dd($validated);

        $album->update($validated);
        return to_route('album')->with('message', 'Album update!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if($album->upload_image && !Str::startsWith($album->upload_image, 'htpps://')) {

            Storage::delete($album->upload_image);
        }
        $album->delete();
        return to_route('album.index')->with('message', 'Album deleted!');

    }
}
