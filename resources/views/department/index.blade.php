@extends('layouts.header')


@section('content')


  
        <a class="btn btn-primary btn-sm" href="{{route('department.create')}}">Create New Department</a>
        <br><br>
      <div class="row">

        @if(count($departments) > 0 )

        @foreach($departments as $department)
        <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="/storage/cover_images/{{$department->image}}" alt="User Image" />
                <span class="username"><a href="#">{{$department->name}}</a></span>
                <span class="description">{{$department->created_at}}</span>
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
              <img class="img-responsive pad" src="/storage/cover_images/{{$department->image}}" alt="Photo">
              <h4 class="text-primary text-uppercase">About Department :</h4>
              <p>{{$department->about}}</p>
              <span>
                <a class="btn btn-success btn-sm " 
                      href="{{route('department.show',$department->id)}}">See More</a></span>

            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="float-left">
                  <a class="btn btn-primary btn-sm" href="{{route('department.edit',$department->id)}}">Edit</a>
                  <a class="btn btn-danger btn-sm" href="{{route('department.destroy',$department->id)}}">Delete</a>
              </div>    
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

        @endforeach

        @else

        <div class="alert alert-info text-center" ><strong>Ther's No Data To Show</strong></div>
        @endif
      </div>  


@endsection
