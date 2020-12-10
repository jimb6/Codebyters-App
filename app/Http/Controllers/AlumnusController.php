<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use App\Http\Requests\AlumnusStoreRequest;
use App\Http\Requests\AlumnusUpdateRequest;

class AlumnusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Alumnus::class);

        $search = $request->get('search', '');

        $alumni = Alumnus::search($search)
            ->latest()
            ->paginate();

        return view('app.alumni.index', compact('alumni', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Alumnus::class);

        return view('app.alumni.create');
    }

    /**
     * @param \App\Http\Requests\AlumnusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnusStoreRequest $request)
    {
        $this->authorize('create', Alumnus::class);

        $validated = $request->validated();

        $alumnus = Alumnus::create($validated);

        return redirect()
            ->route('alumni.edit', $alumnus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Alumnus $alumnus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Alumnus $alumnus)
    {
        $this->authorize('view', $alumnus);

        return view('app.alumni.show', compact('alumnus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Alumnus $alumnus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Alumnus $alumnus)
    {
        $this->authorize('update', $alumnus);

        return view('app.alumni.edit', compact('alumnus'));
    }

    /**
     * @param \App\Http\Requests\AlumnusUpdateRequest $request
     * @param \App\Models\Alumnus $alumnus
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnusUpdateRequest $request, Alumnus $alumnus)
    {
        $this->authorize('update', $alumnus);

        $validated = $request->validated();

        $alumnus->update($validated);

        return redirect()
            ->route('alumni.edit', $alumnus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Alumnus $alumnus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Alumnus $alumnus)
    {
        $this->authorize('delete', $alumnus);

        $alumnus->delete();

        return redirect()
            ->route('alumni.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
