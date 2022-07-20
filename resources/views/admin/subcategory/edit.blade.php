@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update SubCategory') }}
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary" style="float:right;">Back</a>
                </div>

                <div class="card-body">
                    <a href="{{ route('subcategory.index') }}" class="btn btn-info btn-sm">All SubCategory</a>
                  <br><br>
                  <form method="post" action="{{ route('subcategory.update',$data->id) }}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Choose Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $row)
                                <option value="{{ $row->id }}" @if($row->id==$data->category_id) selected @endif>{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">SubCategory Name</label>
                      <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" value="{{ $data->subcategory_name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter subcategory name" required>
                        @error('subcategory_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
