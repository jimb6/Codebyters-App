@php $editing = isset($tag) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $tag->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.number
            name="point_value"
            label="Point Value"
            value="{{ old('point_value', ($editing ? $tag->point_value : '')) }}"
            max="255"
            step="0.01"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
