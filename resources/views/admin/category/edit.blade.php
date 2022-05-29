@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary" style="float:right;">Back</a>
                </div>

                <div class="card-body">
                    <a href="{{ route('category.index') }}" class="btn btn-info btn-sm">All Category</a>
                  <br><br>
                  <form method="post" action="{{ route('category.update',$data->id) }}">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control" name="category_name" value="{{ $data->category_name }}" id="exampleInputEmail1" aria-describedby="emailHelp"  required>

                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
