<!-- Ke thua view master: admin-layout/master.blade.php -->
@extends('admin-layout.master')

<!-- Thay doi noi dung don gian -->
@section('title', 'Title list extends from admin-layout')

@section('content-header', 'Danh sach sinh vien')
<!-- Thay doi noi dung phuc tap -->
@section('content')
  <table border='1' class='table'>
      <thead>
          <th>Name</th>
          <th>Phone</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Active</th>
          <th>Actions</th>
      </thead>
      <tbody>
          @foreach($students as $student)
              <tr>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->phone }}</td>
                  <td>{{ $student->age }} </td>
                  <td>
                      @if ($student->gender == 0)
                          Female
                      @elseif ($student->gender == 1)
                          Male
                      @else
                          Nothing
                      @endif
                  </td>
                  <td>{{ $student->address }}</td>
                  <td>{{ $student->is_active == 1 ? 'Yes' : 'No' }}</td>
                  <td>
                    <form
                      action="{{ route('students.destroy', $student->id) }}"
                      method="POST"
                    >
                      @csrf
                      <input type='hidden' name='_method' value='DELETE'></input>
                      <button type='submit'>Delete</button>
                    </form>
                    <a href="{{ route('students.edit', $student->id) }}">
                      <button>Edit</button>
                    </a>
                  </td>
              </tr>
          @endforeach
          <!-- Them 1 dong de hien thi nut phan trang -->
          <tr><td colspan="7">{{$students->links()}}</td></tr>
      </tbody>
  </table>
@endsection

@section('footer', 'Footer list extends')
