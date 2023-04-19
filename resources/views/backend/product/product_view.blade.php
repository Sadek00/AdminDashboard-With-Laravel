<?php
use App\Models\Product;
?>
@extends('backend.master')
@section('content');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color: #008d4c; font-weight: bolder;">
        Products
        <small style="color: #00a65a;">preview of all Products</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="{{ url('all-delete-product') }}">
                @csrf
              <table class="table table-bordered">
                <tr>
                  <th><input type="checkbox" id="checkAll" name=""> All</th>
                  <th style="width: 10px">Sl No</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Slug</th>
                  <th>Created at</th>
                  <th class="text-center">Action</th>
                </tr>
                @forelse($products as $key => $product)
                <tr>
                  <td><input type="checkbox" name="delete[]" value="{{ $product->id }}"></td>
                  {{-- <td>{{ $cat->id }}</td> --}}
                  <td>{{ $products->firstItem() + $key }}</td>
                  <td>{{ $product->subcategory_name }}</td>
                  <td>{{ $product->category->category_name}}</td>
                  <td>{{ $product->slug }}</td>
                  <td>{{ $product->created_at->Format('d-M-Y h:i:s a') }} ({{ $product->created_at->diffForHumans() }})</td>
                  <td class="text-center">
                    <a class="btn btn-success" href="{{ url('edit-subcategory')}}/{{ $cat->id }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('delete-subcategory') }}/{{ $cat->id }}">Delete</a>
                  </td>
                </tr>
                @empty
                <td colspan="10" class="text-center">No Data Available</td>
                @endforelse
              </table>
              <div class="text-left">
              <button type="submit" class="btn btn-danger"> Delete Selected </button>
              </div>
              </form>
            </div>
            <!-- /.box-body -->
            {{ $products->links()}}
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  @section('toaster')
  <script>
  @if(session('success'))

    Command: toastr["success"]("{{ session('success') }}")

      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
  }
  @endif

  //Checkbox script for multiple delete
  $("#checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked',this.checked); 
  });
  </script>
  @endsection
