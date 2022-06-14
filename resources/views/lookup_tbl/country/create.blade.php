@extends('layouts.app')

@section('content')
<div class="container my-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Country') }} </div>
                    {{-- <a href="{{ route('home') }}" class="btn btn-sm btn-primary" style="float:right;">Back</a> --}}


                <div class="card-body">
                    <a href="{{ route('country.index') }}" class="btn btn-info btn-sm">All Countries</a>
                  <br><br>
                  <form method="post" action="{{ route('country.store') }}">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Country Name</label>
                      <input type="text" class="form-control @error('country_name') is-invalid @enderror" name="country_name" value="{{ old('country_name') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter country name" required>
                        @error('country_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
