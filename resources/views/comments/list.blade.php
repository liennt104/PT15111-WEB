<!-- Ke thua view master: admin-layout/master.blade.php -->
@extends('admin-layout.master')

<!-- Thay doi noi dung don gian -->
@section('title', 'Title list extends from admin-layout')

@section('content-header', 'Danh sach comment')
<!-- Thay doi noi dung phuc tap -->
@section('content')
<div>
    <form action="{{route('comments.index')}}" method='GET'>
        <input type="text" name='search'>
        <button type='submit'>Search</button>
    </form>
</div>
<div>
    <a href="{{route('comments.create')}}"><button class='btn btn-primary mb-1'>Create</button></a>
</div>
<table border='1' class='table'>
    <thead>
        <th>Post</th>
        <th>Student</th>
        <th>Content</th>
        <th>Created At</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($comments as $cmt)
        <tr>
            <td>{{ $cmt->post->desc }}</td>
            <td>{{ $cmt->student->name }}</td>
            <td>{{ $cmt->content }}</td>
            <td>{{ $cmt->created_at }}</td>
            <td>{{ $cmt->status == 1 ? 'Published' : 'Unpublish' }}</td>
            <td>
                <form action="{{ route('comments.destroy', $cmt->id) }}" method="POST">
                    @csrf
                    <input type='hidden' name='_method' value='DELETE'></input>
                    <button type='submit'>Delete</button>
                </form>
                <a href="{{ route('comments.edit', $cmt->id) }}">
                    <button>Edit</button>
                </a>
            </td>
        </tr>
        @endforeach
        <tr><td colspan="5">{{$comments->links()}}</td></tr>
    </tbody>
</table>
@endsection

@section('footer', 'Footer list extends')
