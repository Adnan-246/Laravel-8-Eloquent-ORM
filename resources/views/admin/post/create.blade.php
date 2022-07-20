@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Create Post</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             <li class="breadcrumb-item active">Post Create</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Add New Post</h3>
                  <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary" style="float:right;">Manage Posts</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Post Title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select class="form-control" name="subcategory_id">
                          <option disabled selected>Choose Category</option>
                            @foreach ($category as $row)
                              @php
                                $subcategories=DB::table('subcategories')->where('category_id',$row->id)->get();
                              @endphp
                              <option disabled class="text-info">{{ $row->category_name }}</option>
                                @foreach ($subcategories as $sub)
                                  <option value="{{ $sub->id }}">---{{ $sub->subcategory_name }}</option>
                                @endforeach
                            @endforeach

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Post Date</label>
                        <input type="date" name="post_date" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tags</label>
                        <input type="text" name="tags" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control summernote"  name="description" rows="6"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" >
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="status" value="1" >
                        <label class="form-check-label" for="exampleCheck1">Published Now</label>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
       </div>
    </div>
   </section>

@endsection
