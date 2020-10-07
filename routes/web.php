<?php

use Illuminate\Support\Facades\Route;
// Use Request de nhan du lieu gui len theo kieu Request
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

// use DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin', 'test-admin');

// tao route resource cho student controller
Route::resource('students', StudentController::class)
    // ->only(['index']); khi chi dung ham nao do
    // ->except(['create', 'edit']); khi can bo qua ham nao do
;
// Tao route cho subject controller khong dung resource
Route::get('subjects', [SubjectController::class, 'index'])
    ->name('subjects.index');

Route::get('/post', function () {
    $post = \App\Models\Post::find(2);
    $comment = \App\Models\Comment::find(1);
    dd($comment->post);
});

// Route::get('/students', function () {
//     // Su dung query builder
//     // Lay ra mang students
//     $students = DB::table('students')->where('id', '<', 5)->get();
//     // Lay rieng 1 student
//     // $student = DB::table('students')->find(1);
//     $student = DB::table('students')->where('id', '=', 1)->first();


//     // truyen vao [ten bien view nhan duoc => gia tri];
//     return view('students.detail', ['studentValue' => $student]);
// });

// // Gia tri truyen vao url se tuong ung vi tri tham so cua function
// Route::get('/students/{id}/{age}', function ($id, $age) {
//     dd('Gia tri truyen vao tren url: ' . $id . ' ' . $age);
// });

// Route::get('/students/detail', function () {
//     return view('students.detail');
// });
// // Cach 2:
// Route::view('/students/detail-2', 'students.detail');

// Route::get('/student-list', function () {
//     // Truy van lay danh sach student bang query builder
//     $students = DB::table('students')->orderBy('id', 'desc')->get();

//     return view('students.list', [
//         'students' => $students,
//         'error' => null,
//     ]);
// })->name('student-list');

// Chuc nang login + route POST
Route::get('/login', function() {
    return view('login');
})->name('get-login');

Route::post('/post-login', function(Request $request) {
    // su dung $request->all() hoac $request->input name
    $username = $request->username;

    // Thuc hien truy van theo gia tri vua gui len
    $student = DB::table('students')
        ->where('name', 'like', "%$username%")
        ->first();

    // Neu co student thi se redirect sang student-list
    if ($student) {
        return redirect()->route('student-list');
    }
    // Neu khong thi quay lai man login
    return redirect()->route('get-login');

})->name('post-login');
