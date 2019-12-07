@extends('layouts.backend.main')

@section('title', 'MyBlog | アカウントを編集')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        アカウント
        <small>アカウントを編集</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active">アカウントを編集</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          @include('backend.partials.message')
        {!! Form::model($user, [
          'method' => 'PUT',
          'url' => '/edit-account',
          'id' => 'user-form'
        ]) !!}

        @include('backend.users.form', ['hideRoleDropdown' => true])

        {!! Form::close() !!}
        </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
