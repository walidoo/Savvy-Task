@extends('layouts.app')

@section('title')
{{ $The_post->post_title }}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $The_post->post_title }}
      </h1><br/>
    </section>
    <!-- Main content -->
    <section class="content">
	<!-- form start -->
    <form role="form" method="POST" action="" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Post Title</label>
          <input type="text" class="form-control" name="edit_post_title" placeholder="Enter Post Title" value="{{ $The_post->post_title }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Arabic Post Title</label>
          <input type="text" class="form-control" name="edit_ar_post_title" placeholder="Enter Post Title" value="@if(!empty($The_post->ar_post_data[0]->ar_post_title)) {{ $The_post->ar_post_data[0]->ar_post_title }} @endif">
        </div>
        <div class="form-group">
          <label>Category Name</label>
          <select class="form-control" name="edit_post_category">
            <option value="0">There's no category</option>
            @foreach( $all_categories as $each_category )
              <option value="{{ $each_category->id }}" @if($The_post->category_name->category_name == $each_category->category_name) {{ 'selected' }} @endif>{{ $each_category->category_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Post Description</label>
          <textarea class="form-control" style="resize:none;height:120px;" name="edit_post_desc" placeholder="Enter Post Description">{{ $The_post->post_desc }}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Arabic Post Description</label>
          <textarea class="form-control" style="resize:none;height:120px;" name="edit_ar_post_desc" placeholder="Enter Arabic Post Description">@if(!empty($The_post->ar_post_data[0]->ar_post_desc)) {{ $The_post->ar_post_data[0]->ar_post_desc }} @endif</textarea>
        </div>
        <div class="text-center"><img class="img-responsive img-box img-thumbnail" src="{{ asset('public/images/posts/'. $The_post->post_thumbnail) }}" alt=""></div>
        <div class="form-group">
          <label for="exampleInputFile">Post Image</label>
          <input type="file" name="edit_post_thumb" value="{{ $The_post->post_thumbnail }}">

          <p class="help-block">Change the image for this post.</p>
        </div>
      </div>
      <!-- /.box-body -->
    <div class="modal-footer">
      <input type="submit" class="btn btn-info btn-block" name="edit_post" value="Edit">
    </div>
    </form>
  </section>
</div>

@endsection