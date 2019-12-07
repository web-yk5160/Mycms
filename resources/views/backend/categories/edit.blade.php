@extends('layouts.backend.main')

@section('title', 'MyBlog | カテゴリーを編集')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        カテゴリー
        <small>カテゴリーを編集</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</li></a>
        <li class="active"><a href="{{ route('backend.categories.index') }}">カテゴリー</a></li>
        <li class="active">カテゴリーを編集</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        {!! Form::model($category, [
          'method' => 'PUT',
          'route' => ['backend.categories.update', $category->id],
          'files' => TRUE,
          'id' => 'post-form'
        ]) !!}

        @include('backend.categories.form')

        {!! Form::close() !!}
        </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@include('backend.categories.script')