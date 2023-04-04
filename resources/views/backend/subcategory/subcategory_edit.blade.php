@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Edit Sub Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start --> 
            <form role="form" method="post" action="{{url('update-subcategory')}}">
              @csrf
               <div class="box-body">
                <div class="form-group">
                  <label for="subcategory_name">Category Name</label>
                  <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"  value="{{ $category->subcategory_name }}">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                  <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option value="{{ $category->category->id }}">{{ $category->category->category_name }}</option>
                      @foreach($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                      @endforeach
                    </select> 
                  <input type="hidden" class="form-control" id="exampleInputEmail1" name="id" value="{{  $category ->id }}">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('toaster')
 <script type="text/javascript">
  $('#subcategory_name').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
  });
  </script>
  @endsection
