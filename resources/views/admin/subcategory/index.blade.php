@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>SubCategory</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             <li class="breadcrumb-item active">SubCategory Table</li>
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
                 <h3 class="card-title">All SubCategory</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                        <td>Sl</td>
                        <td>Category</td>
                        <td>SubCategory</td>
                        <td>Slug</td>
                        <td>Action</td>
                     </tr>
                   </thead>
                   <tbody>
                      @foreach ($data as $key => $row)
                          <tr>
                             <td>{{ ++$key }}</td>
                             <td>{{ $row->category->category_name }}</td>
                             <td>{{ $row->subcategory_name }}</td>
                             <td>{{ $row->subcategory_slug }}</td>
                             <td>
                                  <a href="{{ route('category.edit', $row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('category.delete',$row->id) }}" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
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
