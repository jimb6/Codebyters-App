<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;

class ActivityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Activity::class);

        $search = $request->get('search', '');

        $activities = Activity::search($search)
            ->latest()
            ->paginate();

        return view('app.activities.index', compact('activities', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Activity::class);

        return view('app.activities.create');
    }

    /**
     * @param \App\Http\Requests\ActivityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityStoreRequest $request)
    {
        $this->authorize('create', Activity::class);

        $validated = $request->validated();

        $activity = Activity::create($validated);

        return redirect()
            ->route('activities.edit', $activity)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Activity $activity)
    {
        $this->authorize('view', $activity);

        return view('app.activities.show', compact('activity'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Activity $activity)
    {
        $this->authorize('update', $activity);

        return view('app.activities.edit', compact('activity'));
    }

    /**
     * @param \App\Http\Requests\ActivityUpdateRequest $request
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        $this->authorize('update', $activity);

        $validated = $request->validated();

        $activity->update($validated);

        return redirect()
            ->route('activities.edit', $activity)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Activity $activity)
    {
        $this->authorize('delete', $activity);

        $activity->delete();

        return redirect()
            ->route('activities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
