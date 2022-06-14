<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    //__Subcategory get__//
    public function index()
    {
        //__Using Query Builder Method__//
    //    $data=DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')->select('categories.category_name', 'subcategories.*')->get();
        //dd($data);


        //Using Model__//
        $data = Subcategory::all();
        
        return view('admin.subcategory.index',compact('data'));

        // return response()->json($data);
    }


    //__Create Method__//
    public function create()
    {
        $categories=Category::all();     //DB::table('Categories')->get();
        return view('admin.subcategory.create',compact('categories'));
    }

    //__Subcategory Store Method__//
    public function store(Request $request)
    {
        $request->validate([
        'category_id' => 'required',
        'subcategory_name' => 'required|unique:subcategories|max:255',

         ]);

         //_ Save Method_//
         // $category= new Category;
         // $category->category_name=$request->category_name;
         // $category->category_slug= Str::of($request->category_name)->slug('-');
         // $category->save();


         //_Insert Method_//
         //_Here Category is the Model Name_//

         Subcategory::insert([
             'category_id' => $request->category_id,
             'subcategory_name' => $request->subcategory_name,
             'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
         ]);

         $notification = array('message' => 'Sub-Category Inserted!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);

    }


}
