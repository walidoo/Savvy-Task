@extends('ar.layouts.app')

@section('title')
التصنيفات
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories List
      </h1>
      <ol class="breadcrumb">
          <li><a href="{{ url('categorieslist/') }}">English</a></li>
          <li><a href="{{ url('ar/categorieslist/') }}">Arabic</a></li>
      </ol>
      <br/>
      <a href="#" class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal">Add New Category</a>
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
                  <label for="exampleInputEmail1">category Name</label>
                  <input type="text" class="form-control" id="new_category_name" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Arabic category Name</label>
                  <input type="text" class="form-control" id="new_ar_category_name" placeholder="Enter Arabic Category Name">
                </div>
              </div>
              <!-- /.box-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-info btn-block ar_add_category">Add</button>
              <p class="alert_msg"></p>
            </div>
            </form>
          </div>
          
        </div>
      </div>
      </div>
  <!-- End of Modal -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box posts_box">
            <div class="box-header">
              <h3 class="box-title">Categories Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Cateogry Slug</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $all_categories as $each_category )
                <!-- Modal -->
                    <div class="modal fade" id="edit_category_Modal_{{ $each_category->id }}" role="dialog">
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
                                <label for="exampleInputEmail1">category Name</label>
                                <input type="text" class="form-control" id="edit_the_category_{{ $each_category->id }}" value="{{ $each_category->category_name }}" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Arabic category Name</label>
                                <input type="text" class="form-control" id="edit_ar_the_category_{{ $each_category->id }}" value="{{ $each_category->ar_category_name }}" placeholder="">
                              </div>
                            </div>
                            <!-- /.box-body -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-block ar_edit_category" cat-id="{{ $each_category->id }}">Edit</button>
                            <p class="alert_msg"></p>
                          </div>
                          </form>
                        </div>
                        
                      </div>
                    </div>
                    </div>
                    <!-- End of Modal -->
                <tr>
                  <td><a href="{{ url('ar/category/'.$each_category->id) }}">{{ $each_category->ar_category_name }}</a></td>
                  <td>{{ $each_category->category_slug }}</td>
                  <td>
                    <a href="javascript:void(0)" category-id="{{ $each_category->id }}" class="btn btn-sm btn-info edit_category" data-toggle="modal" data-target="#edit_category_Modal_{{ $each_category->id }}"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:void(0)" category-id="{{ $each_category->id }}" class="btn btn-sm btn-danger ar_rm_category"><i class="fa fa-remove"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Category Name</th>
                  <th>Cateogry Slug</th>
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