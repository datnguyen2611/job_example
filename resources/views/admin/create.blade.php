@extends('layouts.admin')

@section('content')
    <h1 class="text-create">Create form</h1>
    <form class="form-create"  action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="full_name">Full Name</label>
                <input name="full_name" type="name" class="form-control" id="inputEmail4" placeholder="Full name">
            </div>
            <div class="form-group col-md-6">
                <label for="name">email</label>
                <input name="email" class="form-control" id="inputEmail4" placeholder="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <select class="custom-select" id="gender2" name="gender">
            <option selected>Choose...</option>
            <option value="0">Male</option>
            <option value="1">Female</option>
        </select>
        <div class="form-group">
            <label for="inputAddress">Birth date</label>
            <input name="birth-date" type="date" class="form-control" id="inputAddress" placeholder="09/10/2000">
        </div>
        <div class="form-group">
            <label for="inputAddress">country code</label>
            <select class="custom-select" id="gender2" name="country_code">
                <option selected>Choose code</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->code}}({{$country->name}})</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <label class="custom-file-label" for="customFileLang">images</label>
                <input name="images" type="file" class="custom-file-input" id="customFileLang" lang="es">

            </div>
{{--            <input type="file" name="images">--}}
        </div>
        <div class="form-group">
            <div class="custom-file">
                <button name="submit" type="submit" class="btn btn-primary button-fix">Create</button>
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
