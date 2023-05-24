<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day_name' => 'required',
            'moniteur_id' => 'required|exists:users,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'day_name' => 'required',
            'moniteur_id' => 'required|exists:users,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }

    public function addParticipant($courseId, $userId)
    {
        $course = Course::find($courseId);
        $user = User::find($userId);

        $course->users()->attach($user);

        return redirect()->route('courses.index');
    }

    public function removeParticipant($courseId, $userId)
    {
        $course = Course::find($courseId);
        $user = User::find($userId);

        $course->users()->detach($user);

        return redirect()->route('courses.index');
    }
}
