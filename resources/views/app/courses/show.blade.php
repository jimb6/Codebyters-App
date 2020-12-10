@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('courses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.programs.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.programs.inputs.institute_id')</h5>
                    <span>{{ optional($course->institute)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.programs.inputs.name')</h5>
                    <span>{{ $course->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.programs.inputs.acronym')</h5>
                    <span>{{ $course->acronym ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('courses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Course::class)
                <a href="{{ route('courses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
