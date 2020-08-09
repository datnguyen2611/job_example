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
            <tbody id="dyamic-popup">
            @foreach($students as $student)

{{--                <div class="col-md-4">--}}
{{--                    <div class="card" style="width: 18rem;">--}}
{{--                        <div class="card-body">--}}
{{--                            <img class="images-studen img img-fluid" src="images/{{$student->images}}" alt="">--}}
{{--                            <div class="form-button">--}}
{{--                                <a href="{{url('admin/'.$student->id.'/edit')}}" class="btn btn-primary button-fix">Chỉnh--}}
{{--                                    Sửa</a>--}}
{{--                                <form action="{{url('admin/'.$student->id)}}" class="delete-method" method="POST">--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    {{method_field('DELETE')}}--}}
{{--                                    <input type="submit" name="submit" class="btn btn-primary button-fix delete-form"--}}
{{--                                           onclick="return confirm('Are you sure?')" value="xóa">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <h5 class="card-title name">Họ và tên: {{$student->full_name}}</h5>--}}
{{--                            <h5 class="card-title name">Email: {{$student->email}}</h5>--}}
{{--                            <h5 class="card-title name">Giới tính: {{$student->gender ==0 ?"Nam" :"Nữ"}}</h5>--}}
{{--                            <h5 class="card-title name">Năm--}}
{{--                                sinh: {{date('d-m-Y', strtotime($student->date_of_birth))}}</h5>--}}
{{--                            <h5 class="card-title name">Quê Quán: {{$student->countries->name}}</h5>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            @endforeach
            </tbody>

        </div>
    </div>
    <div class="pagination-page">
        {!!$students->links()!!}
    </div>
    <script !src="">
        $(document).ready(function () {
            fetch_customer_data();
            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{route('search')}}",
                    method: 'GET',
                    data: {query:query},
                    dataType: 'json',
                    success: function(data) {
                        // $('#dyamic-popup').html('');
                        $('#dyamic-popup').append(data.table_data);
                        console.log();
                    }
                });
            };

            $('body').on('keyup', '#search', function () {
                // $('#dyamic-popup').html('');
                // var search = $(this).val();
                var query = $(this).val();
                fetch_customer_data(query);
                {{--$.ajax({--}}
                {{--    method: "GET",--}}
                {{--    url: "{{route('search')}}",--}}
                {{--    dataType: 'json',--}}
                {{--    data: {--}}
                {{--        '_token': '{{csrf_token()}}',--}}
                {{--        search: search,--}}
                {{--    },--}}
                {{--    success: function (res) {--}}
                {{--        var tableRow = '';--}}
                {{--        $('#dyamic-popup').html('s');--}}
                {{--        $.each(res, function(index, value) {--}}

                {{--            --}}{{--tableRow =--}}
                {{--            --}}{{--    --}}{{----}}{{--' @foreach($students as $student)' +--}}
                {{--            --}}{{--    '<div class="col-md-4">\n' +--}}
                {{--            --}}{{--    '                   <div class="card" style="width: 18rem;">\n' +--}}
                {{--            --}}{{--    '                       <div class="card-body">\n' +--}}
                {{--            --}}{{--    '                           <img class="images-studen img img-fluid" src="images/{{$student->images}}" alt="">\n' +--}}
                {{--            --}}{{--    '                           <div class="form-button">\n' +--}}
                {{--            --}}{{--    '                               <a href="{{url('admin/'.$student->id.'edit')}}" class="btn btn-primary button-fix">Chỉnh Sửa</a>\n' +--}}
                {{--            --}}{{--    '                               <form action="{{url('admin/'.$student->id)}}" class="delete-method" method="POST">\n' +--}}
                {{--            --}}{{--    '                                   {{csrf_field()}}\n' +--}}
                {{--            --}}{{--    '                                   {{method_field('DELETE')}}\n' +--}}
                {{--            --}}{{--    '                                   <input type="submit" name="submit"class="btn btn-primary button-fix delete-form" onclick="return confirm(\'Are you sure?\')"  value="xóa">\n' +--}}
                {{--            --}}{{--    '                               </form>\n' +--}}
                {{--            --}}{{--    '                           </div>\n' +--}}
                {{--            --}}{{--    '                           <h5 class="card-title name">Họ và tên: {{$student->full_name}}</h5>\n' +--}}
                {{--            --}}{{--    '                           <h5 class="card-title name">Email: {{$student->email}}</h5>\n' +--}}
                {{--            --}}{{--    '                           <h5 class="card-title name">Giới tính: {{$student->gender ==0 ?"Nam" :"Nữ"}}</h5>\n' +--}}
                {{--            --}}{{--    '                           <h5 class="card-title name">Năm sinh: {{date('d-m-Y', strtotime($student->date_of_birth))}}</h5>\n' +--}}
                {{--            --}}{{--    '                           <h5 class="card-title name">Quê Quán: {{$student->countries->name}}</h5>\n' +--}}
                {{--            --}}{{--    '\n' +--}}
                {{--            --}}{{--    '                       </div>\n' +--}}
                {{--            --}}{{--    '                   </div>\n' +--}}
                {{--            --}}{{--    '               </div>'--}}
                {{--            --}}{{--    --}}{{----}}{{--+'@endforeach'--}}
                {{--            --}}{{--;--}}
                {{--                $('#dyamic-popup').append(tableRow);--}}
                {{--                console.log(tableRow);--}}
                {{--        });--}}
                {{--    }--}}
                {{--});--}}
            });
        });
    </script>
@endsection

