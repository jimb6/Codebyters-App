@php $editing = isset($course) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="institute_id" label="Institute" required>
            @php $selected = old('institute_id', ($editing ? $course->institute_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Institute</option>
            @foreach($institutes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $course->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="acronym"
            label="Acronym"
            value="{{ old('acronym', ($editing ? $course->acronym : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
