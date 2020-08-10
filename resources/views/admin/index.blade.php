@extends('layouts.admin')

@section('content')
    <h1 class="text-create">
        Home
    </h1>

    <div class="alert-success-update">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <div class="remove-success">x</div>
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 float-left">
                    <div class="form-group">
                        <label for=""><h3>Search</h3></label>
                        <div class="md-form active-pink active-pink-2 mb-3 mt-0">
                            <input id="search" class="form-control" type="text" name="search" placeholder="Search"
                                   aria-label="Search">
                        </div>
                    </div>
                    {{csrf_field()}}
                </div>
            </div>
            <div id="dyamic-popup">
                @foreach($students as $student)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <img class="images-studen img img-fluid" src="images/{{$student->images}}" alt="">
                                <div class="form-button">
                                    <a href="{{url('admin/'.$student->id.'/edit')}}" class="btn btn-primary button-fix">Chỉnh
                                        Sửa</a>
                                    <form action="{{url('admin/'.$student->id)}}" class="delete-method" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" name="submit"
                                               class="btn btn-primary button-fix delete-form"
                                               onclick="return confirm('Are you sure?')" value="xóa">
                                    </form>
                                </div>
                                <h5 class="card-title name">Họ và tên: {{$student->full_name}}</h5>
                                <h5 class="card-title name">Email: {{$student->email}}</h5>
                                <h5 class="card-title name">Giới tính: {{$student->gender ==0 ?"Nam" :"Nữ"}}</h5>
                                <h5 class="card-title name">Năm
                                    sinh: {{date('d-m-Y', strtotime($student->date_of_birth))}}</h5>
                                <h5 class="card-title name">Quê Quán: {{$student->countries->name}}</h5>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    {{--    <div class="pagination-page">--}}
    {{--        {!!$students->links()!!}--}}
    {{--    </div>--}}
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script !src="">
    $(document).ready(function () {
        $('body').on('keyup', '#search', function () {
            var search = $(this).val();
            $.ajax({
                method: "POST",
                url: "{{route('search')}}",
                dataType: 'json',
                data: {
                    '_token': '{{csrf_token()}}',
                    search: search,
                },
                success: function (res) {
                     function check_gender(val) {
                       var  sex='nữ';
                    if(val == 0){
                        sex= 'nam';
                        return sex;
                    }else{
                        return sex;
                    }
                    }
                    var tableRow = '';
                    $('#dyamic-popup').html('');
                    $.each(res, function (index, value) {
                        tableRow =
                            '<div class="col-md-4">' +
                            '                   <div class="card" style="width: 18rem;">' +
                            '                       <div class="card-body">' +
                            '                           <img class="images-studen img img-fluid" src="images/' + value.images + '" alt="">' +
                            '                           <div class="form-button">' +
                            '                               <a href="' + '\admin\/' + value.id + '\/edit\/' + '" class="btn btn-primary button-fix">Chỉnh Sửa</a>' +
                            '                               <form action="' + '\admin\/' + value.id + '" class="delete-method" method="POST">'+
                                                              ' {!! csrf_field() !!}'+
                                                          ' {!! method_field('DELETE') !!}'+
                            '                                   <input type="submit" name="submit" class="btn btn-primary button-fix delete-form" onclick="return confirm(\'Are you sure?\')"  value="xóa">'+
                            '                               </form>'+
                        '                           </div>'+
                        '                           <h5 class="card-title name">Họ và tên: '+value.full_name +'</h5>'+
                        '                           <h5 class="card-title name">Email: '+value.email+'</h5>' +
                        '                           <h5 class="card-title name">Giới tính: '+ check_gender(value.gender)+'</h5>'+
                            '                           <h5 class="card-title name">Năm sinh:'+value.date_of_birth+' </h5>' +
                            '                           <h5 class="card-title name">Quê Quán: '+value.country_id+'</h5>' +
                            '                       </div>' +
                            '                   </div>' +
                            '               </div>'
                        ;
                        $('#dyamic-popup').append(tableRow);
                        console.log(tableRow);
                    });
                }
            });
        });
    })
</script>
