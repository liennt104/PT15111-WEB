@extends('admin-layout.master')

@section('title', 'Create Post')

@section('header-content', 'Create Post')

@section('content')
    <!-- kiem tra co bat ky loi nao bang phuong thuc any() -->
    @if ($errors->any())
        <ul>
        <!-- Neu co loi thi se foreach de hien thi loi ra -->
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form
        action="{{route('posts.store')}}"
        method="POST"
        enctype="multipart/form-data"
    >
    <!-- voi form co file thi can ectype o the form -->
        @csrf
        <div><input type="text" name="desc" placeholder="Desc" /></div>
        <div><input type="text" name="content" placeholder="Content" /></div>
        <div><input type="file" name="image"></div>
        <div>
            <select name="student_id" id="">
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            Publish
            <input type="radio" name="status" value="1" />
        </div>
        <div>
            UnPublish
            <input type="radio" name="status" value="0" />
        </div>
        <div><button type="submit">SUBMIT</button></div>
    </form>
@endsection
