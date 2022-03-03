@extends('layouts.header')

@section('content')

          <a class="btn btn-primary btn-sm" href="{{route('price.create')}}">Create New Price</a>
          <br>
          <br>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Price Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service Type</th>
                  <th>The Price</th>
                  <th>Service</th>
                  <th>About Service</th>
                  <th>Create At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
              @if(count($prices) > 0)
              @foreach($prices as $price)
                <tr>
                  <td>{{$price->type}}</td>
                  <td>{{$price->price}}</td>
                  <td>{{$price->service}}</td>
                  <td>{{$price->about}}</td>
                  <td>{{$price->created_at}}</td>

                  <td>
                    <a 
                      class="btn btn-success btn-sm" 
                        href="{{route('price.edit' , $price->id)}}">Edit</a>
                    <a 
                      class="btn btn-danger btn-sm" 
                        href="{{route('price.destroy' , $price->id)}}">Delete</a>
                  </td>
                </tr>
                @endforeach
                @else
                  <div class="alert alert-info text-center">Ther's Data To Show</div>
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endsection
