@extends('ar.layouts.app')

@section('title')
{{ $The_post->ar_post_title }}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
          <li><a href="{{ url('post/'.$The_post->post_id) }}">English</a></li>
          <li><a href="{{ url('ar/post/'.$The_post->post_id) }}">Arabic</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-md-1"></div>
    		<div class="col-md-8 col-offset-md-3">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>{{ $The_post->ar_post_title }}</h1>(<a href="{{ url('ar/post/edit/'.$The_post->post_id) }}">Edit</a>)

                <!-- Author -->
                <p class="lead">
                    by <a href="" data-toggle="modal" data-target="#view_user_Modal_{{ $The_post->user_data->id }}">{{ $The_post->user_data->first_name.' '.$The_post->user_data->last_name }}</a>
                </p>
                <!-- View Profile -->
                <!-- Modal -->
                <div class="modal fade" id="view_user_Modal_{{ $The_post->user_data->id }}" role="dialog">
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
                        <h3 class="widget-user-username">{{ $The_post->user_data->first_name.' '.$The_post->user_data->last_name }}</h3>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li><a href="#"><b>First Name</b> <span class="pull-right">{{ $The_post->user_data->first_name }}</span></a></li>
                          <li><a href="#"><b>Last Name</b> <span class="pull-right">{{ $The_post->user_data->last_name }}</span></a></li>
                          <li><a href="#"><b>E-mail</b> <span class="pull-right">{{ $The_post->user_data->email }}</span></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div></div>
                <!-- End of Modal -->
                <a href="{{ url('ar/category/'.$The_post->category_name[0]->id) }}" class="btn btn-sm btn-warning">{{ $The_post->category_name[0]->ar_category_name }}</a>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive img-box img-thumbnail" src="{{ asset('public/images/posts/'. $The_post->ar_post_thumbnail->post_thumbnail) }}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{ $The_post->ar_post_desc }}</p>

                <hr>
            </div>
        </div>
    </section>
  </div>

@endsection