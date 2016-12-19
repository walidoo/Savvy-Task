@extends('layouts.auth_layout')

@section('title')
LogIn
@endsection

@section('auth_content')
    <div class="error-page text-center">
        <h2 class="headline text-red" style="margin-top: -20px;">503</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Website Under Maintainance.</h3>

          <p>
            We will work on fixing that right away.
          </p>

        </div>
    </div>
    <!-- /.error-page -->

@endsection