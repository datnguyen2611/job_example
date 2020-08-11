@extends('layouts.admin')

@section('content')
    <h1 class="text-create">Update form</h1>
    <form class="form-create"  action="{{route('admin.update',$students->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="full_name">Full Name</label>
                <input name="full_name" type="name" class="form-control" id="inputEmail4" placeholder="{{$students->full_name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="name">email</label>
                <input name="email" class="form-control" id="inputEmail4" placeholder="{{$students->email}}">
            </div>
        </div>
        <select class="custom-select" id="gender2" name="gender">
            <option selected></option>
            <option value="0">Male</option>
            <option value="1">Female</option>
        </select>
        <div class="form-group">
            <label for="inputAddress">Birth date</label>
            <input name="birth-date" type="text" class="form-control" id="inputAddress" onfocus="(this.type='date')"
                   placeholder="{{$students->date_of_birth}}">
        </div>
        <div class="form-group">
            <label for="inputAddress">country code</label>
            <select class="custom-select" id="gender2" name="country_code" >
                <option selected value=""></option>
                   @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->code}}({{$country->name}})</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" name="images" value="{{$students->images}}">


            </div>
            <div class="form-group">
                <img src="{{url('/images/'.$students->images)}}" alt="" width="100px" height="100px">

        </div>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <button name="submit" type="submit" class="btn btn-primary button-fix">Update</button>
                <a href="{{route('admin.index')}}" name="button" type="button" class="btn btn-primary button-fix ">Cancel</a>
            </div>
        </div>

    </form>
    <div class="row">
        <div class="alert alert-danger alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
