<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Crud;

class crudscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table("user")->get();
    
        return view('show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
          //| unique:connection.firstmodels,email
          $answers=$req->validate([
            'firstname'=>'required | min:3 | max:30',
            'lastname'=>'required | min:3 | max:30',
            'email'=>'required|unique:user,email|regex:/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/',

            'mobile'=> 'required|unique:user,mobile|regex:/^([+]\d{2}[ ])?\d{10}$/',

            'city'=>'required | min:5 | max:25',
            'gender'=>'required',
            /*'age'=>'required | min:5 | max:100 | integer | between:1,100',*/
            'photo'=>'required | mimes:jpeg,jpg,png | max:10000  ',
        ],
    [
        'email.regex' => 'Enter Email in valid Formate @ ',
       /* 'age.between' => 'age not greater than 100'*/

    ]);

        if($answers)
        {
            $filename = "Image-".time().".".$req->photo->extension();
            move_uploaded_file($req->photo,"uploads/$filename");

           $kk= DB::table("user")->insert([
                'firstname'=> $req->firstname,
                'lastname'=> $req->lastname,
                'email'=> $req->email,
                'city'=> $req->city,
                'gender'=> $req->gender,
                'age'=> $req->age,
                'mobile'=> $req->mobile,
                'status'=> $req->status,
                'image'=> $filename
                
            ]);

              return redirect("show");
            
        }
       

    }


/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table("user")->where('id',$id)->first();
     
        return view('edit',compact('data'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        DB::table("user")->where('id',$id)->update([
            'firstname'=> $req->firstname,
            'lastname'=> $req->lastname,
            'email'=> $req->email,
            'city'=> $req->city,
            'gender'=> $req->gender,
            'age'=> $req->age,
            'mobile'=> $req->mobile,
            'status'=> $req->status
            
        ]);

          return redirect("show");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("user")->where('id',$id)->delete();
        return redirect("show");
    }
}
