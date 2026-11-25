<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
</head>
<body>

    <h1>All Courses</h1>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="/courses/create">Create New Course</a>

    <br><br>

    @if($courses->count() > 0)

        <table border="1" cellpadding="10">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Duration (Weeks)</th>
                    <th>Fee</th>
                    <th>Difficulty</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->duration_weeks }}</td>
                        <td>{{ $course->fee }}</td>
                        <td>{{ $course->difficulty }}</td>
                        <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>

                        <td>
                            <a href="/courses/{{ $course->id }}">View</a>
                            |
                            <a href="/courses/{{ $course->id }}/edit">Edit</a>
                            |

                            <form action="/courses/{{ $course->id }}"
                                  method="POST"
                                  style="display: inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    @else

        <p>No courses found.</p>

    @endif

</body>
</html>
