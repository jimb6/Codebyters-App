<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ImageStoreRequest;
use App\Http\Requests\ImageUpdateRequest;

class ImageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Image::class);

        $search = $request->get('search', '');

        $images = Image::search($search)
            ->latest()
            ->paginate();

        return view('app.images.index', compact('images', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Image::class);

        return view('app.images.create');
    }

    /**
     * @param \App\Http\Requests\ImageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageStoreRequest $request)
    {
        $this->authorize('create', Image::class);

        $validated = $request->validated();

        $image = Image::create($validated);

        return redirect()
            ->route('images.edit', $image)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Image $image)
    {
        $this->authorize('view', $image);

        return view('app.images.show', compact('image'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Image $image)
    {
        $this->authorize('update', $image);

        return view('app.images.edit', compact('image'));
    }

    /**
     * @param \App\Http\Requests\ImageUpdateRequest $request
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageUpdateRequest $request, Image $image)
    {
        $this->authorize('update', $image);

        $validated = $request->validated();

        $image->update($validated);

        return redirect()
            ->route('images.edit', $image)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Image $image)
    {
        $this->authorize('delete', $image);

        $image->delete();

        return redirect()
            ->route('images.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
