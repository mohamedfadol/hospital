@extends('layouts.header')

@section('content')




</style>
          <a class="btn btn-primary btn-sm" href="{{route('customer.create')}}">Create New Customer</a>
          <br>
          <br>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer First Name</th>
                  <th>Customer Last Name</th>
                  <th>Customer E-mail</th>
                  <th>Customer Phone</th>
                  <th>Customer Attend</th>
                  <th>Customer Time</th>
                  <th>Departmet</th>
                  <th>Doctor</th>
                  <th>Create At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
              @if(count($customrs) > 0)
              @foreach($customrs as $customer)
                <tr>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->name2}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->attend}}</td>
                  <td>{{$customer->time}}</td>
                  <td>{{$customer->department->name}}</td>
                  <td>{{$customer->doctor->name}}</td>
                  <td>{{$customer->created_at}}</td>

                  <td>
                  @if($customer->status == 0)

                    <a 
                      class="btn btn-info btn-sm Confirme" 
                        href="{{route('customer.edit' , $customer->id)}}">Confirme</a>
                  @else
                  <a
                      class="btn btn-success btn-sm Confirmed" 
                        href="">Confirmed</a>
                  @endif      
                    <a 
                      class="btn btn-danger btn-sm" 
                        href="{{route('customer.destroy' , $customer->id)}}">Delete</a>
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


