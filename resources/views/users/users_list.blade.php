@extends('layouts.app')

@section('title')
Users
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users List
      </h1><br/>
      <a href="#" class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal">Add New User</a>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New:</h4>
            </div>
            <div class="modal-body">
              <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" id="new_first_name" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" id="new_last_name" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="email" class="form-control" id="new_email" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="new_pass" placeholder="Enter Password" required>
                </div>
              </div>
              <!-- /.box-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-info btn-block add_user">Add</button>
              <p class="alert_msg"></p>
            </div>
            </form>
          </div>
          
        </div>
      </div></div>
      <!-- End of Modal -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box posts_box">
            <div class="box-header">
              <h3 class="box-title">Users Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>E-mail</th>
                  <th>Password</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @if(empty($all_users))
                <tr>There's no data to display!</tr>
                @else
                @foreach( $all_users as $each_user )
                <!-- Modal -->
                  <div class="modal fade" id="edit_user_Modal_{{ $each_user->id }}" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit:</h4>
                    </div>
                    <div class="modal-body">
                      <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="text" class="form-control the_first_name_{{ $each_user->id }}" id="" placeholder="Enter First Name" value="{{ $each_user->first_name }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="text" class="form-control the_last_name_{{ $each_user->id }}" id="" placeholder="Enter Last Name" value="{{ $each_user->last_name }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">E-mail</label>
                          <input type="email" class="form-control the_email_{{ $each_user->id }}" id="" placeholder="Enter E-mail" value="{{ $each_user->email }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Password</label>
                          <input type="password" class="form-control the_password_{{ $each_user->id }}" id="" placeholder="Enter New Password" value="">
                        </div>
                      </div>
                      <!-- /.box-body -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info btn-block edit_user" user-id="{{ $each_user->id }}">Edit</button>
                      <p class="alert_msg"></p>
                    </div>
                    </form>
                  </div>
                  
                </div>
              </div></div>
                    <!-- End of Modal -->

                <!-- View Profile -->
                <!-- Modal -->
                <div class="modal fade" id="view_user_Modal_{{ $each_user->id }}" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="box box-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image">
                          <img class="img-circle" style="margin-top: -14px;" src="{{ asset('public/images/profile/default_profile.png') }}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $each_user->first_name.' '.$each_user->last_name }}</h3>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li><a href="#"><b>First Name</b> <span class="pull-right">{{ $each_user->first_name }}</span></a></li>
                          <li><a href="#"><b>Last Name</b> <span class="pull-right">{{ $each_user->last_name }}</span></a></li>
                          <li><a href="#"><b>E-mail</b> <span class="pull-right">{{ $each_user->email }}</span></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
              </div></div>
                    <!-- End of Modal -->
                <tr>
                  <td>{{ $each_user->first_name }}</td>
                  <td>{{ $each_user->last_name }}</td>
                  <td><a href="mailto:{{ $each_user->email }}">{{ $each_user->email }}</a></td>
                  <td>*******</td>
                  <td>
                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit_user_Modal_{{ $each_user->id }}"><i class="fa fa-edit"></i> Edit</a>
                    <button class="btn btn-sm btn-danger delete_user" user-id="{{ $each_user->id }}" @if(Auth::user()->id == $each_user->id) {{ 'disabled' }} @endif><i class="fa fa-remove"></i> Delete</button>
                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#view_user_Modal_{{ $each_user->id }}"><i class="fa fa-edit"></i> View Profile</a>
                  </td>
                </tr>
                @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>E-mail</th>
                  <th>Password</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection