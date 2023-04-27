@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color: #367fa9; font-weight: bolder;"> Add 
        Product
        <small style="color: #3c8dbc;">Enter Product Information please</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('view-products') }}">Products</a></li>
        <li class="active">Add 
        Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start --> 
            <form role="form" method="post" action="{{url('post-products')}}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Product Name</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Product Name" value="{{ old('title') }}">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="{{ old('slug') }}"> 
                  <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option>Select one</option>
                      @foreach($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                      @endforeach
                    </select>                         
                  <label for="subcategory_id">Sub Category</label>
                  <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option>Select one</option> 
                  </select>                 
                  <label for="thumbnail">Thumbnail</label>
                  <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                  <label for="title">Summary</label>
                  <textarea class="form-control" id="summary" name="summary" value="{{ old('summary') }}"></textarea>
                  <label for="title">Description</label>
                  <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>

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
                <button type="submit" class="btn btn-primary">Submit</button>
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
  $('#title').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
  });

  $('#category_id').change(function(){
    alert('ok')
  });
  </script>
  @endsection

