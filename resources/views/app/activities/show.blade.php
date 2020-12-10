@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('activities.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.activities.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.activities.inputs.name')</h5>
                    <span>{{ $activity->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.activities.inputs.description')</h5>
                    <span>{{ $activity->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.activities.inputs.date_of_event')</h5>
                    <span>{{ $activity->date_of_event ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('activities.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Activity::class)
                <a
                    href="{{ route('activities.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
