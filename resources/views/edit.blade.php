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
            EDIT DATA
        </div>


        @if (Session::get('error'))
            {{ Session::get('error') }}
        @endif


        <form action="{{url("editdone/$data->id")}}" method="post" enctype="multipart/form-data">
            @csrf

            @error('firstname')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="firstname" class="form-group form-control" placeholder=" First Name "
                value=" {{ $data->firstname }}">


            @error('lastname')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="lastname" class="form-group form-control" placeholder=" Last Name "
                value=" {{ $data->lastname }}">


            @error('email')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="email" class="form-group form-control" placeholder=" Email Address "
                value=" {{ $data->email }}">


            @error('mobile')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="mobile" class="form-group form-control" placeholder=" Mobile Numberr "
                value=" {{ $data->mobile }}">


            @error('city')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="text" name="city" class="form-group form-control" placeholder=" City "
                value=" {{ $data->city }}">


            @error('gender')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <div class="form-group">
                <span class="h4">Gender</span>
                <span class="h6 m-1"> Male </span>
                <input type="radio" name="gender" value="male" 
                    @php
                        if ($data->gender == 'male') {
                            echo 'checked';
                        }
                    @endphp>

                <span class="h6 m-1"> Female</span>
                <input type="radio" name="gender" value="female" 
                    @php
                        if ($data->gender == 'female') {
                            echo 'checked';
                        }
                    @endphp>

                <span class="h6 m-1"> Other </span>
                <input type="radio" name="gender" value="other"
                    @php
                        if ($data->gender == 'other') {
                            echo 'checked';
                        }
                    @endphp>
            </div>


            @error('age')
                <div class="text-danger font-weight-bold"> {{ $message }}</div>
            @enderror
            <input type="number" name="age" class="form-group form-control" placeholder=" Age "  value="{{ $data->age }}">




            <div class="row">
                <div class="h4 text-center col-2">Status</div>

                <select name="status" class="col form-control"  value=" {{ $data->status }}">
                    <option value="noactive"   @php
                    if ($data->status == 'noactive') {
                        echo "selected='selected'";
                    }
                @endphp>Not Active</option>
                    
                    
                    <option value="active"   @php
                    if ($data->status == 'active') {
                        echo "selected='selected'" ;
                    }
                @endphp>Active</option>
                    
                    
                </select>

            </div>
            <input type="submit" value="Update" class="btn btn-secondary">
        </form>
    </div>


@endsection