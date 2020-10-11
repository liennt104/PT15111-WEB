<!-- Ke thua view master: admin-layout/master.blade.php -->
@extends('admin-layout.master')

<!-- Thay doi noi dung don gian -->
@section('title', 'Title list extends from admin-layout')

@section('content-header', 'Danh sach category')
<!-- Thay doi noi dung phuc tap -->
@section('content')
<div>
    <form action="{{route('categories.index')}}" method='GET'>
        <input type="text" name='search'>
        <button type='submit'>Search</button>
    </form>
</div>
<div>
    <a href="{{route('categories.create')}}"><button class='btn btn-primary mb-1'>Create</button></a>
</div>
<table border='1' class='table'>
    <thead>
        <th>Name</th>
        <th>Parent Category</th>
        <th>Total Post</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($categories as $cate)
        <tr>
            <td>{{ $cate->name }}</td>
            <td>{{ $cate->parent->name }}</td>
            <td>{{ $cate->posts()->count() }}</td>
            <td>{{ $cate->status == 1 ? 'Published' : 'Unpublish' }}</td>
            <td>
                <form action="{{ route('categories.destroy', $cate->id) }}" method="POST">
                    @csrf
                    <input type='hidden' name='_method' value='DELETE'></input>
                    <button type='submit'>Delete</button>
                </form>
                <a href="{{ route('categories.edit', $cate->id) }}">
                    <button>Edit</button>
                </a>
            </td>
        </tr>
        @endforeach
        <tr><td colspan="5">{{$categories->links()}}</td></tr>
    </tbody>
</table>
@endsection

@section('footer', 'Footer list extends')
