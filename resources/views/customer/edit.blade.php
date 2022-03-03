@extends('layouts.header')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Customer
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('department.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('customer.create')}}">Craete New Customer</a></li>      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Confirme Customer</h3>
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
                      action="{{route('customer.update' , $customr->id)}}" 
                          method="POST" 
                              enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Customer First Name</label>
                  <input type="text" 
                            name="name"  
                                  class="form-control" 
                                      id="name" 
                                          placeholder="Enter First Name Of Customer"
                                            required value="{{$customr->name}}" >
                </div>

                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" 
                            name="email" 
                              class="form-control" 
                                id="email" 
                                  placeholder="Customer E-mail"
                                  required value="{{$customr->email}}" >
                </div>
                <div class="form-group">
                  <label for="phone">Customer Phone</label>
                  <input type="text" 
                            name="phone" 
                                class="form-control" 
                                    id="phone" 
                                      placeholder="Customer Phone"
                                      required value="{{$customr->phone}}" >
                </div>

                  <label for="attend">Attend Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" 
                            name="attend" 
                              class="form-control" 
                                id="datepicker"
                                   required value="{{$customr->attend}}">
                </div>

              <label for="time">Time</label>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Time picker:</label>

                  <div class="input-group">
                    <input type="text" 
                              name="time" 
                                  placeholder="Time To Attend"  
                                    class="form-control timepicker"
                                        required 
                                          value="{{$customr->time}}" >
                                        

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Confirme Customer</button>
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
