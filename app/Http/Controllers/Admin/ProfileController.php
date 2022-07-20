<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
use Hash;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
   public function index()  //Request $id
   {
      $user = User::all();
   //   dd($user);

       return view('admin.profile.index',compact('user'));
   }

   //__Edit Profile__
   public function edit($id)
   {
      //$data=User::find($id);
      $data=DB::table('users')->where('id',$id)->first();

      return view('admin.profile.edit',compact('data'));
   }

   //__Update Profile__//
   public function update(Request $request,$id)
   {
   //   $data=Category::find($id);

      $data=User::find($id); //get the record
      $data->update([
       'f_name' => $request->f_name,
       'l_name' => $request->l_name,
       // 'department' => $request->department,
       'position' => $request->position,
       // 'email' => $request->email,
       'phone' => $request->phone,
       'country' => $request->country,
       'state' => $request->state,
       'city' => $request->city,
       'zip_code' => $request->zip_code,
       'address' => $request->address,

      ]);
      //return redirect()->route('admin.profile')->with('success', 'User Profile successfully updated!');
      $notification = array('message' => 'Profile Updated Successfully!', 'alert-type' => 'success');
       return redirect()->route('admin.profile')->with($notification);
   }
}
