<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // index() su dung phuong thuc GET, route name la students.index
    public function index()
    {
        // $students = Student::all(); //lay ra het
        // hoac $students = Student::orderBy('id', 'desc')->get();
        $students = Student::paginate(5); // lay ra ds co phan trang (5 phan tu/1trang)
        // Them param page="gia tri page"
        return view('students.list', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // create() su dung phuong thuc GET, route name la students.create
    public function create()
    {
        dd('Student Controller create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;

        $student->name = $request->name;
        // ....
        $student->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // show su dung phuong thuc GET, route name la students.show
    public function show(Student $student)
    {
        // // Neu chi truyen vao $student -> nhan duoc id cua Student
        // $studentObjEloquentModel = Student::find($student);
        // $studentObjQueryBuilder = DB::table('students')->find($student);
        // dd($studentObjEloquentModel->name, $studentObjQueryBuilder->name);

        // // Neu truyen Student $student -> thuc hien truy van tim Student co id = $student
        // $studentObj = $student;

        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // dd($request->all());
        // Gan gia tri moi cho cac thuoc tinh cua student can update
        $student->name = $request->name;

        // Thuc hien goi phuong thuc save() de luu du lieu
        $student->save();

        // Cach 2: $student->update(['name' => $request->name]);
        // Hoac $student->update([$request->all()])
        // Khong can save

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // Kiem tra ton tai sinh vien -> xoa
        if($student) {
            $student->delete(); // tra ve ket qua true/false
        }

        // Cach 2: Student::destroy($student->id); // tra ve so luong ban ghi bi xoa
        // Redirect ve danh sach (co thuc hien truy van lay ds moi)
        return redirect()->route('students.index');
    }
}
