@php $editing = isset($institute) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $institute->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="acronym"
            label="Acronym"
            value="{{ old('acronym', ($editing ? $institute->acronym : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="color_theme"
            label="Color Theme"
            value="{{ old('color_theme', ($editing ? $institute->color_theme : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
