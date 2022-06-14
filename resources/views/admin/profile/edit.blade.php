@extends('layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
                <div class="card-header">
                  {{-- <h3 class="card-title">All Category --}}
                    {{-- <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-primary">Edit Profile</a> --}}
                  {{-- </h3> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  {{-- @if(session()->has('success'))
                   <strong class="text-success">{{ session()->get('success') }}</strong>
                   @endif --}}

                  <form class=" mt-3 needs-validation" action="{{ route('admin.profile.update', $data->id) }}" method="POST" enctype="multipart/form-data" novalidate >
                      @csrf

                      <div class="mb-3 row">
                       <label for="image" class="col-md-3 col-form-label">Profile Avatar</label>
                          <div class="col-md-8">
                             <input type="image" class="form-control" id="image" name="image" value="{{ $data->image }}" >
                           </div>
                         </div>

                     <div class="mb-3 row">
                      <label for="f_name" class="col-md-3 col-form-label">First Name</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $data->f_name }}" >
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="l_name" class="col-md-3 col-form-label">Last Name</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $data->l_name }}" >
                          </div>
                        </div>

                     {{-- <div class="mb-3 row">
                      <label for="full_name" class="col-md-3 col-form-label">Full Name</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data->f_name.' '.$data->l_name }}" >
                          </div>
                        </div> --}}

                     <div class="mb-3 row">
                      <label for="department" class="col-md-3 col-form-label">Department</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="department" name="department" value="{{ $data->department }}" >
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="position" class="col-md-3 col-form-label">Position</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="position" name="position" value="{{ $data->position }}" >
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                         <div class="col-md-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" >
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="phone" class="col-md-3 col-form-label">phone</label>
                         <div class="col-md-8">
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" pattern="[0-9]{5}--[0-9]{6}">
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="country" class="col-md-3 col-form-label">Country</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="country" name="country" value="{{ $data->country }}">
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="state" class="col-md-3 col-form-label">State</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="state" name="state" value="{{ $data->state }}">
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="city" class="col-md-3 col-form-label">City</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="city" name="city" value="{{ $data->city }}">
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="zip_code" class="col-md-3 col-form-label">Zip Code</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $data->zip_code }}">
                          </div>
                        </div>

                     <div class="mb-3 row">
                      <label for="address" class="col-md-3 col-form-label">Address</label>
                         <div class="col-md-8">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $data->address }}" >
                          </div>
                        </div>

                        <br><br>
                        <button type="submit" class="btn btn-primary">Update</button>

                   </form>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
       </div>
    </div>
 </section>
    <!-- /.content -->
  </div>

@endsection
