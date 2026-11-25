@php
    $course = $course ?? new \App\Models\Course(['is_active' => true]);
@endphp

<x-form-input
    name="name"
    label="Course Name"
    :value="$course->name"
/>

<x-form-textarea
    name="description"
    label="Description"
    :value="$course->description"
/>

<x-form-input
    name="duration_weeks"
    label="Duration (weeks)"
    type="number"
    :value="$course->duration_weeks"
/>

<x-form-input
    name="fee"
    label="Course Fee"
    type="number"
    :value="$course->fee"
/>

<div class="form-group">
    <label for="difficulty">Difficulty</label>

    <select name="difficulty" id="difficulty">
        @foreach(['Easy', 'Medium', 'Hard'] as $level)
            <option value="{{ $level }}"
                @selected(old('difficulty', $course->difficulty) === $level)>
                {{ $level }}
            </option>
        @endforeach
    </select>

    @error('difficulty')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <input type="hidden" name="is_active" value="0">

    <input
        type="checkbox"
        name="is_active"
        id="is_active"
        value="1"
        @checked(old('is_active', $course->is_active))
    >

    <label for="is_active">Active</label>
</div>
