<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use App\Http\Requests\InstituteStoreRequest;
use App\Http\Requests\InstituteUpdateRequest;

class InstituteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Institute::class);

        $search = $request->get('search', '');

        $institutes = Institute::search($search)
            ->latest()
            ->paginate();

        return view('app.institutes.index', compact('institutes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Institute::class);

        return view('app.institutes.create');
    }

    /**
     * @param \App\Http\Requests\InstituteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstituteStoreRequest $request)
    {
        $this->authorize('create', Institute::class);

        $validated = $request->validated();

        $institute = Institute::create($validated);

        return redirect()
            ->route('institutes.edit', $institute)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Institute $institute
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Institute $institute)
    {
        $this->authorize('view', $institute);

        return view('app.institutes.show', compact('institute'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Institute $institute
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Institute $institute)
    {
        $this->authorize('update', $institute);

        return view('app.institutes.edit', compact('institute'));
    }

    /**
     * @param \App\Http\Requests\InstituteUpdateRequest $request
     * @param \App\Models\Institute $institute
     * @return \Illuminate\Http\Response
     */
    public function update(
        InstituteUpdateRequest $request,
        Institute $institute
    ) {
        $this->authorize('update', $institute);

        $validated = $request->validated();

        $institute->update($validated);

        return redirect()
            ->route('institutes.edit', $institute)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Institute $institute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Institute $institute)
    {
        $this->authorize('delete', $institute);

        $institute->delete();

        return redirect()
            ->route('institutes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
