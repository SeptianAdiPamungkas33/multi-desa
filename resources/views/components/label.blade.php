@props(['for' => '', 'required' => true, 'disabled' => true])
<label {{ $attributes->merge([
        'class' => 'block mb-2 font-medium text-neutral-900',
        'for' => $for,
    ]) }}>
    {{ Str::ucfirst($slot) }}
    @if ($disabled === true)
    @if ($required)
    <span class="text-red-500">*</span>
    @elseif($required === false)
    <span class="text-sm text-neutral-400">(Optional)</span>
    @endif
    @endif
</label>