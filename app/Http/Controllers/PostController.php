<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Post::where('id', 21)->get('image_url'));

        $posts = Post::paginate(5); // lay ra ds co phan trang (5 phan tu/1trang)
        // Them param page="gia tri page"
        return view('posts.list', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Nho use App\Models\Student o ben tren
        // Lay danh sach sinh vien
        $students = Student::all();
        // Tra ve view tao post kem theo danh sach sinh vien vua lay ve
        return view('posts.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        // Validate cach 1
        // Dat validate o dau phuong thuc, neu co loi thi se tra ve bien $errors o view
        // $request->validate([
        //     'desc' => 'max:255',
        //     'content' => 'required|max:1000'
        // ]);

        // Validate cach 2: use PostStoreRequest va truyen no vao tham so
        // Neu khong pass cac rules trong PostStoreRequest -> errors o view kem message
        // Neu pass cac rules thi chay cau lenh ben duoi

        $post = new Post;
        // Kiem tra request gui len co file hay khong
        if ($request->hasFile('image')) {
            // Lay ra ten file gui len
            $originalFileName = $request->image->getClientOriginalName();
            // Format lai ten = uniqid + ten da duoc replace dau cach thanh _
            $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
            // Xu ly config config/filesystems.php
                // disk->local->root = public_path('')

                // storeAs('ten thu muc', 'ten file')
                // CHÚ Ý: ĐƯỜNG DẪN TRONG THƯ MỤC PUBLIC KHÔNG ĐƯỢC TRÙNG VỚI ĐƯỜNG DẪN TRONG ROUTE RESOURCE
                // DO ĐƯỜNG DẪN ĐẾN ẢNH SẼ BỊ TRÙNG VỚI ĐƯỜNG DẪN ROUTE -> KHÔNG PHÂN BIỆT ĐƯỢC
            $path = $request->file('image')->storeAs('images/posts', $fileName);
            // Gan duong dan vao thuoc tinh image_url cua post
            $post->image_url = $path;
        }

        // $post->desc = $request->desc;
        // fill se gan gia tri theo name o request vao post
        $post->fill($request->all());

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
