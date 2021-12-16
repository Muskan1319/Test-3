@extends('include.master')
@section('main')
<head>
    <style>
        form{
            border:purple solid 4px;
            padding:15px 15px 15px 15px;
            border-radius:2px 2px 2px 2px;
        }
        </style>
</head>
    <div class="col-5 m-auto">
        <div class="h1 text-success text-center">
            ENTER DATA
        </div>

   @if (Session::get("error"))
       {{Session::get("error")}}
   @endif


        <form action="{{ url('adddone') }}" method="post" enctype="multipart/form-data">
            @csrf

            <span id="nameerror"></span>
            @error('firstname')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" id="name" name="firstname" class="form-group form-control" placeholder=" First Name " value="{{old('firstname')}}">


            @error('lastname')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="lastname" class="form-group form-control" placeholder=" Last Name "  value="{{old('lastname')}}">


            @error('email')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="email" class="form-group form-control" placeholder=" Email Address " value="{{old('email')}}">

            
            @error('mobile')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="mobile" class="form-group form-control" placeholder=" Mobile Numberr " value="{{old('mobile')}}">

            
            @error('city')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="city" class="form-group form-control" placeholder=" City "  value="{{old('city')}}">

            
            @error('gender')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <div class="form-group"> 
                <span class="h4">Gender</span>
      <span class="h6 m-1"> Male </span>    <input type="radio" name="gender" value="male" >
      <span class="h6 m-1"> Female</span>     <input type="radio" name="gender" value="female">
      <span class="h6 m-1"> Other </span>    <input type="radio" name="gender" value="other" >
            </div>

            
            @error('age')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="number" name="age" class="form-group form-control" placeholder=" Age "  value="{{old('age')}}">
           
               
            @error('photo')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <span class="h4"> Profile Image</span> <input type="file" name="photo" class="form-group">

                   
       
            <div class="row">
                <div class="h4 text-center col-2">Status</div>

                <select name="status" class="col form-control">
                    <option value="noactive">Not Active</option>
                    <option value="active">Active</option>
                </select>

            </div>
            <input type="submit" value="ADD" class="btn btn-info">
        </form>
    </div>


@endsection