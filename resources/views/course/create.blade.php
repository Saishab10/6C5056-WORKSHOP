<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>

    <h1>Register New Course</h1>

    @if($errors->any())
        <div>
            <h3>Please fix the following errors:</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/courses" method="POST">
        @csrf

        <div>
            <label>Course Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <br>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Duration (Weeks):</label>
            <input type="number" name="duration_weeks" value="{{ old('duration_weeks') }}">
        </div>

        <br>

        <div>
            <label>Fee:</label>
            <input type="number" step="0.01" name="fee" value="{{ old('fee') }}">
        </div>

        <br>

        <div>
            <label>Difficulty:</label>
            <select name="difficulty">
                <option value="">Select Difficulty</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </div>

        <br>

        <div>
            <label>
                <input type="checkbox" name="is_active" value="1" checked>
                Active Course
            </label>
        </div>

        <br>

        <button type="submit">Register Course</button>
    </form>

    <br>

    <a href="/courses">View All Courses</a>

</body>
</html>
