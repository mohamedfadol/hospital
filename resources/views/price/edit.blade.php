@extends('layouts.header')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Price
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('price.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('price.create')}}">Craete Price</a></li>      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Price</h3>
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
                      action="{{route('price.update',$price->id)}}" 
                          method="POST" >
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Type Name</label>
                  <input type="text" 
                            name="type"  
                                  class="form-control" 
                                      id="type" 
                                          placeholder="Enter Name Of Type"
                                            required value="{{$price->type}}" >
                </div>
                <div class="form-group">
                  <label for="service">Service </label>
                  <input type="text" 
                            name="service" 
                              class="form-control" 
                              placeholder="Servces Price For" 
                                id="service" required value="{{$price->service}}" >
                </div>
                <div class="form-group">
                  <label for="price">Price </label>
                  <input type="text" 
                            name="price" 
                              class="form-control" 
                              placeholder="Price Amount" 
                                id="price" required value="{{$price->price}}" >
                </div>
                <div class="form-group">
                  <label for="about">About Price</label>
                  <textarea id="editor1" name="about" rows="10" cols="80" required>{{$price->about}}</textarea>
                </div>
  
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update Price</button>
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
