<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class StudentController extends Controller
{
    public function index()
    {
        $student = new Student;

        if (request('search')) {
            if (request('filter') == '') {
                $student =  $student->where('nim', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('name', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('major', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('address', 'LIKE', '%' . request('search') . '%');
            } else {
                $student =  $student->where(request('filter'), 'LIKE', '%' . request('search') . '%');
            }
        }

        $student = $student->when(request('sort') ?? false, function ($student) {
            return $student->orderBy(request('sort'), request('sc'));
        });
        return view('index', ['students' => $student->paginate(7)->withQueryString(), 'row' => $student->count()]);
    }
    public function create()
    {
        return view('registration-form');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:10|unique:students',
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:M,F',
            'major' => 'required',
            'address' => '',
        ]);
        Student::create($validateData);
        $request->session()->flash('msg', "{$validateData['name']} data successfully added");
        return redirect()->route('students.index');
    }
    public function show($student)
    {
        // $result = Student::find($student);
        $result = Student::findOrFail($student);
        return view('show', ['student' => $result]);
    }
    public function edit(Student $student)
    {
        return view('edit', ['student' => $student]);
    }
    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:10|unique:students,nim,' . $student->id,
            'name' => 'required|min:3|max:50',
            'gender' => 'required|in:M,F',
            'major' => 'required',
            'address' => '',
        ]);
        $student->update($validateData);
        return redirect()->route('students.index', ['student' => $student->id])
            ->with('msg', "{$validateData['name']} data successfully updated");
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index', ['student' => $student->id])
            ->with('msg', "$student->name data successfully deleted");
    }
}
