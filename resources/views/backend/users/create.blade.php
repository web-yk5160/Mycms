@extends('layouts.backend.main')

@section('title', 'MyBlog | 新規ユーザー')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ユーザー
        <small>新規ユーザー追加</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active"><a href="{{ route('backend.users.index') }}">ユーザー</a></li>
        <li class="active">追加</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        {!! Form::model($user, [
          'method' => 'POST',
          'route' => 'backend.users.store',
          'files' => TRUE,
          'id' => 'user-form'
        ]) !!}

        @include('backend.users.form')

        {!! Form::close() !!}
        </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection