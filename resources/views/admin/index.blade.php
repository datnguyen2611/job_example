@extends('layouts.admin')

@section('content')
    <h1  class="text-create">
        Home
    </h1>
   <div class="container">
       <div class="row">
           @foreach($students as $student)
               <div class="col-md-4">
                   <div class="card" style="width: 18rem;">
                       <div class="card-body">
                           <img class="images-studen img img-fluid" src="images/{{$student->images}}" alt="">
                           <div class="form-button">
                               <a href="{{url('admin/'.$student->id.'/edit')}}" class="btn btn-primary button-fix">Chỉnh Sửa</a>
                               <form action="{{url('admin/'.$student->id)}}" class="delete-method" method="POST">
                                   {{csrf_field()}}
                                   {{method_field('DELETE')}}
                                   <input type="submit" name="submit"class="btn btn-primary button-fix delete-form" onclick="return confirm('Are you sure?')"  value="xóa">
                               </form>
                           </div>
                           <h5 class="card-title name">Họ và tên: {{$student->full_name}}</h5>
                           <h5 class="card-title name">Năm sinh: {{date('d-m-Y', strtotime($student->date_of_birth))}}</h5>
                           <h5 class="card-title name">Quê Quán: {{$student->countries->name}}</h5>

                       </div>
                   </div>
               </div>
           @endforeach

       </div>
   </div>
@endsection
