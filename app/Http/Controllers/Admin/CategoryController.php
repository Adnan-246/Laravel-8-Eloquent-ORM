<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
     //_Query builder_//
//     $category=DB::table('categories')->get();

     //_Eloquent_//
     $category = Category::all();

     return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');

    }

    //_Store Method_//

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',

         ]);

         //_ Save Method_//
         // $category= new Category;
         // $category->category_name=$request->category_name;
         // $category->category_slug= Str::of($request->category_name)->slug('-');
         // $category->save();


         //_Insert Method_//
         //_Here Category is the Model Name_//

         Category::insert([
             'category_name' => $request->category_name,
             'category_slug' => Str::of($request->category_name)->slug('-'),
         ]);

         return redirect()->back();

    }

    //_EditMethod_//
    public function edit($id)
    {
        // return $id;

        //__Query Builder__//
    //    $data=DB::table('categories')->where('id',$id)->first();

        //__Edit Data using Model__(use Model name)//
        $data=Category::find($id);

        return view('admin.category.edit',compact('data'));
    }

    //__data Update__//
    public function update(Request $request,$id)
    {
        $category=Category::find($id); //get the record
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        return redirect()->route('category.index');
    }

    //__Category delete method__//
    public function destroy($id)
    {
        //__Query Builder method__//
    //    DB::table('categories')->where('id',$id)->first();

        //__UsingModel__//
        // $category=Category::find($id);
        // $category->delete();

        //__Using DestroyMethod__//
        Category::destroy($id);
        return redirect()->back();
    }
}
