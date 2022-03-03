@extends('layouts.header')


@section('content')



      <!-- /.row -->

    <a class="btn btn-primary btn-sm" href="{{route('new.create')}}">Create New Blog</a>
        <br><br>

  <div class="row">

    @if(count($news) > 0 )

    @foreach($news as $new)
    <div class="col-md-6">
      <!-- Box Comment -->
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <img class="img-circle" src="/storage/cover_images/{{$new->image}}" alt="User Image">
            <span class="username"><a href="#">{{$new->name}}</a></span>

            <span class="description">{{$new->created_at}}</span>
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
        <div class="box-body">
        	<img class="img-responsive pad" src="/storage/cover_images/{{$new->image}}" alt="Photo">

          <p>{{$new->about}}</p>
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
          <button type="button" class="btn btn-default btn-xs">
          	<i class="fa fa-thumbs-o-up"></i> Like</button>

          <span class="pull-right text-muted"> 127 likes - {{$comments->count()}} comments</span>

        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments">
    		@foreach($comments as $comment)
          <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="/storage/cover_images/{{$comment->image}}" 
            alt="">

            <div class="comment-text">
                  <span class="username">
                    {{$comment->name}}
                    <span class="text-muted pull-right">{{$comment->created_at}}</span>
                  </span><!-- /.username -->
					{{$comment->about}}.
            </div>
            <!-- /.comment-text -->
            </div>
            @endforeach

        </div>
        <!-- /.box-footer -->
        <div class="box-footer">
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
          <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
          	@csrf
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="form-row">
              <input type="text" name="name" class="form-control input-sm" placeholder=" Your Name">

              <input type="text" name="about" class="form-control input-sm" placeholder="Press enter to post comment">
              <input type="text" name="job" class="form-control input-sm" placeholder=" Your Job">
              <input type="file" name="image" class="form-control input-sm" >
            </div><br>
            	<input type="submit" value="Commnt" class="btn btn-primary btn-xs" >
          </form>
        </div>
        <!-- /.box-footer -->
      <div class="box-footer">
      	<span class="pull-right">
      		<a href="{{route('new.edit',$new->id)}}" class="btn btn-primary btn-xs">Edit</a>
      		<a href="{{route('new.destroy',$new->id)}}" class="btn btn-danger btn-xs">Delete</a>
      	</span>
      </div>
      </div>
      <!-- /.box -->

    </div>

        @endforeach

        @else

        <div class="alert alert-info text-center" ><strong>Ther's No Data To Show</strong></div>
        @endif

</div>
      <!-- /.row -->



@endsection