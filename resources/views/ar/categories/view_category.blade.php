@extends('ar.layouts.app')

@section('title')
{{ $category_name->ar_category_name }}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{ $category_name->ar_category_name }}
      </h1>
      <ol class="breadcrumb">
          <li><a href="{{ url('category/'.$category_name->category_id) }}">English</a></li>
          <li><a href="{{ url('ar/category/'.$category_name->category_id) }}">Arabic</a></li>
      </ol>
      <br/>
    </section>
    <!-- Main content -->
    <section class="content">
    	@if(sizeof($category_posts) == 0)
            <p class="text-center">!لا يوجد منشورات للعرض</p>
        @else
    	@foreach( $category_posts as $each_category_posts )

    	<div class="row">
            <div class="col-md-7">
                    <img class="img-responsive img-box img-thumbnail" src="{{ asset('public/images/posts/'. $each_category_posts->ar_post_thumbnail->post_thumbnail) }}" alt="">
            </div>
            <div class="col-md-5">
                <h2>{{ $each_category_posts->ar_post_title }}</h2>
                <p class="lead">
                    by <a href="" data-toggle="modal" data-target="#view_user_Modal_{{ $each_category_posts->user_data->id }}">{{ $each_category_posts->user_data->first_name.' '.$each_category_posts->user_data->last_name }}</a>
                </p>
                <!-- View Profile -->
                <!-- Modal -->
                <div class="modal fade" id="view_user_Modal_{{ $each_category_posts->user_data->id }}" role="dialog">
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
                        <h3 class="widget-user-username">{{ $each_category_posts->user_data->first_name.' '.$each_category_posts->user_data->last_name }}</h3>
                      </div>
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li><a href="#"><b>First Name</b> <span class="pull-right">{{ $each_category_posts->user_data->first_name }}</span></a></li>
                          <li><a href="#"><b>Last Name</b> <span class="pull-right">{{ $each_category_posts->user_data->last_name }}</span></a></li>
                          <li><a href="#"><b>E-mail</b> <span class="pull-right">{{ $each_category_posts->user_data->email }}</span></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div></div>
                <!-- End of Modal -->

                <p>{{ implode(' ', array_slice(explode(' ', $each_category_posts->ar_post_desc), 0, 10)) }} (...)</p>
                <a class="btn btn-primary" href="{{ url('ar/post/'.$each_category_posts->post_id) }}">أقرأ المزيد <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div><hr/>
        @endforeach
        @endif
    </section>
    <div class="post_paginate">{{ $category_posts->links() }}</div>
  </div>

@endsection