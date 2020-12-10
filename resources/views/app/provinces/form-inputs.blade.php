@php $editing = isset($province) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $province->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
