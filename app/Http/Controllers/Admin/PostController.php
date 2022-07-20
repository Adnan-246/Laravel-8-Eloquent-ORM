<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class PostController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  //__Index Method__//
  public function index()
  {
      $posts=Post::all();
      return view('admin.post.index',compact('posts'));
  }

  //__Post Create Page__//
  public function create()
  {
    $category = Category::all();
    //$data = Subcategory::all();
     return view('admin.post.create',compact('category'));
  }

  //__Post Store Page__//
  public function store(Request $request)
  {

    $request->validate([
    'subcategory_id' => 'required',
    'title' => 'required',
    'tags' => 'required',
    'description' => 'required',
     ]);

    $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
    $slug=Str::of($request->title)->slug('-');

    $data=array();
    $data['category_id']=$categoryid;
    $data['subcategory_id']=$request->subcategory_id;
    $data['user_id']=Auth::id();
    $data['title']=$request->title;
    $data['slug']=$slug;
    $data['post_date']=$request->post_date;
    $data['tags']=$request->tags;
    $data['description']=$request->description;
    $data['status']=$request->status;
    $photo=$request->image;
    if ($photo) {
      $photoname=$slug.'.'.$photo->getClientOriginalExtension();
      Image::make($photo)->resize(600,400)->save('media/photos/'.$photoname);
      $data['image']='media/photos/'.$photoname;
      DB::table('posts')->insert($data);
      $notification = array('message' => 'Post Created!', 'alert-type' => 'success');
      return redirect()->back()->with($notification);
    }
    //Without any Image
    DB::table('posts')->insert($data);
    $notification = array('message' => 'Post Created!', 'alert-type' => 'success');
    return redirect()->back()->with($notification);
  }

  //__Delete Method__//
  public function destroy($id)
  {
      $post=Post::find($id);
      if(File::exists($post->image)){
        File::delete($post->image);
      }

      $post->delete();
      $notification = array('message' => 'Post Deleted!', 'alert-type' => 'danger');
      return redirect()->back()->with($notification);
  }

  //__Edit Method__//
  public function edit($id)
  {
    $category = Category::all();
    $post = Post::find($id);
    //$data = Subcategory::all();
     return view('admin.post.edit',compact('category', 'post'));
  }

  //__Post Update__//
  public function update(Request $request,$id)
  {
    $request->validate([
    'subcategory_id' => 'required',
    'title' => 'required',
    'tags' => 'required',
    'description' => 'required',
     ]);

    $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
    $slug=Str::of($request->title)->slug('-');

    $data=array();
    $data['category_id']=$categoryid;
    $data['subcategory_id']=$request->subcategory_id;
    $data['user_id']=Auth::id();
    $data['title']=$request->title;
    $data['slug']=$slug;
    $data['post_date']=$request->post_date;
    $data['tags']=$request->tags;
    $data['description']=$request->description;
    $data['status']=$request->status;
    $photo=$request->image;
    if ($photo) {

      //__Delete Old Image__//
      if(File::exists($request->old_image)){
         File::delete($request->old_image);
      }

      $photoname=$slug.'.'.$photo->getClientOriginalExtension();
      Image::make($photo)->resize(600,400)->save('media/photos/'.$photoname);
      $data['image']='media/photos/'.$photoname;
      DB::table('posts')->where('id',$id)->update($data);

      $notification = array('message' => 'Post Updated!', 'alert-type' => 'info');
      return redirect()->route('post.index')->with($notification);
    }else {
      $data['image']=$request->old_image;
      //Without any Image
      DB::table('posts')->where('id',$id)->update($data);
      $notification = array('message' => 'Post Updated!', 'alert-type' => 'info');
      return redirect()->route('post.index')->with($notification);
    }

  }



}
