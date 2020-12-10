<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;
use App\Http\Requests\OccupationStoreRequest;
use App\Http\Requests\OccupationUpdateRequest;

class OccupationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Occupation::class);

        $search = $request->get('search', '');

        $occupations = Occupation::search($search)
            ->latest()
            ->paginate();

        return view('app.occupations.index', compact('occupations', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Occupation::class);

        return view('app.occupations.create');
    }

    /**
     * @param \App\Http\Requests\OccupationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OccupationStoreRequest $request)
    {
        $this->authorize('create', Occupation::class);

        $validated = $request->validated();

        $occupation = Occupation::create($validated);

        return redirect()
            ->route('occupations.edit', $occupation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Occupation $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Occupation $occupation)
    {
        $this->authorize('view', $occupation);

        return view('app.occupations.show', compact('occupation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Occupation $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Occupation $occupation)
    {
        $this->authorize('update', $occupation);

        return view('app.occupations.edit', compact('occupation'));
    }

    /**
     * @param \App\Http\Requests\OccupationUpdateRequest $request
     * @param \App\Models\Occupation $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(
        OccupationUpdateRequest $request,
        Occupation $occupation
    ) {
        $this->authorize('update', $occupation);

        $validated = $request->validated();

        $occupation->update($validated);

        return redirect()
            ->route('occupations.edit', $occupation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Occupation $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Occupation $occupation)
    {
        $this->authorize('delete', $occupation);

        $occupation->delete();

        return redirect()
            ->route('occupations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
