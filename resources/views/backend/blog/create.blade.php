@extends('layouts.backend.main')

@section('title', 'MyBlog | 新規投稿')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ブログ
        <small>新規投稿</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</li></a>
        <li class="active"><a href="{{ route('backend.blog.index') }}">ブログ</a></li>
        <li class="active">追加</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        {!! Form::model($post, [
          'method' => 'POST',
          'route' => 'backend.blog.store',
          'files' => TRUE,
          'id' => 'post-form'
        ]) !!}

        @include('backend.blog.form')

        {!! Form::close() !!}
        </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@include('backend.blog.script')