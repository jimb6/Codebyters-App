@php $editing = isset($student) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="course_id" label="Course Id">
            @php $selected = old('course_id', ($editing ? $student->course_id : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>
</div>
