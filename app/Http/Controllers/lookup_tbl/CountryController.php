<?php

namespace App\Http\Controllers\lookup_tbl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Str;

class CountryController extends Controller
{
      public function index()
      {
         //_Eloquent_//
          $country = Country::all();

          return view('lookup_tbl.country.index',compact('country'));
      }

      //_-Create Method__//
   public function create()
   {
       // $country=Country::all();
       return view('lookup_tbl.country.create');

   }

      //_Store Method_//

    public function store(Request $request)
    {
        $request->validate([
         //  'country' => 'required',
            'country_name' => 'required|unique:countries|max:255',

         ]);

         //_ Save Method_//
         // $category= new Category;
         // $category->category_name=$request->category_name;
         // $category->category_slug= Str::of($request->category_name)->slug('-');
         // $category->save();


         //_Insert Method_ using Model//
         //_Here Category is the Model Name_//

         Country::insert([
            //'country' => $request->country,
             'country_name' => $request->country_name,
             'country_slug' => Str::of($request->country_name)->slug('-'),
         ]);

         $notification = array('message' => 'Added New Country!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);

    }
 //
 //             //_EditMethod_//
 //          public function edit($id)
 //          {
 //              // return $id;
 //
 //              //__Query Builder__//
 //          //    $data=DB::table('categories')->where('id',$id)->first();
 //
 //              //__Edit Data using Model__(use Model name)//
 //              $data=Country::find($id);
 //
 //              return view('lookup_tbl.country.edit',compact('data'));
 //          }
 //
 //          //__data Update__//
 //          public function update(Request $request,$id)
 //          {
 //              $country=Country::find($id); //get the record
 //              $country->update([
 //                   'country_name' => $request->country_name,
 //                   'country_slug' => Str::of($request->country_name)->slug('-'),
 //              ]);
 //              $notification = array('message' => 'Successfully Updated!', 'alert-type' => 'success');
 //              return redirect()->route('country.index')->with($notification);
 //          }
 //
 //          //__Category delete method__//
 //          public function destroy($id)
 //          {
 //              //__Query Builder method__//
 //          //    DB::table('categories')->where('id',$id)->first();
 //
 //              //__UsingModel__//
 //              // $category=Category::find($id);
 //              // $category->delete();
 //
 //              //__Using DestroyMethod__//
 //              Category::destroy($id);
 //
 //              $notification = array('message' => 'Successfully Deleted!', 'alert-type' => 'success');
 //              return redirect()->back()->with($notification);
 //              // return redirect()->back();
 // }

}
