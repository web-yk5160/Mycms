@extends('layouts.backend.main')

@section('title', 'MyBlog | ユーザーを編集')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ユーザー
        <small>ユーザーを編集</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</li></a>
        <li class="active"><a href="{{ route('backend.users.index') }}">ユーザー</a></li>
        <li class="active">ユーザーを編集</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        {!! Form::model($user, [
          'method' => 'PUT',
          'route' => ['backend.users.update', $user->id],
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
