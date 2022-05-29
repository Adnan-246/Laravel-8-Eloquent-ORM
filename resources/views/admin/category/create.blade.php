@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Category') }}
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary" style="float:right;">Back</a>
                </div>

                <div class="card-body">
                    <a href="{{ route('category.index') }}" class="btn btn-info btn-sm">All Category</a>
                  <br><br>
                  <form method="post" action="{{ route('category.store') }}">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter category name" required>
                        @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
