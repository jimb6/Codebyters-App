@php $editing = isset($address) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="city_id" label="City" required>
            @php $selected = old('city_id', ($editing ? $address->city_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the City</option>
            @foreach($cities as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
