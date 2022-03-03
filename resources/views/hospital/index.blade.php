@extends('layouts.header')

@section('content')
      <a class="btn btn-success btn-sm" href="{{route('hospital.create')}}">Craete New Hospital</a> 
      <br>
      <br>

    @if(isset($hospital) > 0 )
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>
              <h3 class="box-title text-info">{{$hospital->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h3 class="box-title text-info">About Us</h3>
              <blockquote>
                <small>{{$hospital->about}}</small>
              </blockquote>
            </div>

            <div class="box-body">
              <h3 class="box-title text-info">Hospital Phone</h3>
              <blockquote>
                <small>{{$hospital->phone}} </small>
              </blockquote>
            </div>

            <div class="box-body">
              <h3 class="box-title text-info">Hospital E-mail</h3>
              <blockquote>
                <small>{{$hospital->email}}</small>
              </blockquote>
            </div>

            <div class="box-body">
              <h3 class="box-title text-info">Hospital Address</h3>
              <blockquote>
                
                <small>{{$hospital->address}} </small>
              </blockquote>
            </div>
          <!-- /.box -->
        <div class="box-footer">
              <div class="float-right">
                  <a class="btn btn-primary btn-sm" href="{{route('hospital.edit',$hospital->id)}}">Edit</a>
                  <a class="btn btn-danger btn-sm" href="{{route('hospital.destroy',$hospital->id)}}">Delete</a>
              </div> 
        </div>
        </div>
      </div>
    @else
        <div class="alert alert-info text-center"> Ther's No Data To Show</div>

    @endif
@endsection       