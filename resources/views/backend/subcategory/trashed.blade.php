<?php
use App\Models\Subcategory;
?>
@extends('backend.master')
@section('content');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color: #d73925 ; font-weight: bolder;">
        Trashed
        <small style="color: #dd4b39;">preview of all deleted data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">Sl No</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Slug</th>
                  <th>Created at</th>
                  <th class="text-center">Action</th>
                </tr>
                @forelse($category as $key=>$cat)
                <tr>
                  {{-- <td>{{ $cat->id }}</td> --}}
                  <td>{{ $category->firstItem() + $key }}</td>
                  <td>{{ $cat->subcategory_name }}</td>
                  <td>{{ $cat->category->category_name }}</td>
                  <td>{{ $cat->slug }}</td>
                  <td>{{ $cat->created_at->Format('d-M-Y h:i:s a') }} ({{ $cat->created_at->diffForHumans() }})</td>
                  <td class="text-center">
                    <a class="btn btn-success" href="{{ url('restore-subcategory') }}/{{ $cat->id }}">Restore</a>
                    <a class="btn btn-danger"  href="{{ url('permanent-delete-subcategory') }}/{{ $cat->id }}">Permanent Delete</a>
                  </td>
                </tr>
                @empty
                <td colspan="10" class="text-center">No Data Available</td>
                @endforelse
              </table>
            </div>
            <!-- /.box-body -->

            {{ $category->links()}}
            {{-- Pagination --}}
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
  </script>
  @endsection
