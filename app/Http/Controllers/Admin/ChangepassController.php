<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Crypt;
use Hash;
use Auth;

class ChangepassController extends Controller
{
   public function changepass()
    {
        return view('admin.password.changePassword');

    }

    public function updatePassword(Request $request)
{
     $request->validate([
         'old_password' => 'required',
         'password' => 'required|min:4|max:12|string|confirmed',
         'password_confirmation' =>'required',
     ]);

     $user = Auth::user();

     if(Hash::check($request->old_password, $user->password)){

         $user->password=Hash::make($request->password); //hasing password from input field
         $user->save();

         return redirect()->back()->with('success', 'Password Changed Successfully');

     }else{
         return redirect()->back()->with('error', 'Current Password Not Matched');
     }
  }
}
