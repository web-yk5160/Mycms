@extends('layouts.backend.main')

@section('title', 'MyBlog | 投稿を編集')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ブログ
        <small>投稿を編集</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</li></a>
        <li class="active"><a href="{{ route('backend.blog.index') }}">ブログ</a></li>
        <li class="active">編集</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        {!! Form::model($post, [
          'method' => 'PUT',
          'route' => ['backend.blog.update', $post->id],
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