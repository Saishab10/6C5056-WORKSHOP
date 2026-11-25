<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

// Home page
Route::get('/', function () {
    return view('welcome');
});


// ================= STUDENT ROUTES =================

// Create student form
Route::get('/students/create', function () {
    return view('student.create');
});

// Store student
Route::post('/students', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create($validated);

    return redirect('/students')
        ->with('success', 'Student created successfully!');
});

// List students
Route::get('/students', function () {
    $students = Student::all();

    return view('student.list', compact('students'));
});

// Student details
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.detail', compact('student'));
});

// Edit student
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));
});

// Update student
Route::put('/students/{id}', function (Request $request, $id) {

    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students')
        ->with('success', 'Student updated successfully!');
});

// Delete student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully!');
});


// ================= COURSE ROUTES =================

// Create course form
Route::get('/courses/create', function () {
    return view('course.create');
});

// Store course
Route::post('/courses', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration_weeks' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    Course::create($validated);

    return redirect('/courses')
        ->with('success', 'Course created successfully!');
});

// List courses
Route::get('/courses', function () {
    $courses = Course::all();

    return view('course.list', compact('courses'));
});

// Course details
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.detail', compact('course'));
});

// Edit course
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.edit', compact('course'));
});

// Update course
Route::put('/courses/{id}', function (Request $request, $id) {

    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration_weeks' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course->update($validated);

    return redirect('/courses')
        ->with('success', 'Course updated successfully!');
});

// Delete course
Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect('/courses')
        ->with('success', 'Course deleted successfully!');
});
