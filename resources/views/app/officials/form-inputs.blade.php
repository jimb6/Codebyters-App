@php $editing = isset($official) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="position_id" label="Position" required>
            @php $selected = old('position_id', ($editing ? $official->position_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Position</option>
            @foreach($positions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
