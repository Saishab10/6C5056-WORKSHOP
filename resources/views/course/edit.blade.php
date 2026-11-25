<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    <form action="/courses/{{ $course->id }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label>Course Name:</label>
            <input type="text" name="name"
                   value="{{ old('name', $course->name) }}">
        </div>

        <br>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $course->description) }}</textarea>
        </div>

        <br>

        <div>
            <label>Duration (Weeks):</label>
            <input type="number" name="duration_weeks"
                   value="{{ old('duration_weeks', $course->duration_weeks) }}">
        </div>

        <br>

        <div>
            <label>Fee:</label>
            <input type="number" step="0.01" name="fee"
                   value="{{ old('fee', $course->fee) }}">
        </div>

        <br>

        <div>
            <label>Difficulty:</label>
            <select name="difficulty">
                <option value="Easy" {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
                <option value="Medium" {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Hard" {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
            </select>
        </div>

        <br>

        <div>
            <label>
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                Active Course
            </label>
        </div>

        <br>

        <button type="submit">Update Course</button>

    </form>

    <br>

    <a href="/courses">Back to Courses</a>

</body>
</html>
