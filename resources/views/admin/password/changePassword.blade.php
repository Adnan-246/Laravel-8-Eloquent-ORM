@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}
                    {{-- <a href="{{ route('home') }}" class="btn btn-sm btn-primary" style="float:right;">Back</a> --}}
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                     <strong class="text-success">{{ session()->get('success') }}</strong>
                     @endif

                     @if (session()->has('error'))

                     <strong class="text-danger">{{ session()->get('error') }}</strong>

                     @endif

                     <form action="{{ route('update.password') }}" method="POST">
                       @csrf
                       <div>
                         <label>Current Password</label>
                         <input type="password" name="old_password" class="form-control" required>
                       </div>
                       <br>
                       <div>
                         <label>New Password</label>
                         <input type="password" name="password" class="form-control @error('password') is-invalid
                           
                         @enderror" required>
                       </div>
                       <br>
                       <div>
                         <label>Confirm Password</label>
                         <input type="password" name="password_confirmation" class="form-control" required>
                       </div>
                       <br><br>
                       <button type="submit" class="btn btn-info" >Change Password</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
