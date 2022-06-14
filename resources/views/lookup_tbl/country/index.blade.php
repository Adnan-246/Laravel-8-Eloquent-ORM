@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Countries</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             <li class="breadcrumb-item active">Country Table</li>
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
                 <h3 class="card-title">All Countries</h3>
                 <a href="{{ route('country.create') }}" class="btn btn-sm btn-primary" style="float:right;">Add Country</a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <td>Sl</td>
                        <td>Name</td>
                        <td>Slug</td>
                        <td>Action</td>
                     </tr>
                   </thead>
                   <tbody>
                      @foreach ($country as $key => $row)
                          <tr>
                             <td>{{ ++$key }}</td>
                             <td>{{ $row->country_name }}</td>
                             <td>{{ $row->country_slug }}</td>
                             <td>
                                  <a href="{{ route('country.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('country.delete',$row->id) }}" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
                             </td>
                          </tr>

                      @endforeach
                   </tbody>
                   {{-- <tfoot>
                   <tr>
                     <th>Rendering engine</th>
                     <th>Browser</th>
                     <th>Platform(s)</th>
                     <th>Engine version</th>
                     <th>CSS grade</th>
                   </tr>
                   </tfoot> --}}
                 </table>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
      </div>
   </div>
</section>
@endsection


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary" style="float:right;">Back</a>
                </div>

                <div class="card-body">
                    <a href="{{ route('category.create') }}" class="btn btn-info btn-sm">Add Category</a>
                  <br><br>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <td>Sl</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{{ $row->category_slug }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ route('category.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
