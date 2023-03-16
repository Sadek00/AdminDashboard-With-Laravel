@extends('backend.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Simple Tables
        <small>preview of simple tables</small>
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
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">Sl No</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created at</th>
                  <th class="text-center">Action</th>
                </tr>
                @foreach($category as $category)
                <tr>
                  {{-- <td>{{ $category->id }}</td> --}}
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $category->category_name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>{{ $category->created_at->Format('d-M-Y h:i:s a') }} ({{ $category->created_at->diffForHumans() }})</td>
                  <td class="text-center">
                    <a class="btn btn-success" href="">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection