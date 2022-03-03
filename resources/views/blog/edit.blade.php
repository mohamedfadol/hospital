@extends('layouts.header')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update News
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('department.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('new.create')}}">Craete News</a></li>      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update News</h3>
            </div>
            <!-- /.box-header -->

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Sorry!</strong> There were more problems with your Fillable Field<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
            @endif


            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div> 
            @endif


            <!-- form start -->
            <form role="form" 
                      action="{{route('new.update',$blog->id)}}" 
                          method="POST" 
                              enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">News Name</label>
                  <input type="text" 
                            name="name"  
                                  class="form-control" 
                                      id="name" 
                                          placeholder="Enter Name Of News"
                                            required value="{{$blog->name}}" >
                </div>
                <div class="form-group">
                  <label for="about">About News</label>
                  <textarea id="editor1" name="about" rows="10" cols="80" required>{{$blog->about}}</textarea>
                </div>
  
                <div class="form-group">
                  <label for="image">Image </label>
                  <input type="file" 
                            name="image" 
                              class="form-control" 
                                id="image" required value="{{$blog->image}}" >
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Add News</button>
                </div>
              </div> 
            </form>
          </div>
          </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection
