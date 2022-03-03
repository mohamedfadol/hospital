@extends('layouts.header')


@section('content')


  
        <a class="btn btn-primary btn-sm" href="{{route('doctor.create')}}">Create New Doctor</a>
        <br><br>
      <div class="row">

        @if(isset($doctor) > 0 )
        <div class="col-lg-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="/storage/cover_images/{{$doctor->image}}" alt="User Image">
                <span class="username"><a href="#">{{$doctor->name}}</a></span>
                <span class="description">{{$doctor->created_at}}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body" style="margin-top: -25px;">
              <img class="img-responsive pad" src="/storage/cover_images/{{$doctor->image}}" alt="Photo">
              <h4 class="text-primary text-uppercase">About doctor :</h4>
                <p>{{$doctor->about}}</p>
            </div>
            <div class="box-body" style="margin-top: -25px;">
              <h4 class="text-primary text-uppercase">Doctor Department:</h4>
              <p>{{$doctor->department->name}}</p>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="float-left">
                  <a class="btn btn-primary btn-sm" href="{{route('doctor.edit',$doctor->id)}}">Edit</a>
                  <a class="btn btn-danger btn-sm" href="{{route('doctor.destroy',$doctor->id)}}">Delete</a>
              </div>    
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

        @else

        <div class="alert alert-info text-center" ><strong>Ther's No Data To Show</strong></div>
        @endif
      </div>  


@endsection
