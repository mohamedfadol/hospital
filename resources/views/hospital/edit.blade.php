@extends('layouts.header')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update {{$hospital->name}}
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('department.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('department.create')}}">Craete New Hospital</a></li></ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$hospital->name}} Hospital</h3>
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
                      action="{{route('hospital.update' , $hospital->id)}}" 
                          method="POST">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Hospital Name</label>
                  <input type="text" 
                            name="name"  
                                  class="form-control" 
                                      id="name" 
                                          placeholder="Enter Name Of Hospital"
                                            required value="{{$hospital->name}}" >
                </div>
                <div class="form-group">
                  <label for="about">About Hospital</label>
                  <textarea id="editor1" placeholder=" About Hospital" name="about" rows="10" cols="80" required>{{$hospital->about}}</textarea>
                </div>
                <div class="form-group">
                  <label for="address">Hospital Address</label>
                  <input type="text" 
                            name="address" 
                              class="form-control" 
                                id="address" 
                                  placeholder="About Lab Test"
                                  required value="{{$hospital->address}}" >
                </div>
                <div class="form-group">
                  <label for="email">Hospital E-mail</label>
                  <input type="text" 
                            name="email" 
                                class="form-control" 
                                    id="email" 
                                      placeholder="Hospital E-mail"
                                      required value="{{$hospital->email}}" >
                </div>
                <div class="form-group">
                  <label for="phone">Hospital Phone</label>
                  <input type="text" 
                            name="phone" 
                              class="form-control" 
                                id="phone" placeholder="About System Check" 
                                  required value="{{$hospital->phone}}" >
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Add New Hospital</button>
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
