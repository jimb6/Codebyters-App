<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\OfficialStoreRequest;
use App\Http\Requests\OfficialUpdateRequest;

class OfficialController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Official::class);

        $search = $request->get('search', '');

        $officials = Official::search($search)
            ->latest()
            ->paginate();

        return view('app.officials.index', compact('officials', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Official::class);

        $positions = Position::pluck('name', 'id');

        return view('app.officials.create', compact('positions'));
    }

    /**
     * @param \App\Http\Requests\OfficialStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficialStoreRequest $request)
    {
        $this->authorize('create', Official::class);

        $validated = $request->validated();

        $official = Official::create($validated);

        return redirect()
            ->route('officials.edit', $official)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Official $official)
    {
        $this->authorize('view', $official);

        return view('app.officials.show', compact('official'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Official $official)
    {
        $this->authorize('update', $official);

        $positions = Position::pluck('name', 'id');

        return view('app.officials.edit', compact('official', 'positions'));
    }

    /**
     * @param \App\Http\Requests\OfficialUpdateRequest $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function update(OfficialUpdateRequest $request, Official $official)
    {
        $this->authorize('update', $official);

        $validated = $request->validated();

        $official->update($validated);

        return redirect()
            ->route('officials.edit', $official)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Official $official
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Official $official)
    {
        $this->authorize('delete', $official);

        $official->delete();

        return redirect()
            ->route('officials.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
