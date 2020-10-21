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
              <tr id="student-{{$student->id}}">
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
                    <button id="delete-btn" data-id="{{$student->id}}" >Delete</button>
                    <!-- <form
                      action="{{ route('students.destroy', $student->id) }}"
                      method="POST"
                    >
                      @csrf
                      <input type='hidden' name='_method' value='DELETE'></input>
                      <button type='submit'>Delete</button>
                    </form> -->
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
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script>
  // dat id vao button muon xoa va data-id=student->id
  $(document).ready(function () {
    $('#delete-btn').click(function (event) {
      event.preventDefault();
      if(!confirm('Co muon xoa sv k?')) {
        return false;
      }

      // var deleteID = $(this).attr('data-id');
      var deleteID = $(this).data('id');

      var token = $('meta[name="csrf"]').attr('content');
      console.log(deleteID, token);

      $.ajax({
        url: 'students/' + deleteID,
        type: 'DELETE',
        data: {
          _token: token
        },
        success: function () {
          // Dat id cho tr tuong ung voi id cua sv: student-{{$student->id}}
          // Tim tr do de xoa di khi da xoa trong DB thanh cong
          $('#student-' + deleteID).remove();
        }}
      )
    })
  })
  </script>
@endsection

@section('footer', 'Footer list extends')
