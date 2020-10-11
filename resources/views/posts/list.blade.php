<!-- Ke thua view master: admin-layout/master.blade.php -->
@extends('admin-layout.master')

<!-- Thay doi noi dung don gian -->
@section('title', 'Title list extends from admin-layout')

@section('content-header', 'Danh sach post')
<!-- Thay doi noi dung phuc tap -->
@section('content')
<div>
    <form action="{{route('posts.index')}}" method='GET'>
        <input type="text" name='search'>
        <button type='submit'>Search</button>
    </form>
</div>
<div>
    <a href="{{route('posts.create')}}"><button class='btn btn-primary mb-1'>Create</button></a>
</div>
<table border='1' class='table'>
    <thead>
        <th>Desc</th>
        <th>Content</th>
        <th>Image</th>
        <th>Student</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->desc }}</td>
            <td>{{ $post->content }}</td>
            <td><img src="{{ $post->image_url }}" height="50" /> </td>
            <td>{{ $post->student->name }}</td>
            <td>{{ $post->status == 1 ? 'Published' : 'Unpublish' }}</td>
            <td>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    <input type='hidden' name='_method' value='DELETE'></input>
                    <button type='submit'>Delete</button>
                </form>
                <a href="{{ route('posts.edit', $post->id) }}">
                    <button>Edit</button>
                </a>
            </td>
        </tr>
        @endforeach
        <tr><td colspan="5">{{$posts->links()}}</td></tr>
    </tbody>
</table>
@endsection

@section('footer', 'Footer list extends')
