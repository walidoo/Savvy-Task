@extends('layouts.app')

@section('title')
Posts
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts List
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('postslist') }}">English</a></li>
        <li><a href="{{ url('ar/postslist') }}">Arabic</a></li>
      </ol>
      <br/>
      <a href="#" class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal">Add New Post</a>
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
            <form method="POST" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Title</label>
                  <input type="text" class="form-control" name="post_title" placeholder="Enter Post Title">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Arabic Post Title</label>
                  <input type="text" class="form-control" name="ar_post_title" placeholder="Enter Arabic Post Title">
                </div>
                <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control" name="post_cat_id">
                    <option value="0">There's no category</option>
                    @foreach( $all_categories as $each_category )
                    <option value="{{ $each_category->id }}">{{ $each_category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Description</label>
                  <textarea class="form-control" style="resize:none;height:120px;" name="post_desc" placeholder="Enter Post Description"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Arabic Post Description</label>
                  <textarea class="form-control" style="resize:none;height:120px;" name="ar_post_desc" placeholder="Enter Arabic Post Description"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Post Image</label>
                  <input type="file" name="post_thumbnail" id="post_thumb">

                  <p class="help-block">Add an image for the post.</p>
                </div>
              </div>
              <!-- /.box-body -->
            <div class="modal-footer">
              <input type="submit" class="btn btn-info btn-block" name="add_post" value="Add Post">
            </div>
            </form>
          </div>
          
        </div>
      </div>
      <!-- End of Modal -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box posts_box">
      <div class="box-body">
          @if(sizeof($all_user_posts) == 0)
            <p class="text-center">There're no posts to display!</p>
          @else
          @foreach( $all_user_posts as $each_post )
            <div class="row"> 
                <div class="col-xs-12 col-sm-3 col-md-3">
                        <img src="{{ asset('public/images/posts/'. $each_post->post_thumbnail) }}" class="img-responsive img-box img-thumbnail"> 
                </div> 
                <div class="col-xs-12 col-sm-9 col-md-9">
                    <h2>{{ $each_post->post_title }}</h2>
                    <a href="{{ url('category/'.$each_post->post_category_name->id) }}" class="post_cat">{{ $each_post->post_category_name->category_name }}</a>
                    <p class="post_desc lead">{{ implode(' ', array_slice(explode(' ', $each_post->post_desc), 0, 10)) }} (...)</p>
                    <a class="btn btn-sm btn-primary pull-right" href="{{ url('/post/'.$each_post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br><br>
                    <a class="pull-right btn btn-sm btn-info" style="clear:both;margin-left:25px;" href="{{ url('/post/edit/'.$each_post->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="pull-right btn btn-sm btn-danger" style="" href="javascript:void(0)" id="delete_post" post-id="{{ $each_post->id }}"><i class="fa fa-remove"></i></a>&nbsp&nbsp
                </div> 
            </div>
            <hr>
          @endforeach
          @endif

            <!-- <div class="row"> 
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <a href="#">
                        <img src="http://wanderluxe.theluxenomad.com/wp-content/uploads/2014/10/http-www.urchinbali.comgallery.jpg" class="img-responsive img-box img-thumbnail"> 
                    </a>
                </div> 
                <div class="col-xs-12 col-sm-9 col-md-9">
                    <h4><a href="#">5 of Bali’s Spanking New Haunts - WanderLuxe Magazine</a></h4>
                    <p>Naturally, we know where Bali's newest restaurants are and what to order, so give that private chef a rest and check out these spanking new haunts.</p>
                <a class="btn btn-sm btn-info pull-right" href="http://bootsnipp.com/user/snippets/2RoQ">Read More</a>
                <a class="pull-right" style="clear:both;" href="{{ url('/post/edit/2') }}">Edit</a>
                </div> 
            </div>
            <hr> -->

      </div></div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection