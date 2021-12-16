@extends('include.master')


@section('main')
    <div class=" text-center contain">
        <table class="table table-dark ">
            
            <tr>
                <td colspan="10" class="text-right">
                    <a href="{{url('add')}}" class="btn btn-primary">Add</a>
                </td>
            </tr>
            <tr class="text-info">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Profile Image</th>
                <th>Action</th>
            </tr>
@foreach ($data as $item)
    <tr class="text-light">
        <td>{{$item->firstname}}</td>
        <td>{{$item->lastname}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->age}}</td>
        <td>{{$item->mobile}}</td>
        <td>{{$item->city}}</td>
        <td>{{$item->gender}}</td>
        <td>
            @if ($item->status=='active')
                <span class="btn btn-success">Active</span>
            @else    
                <span class="btn btn-danger">In-Active</span>
            @endif
        </td>
        <td>
            <img src="uploads/{{$item->image}}" alt="" width="75px" height="75px" style="border-radius: 50%">
        </td>

        <td>
            <a href="delete/{{$item->id}}" class="btn-sm btn-danger"><i class="bi bi-archive"></i></a>
            <a href="edit/{{$item->id}}" class="btn-sm btn-primary"><i class="bi bi-pen"></i></a>
        </td>
    </tr>
@endforeach


        </table>
    </div>



@endsection