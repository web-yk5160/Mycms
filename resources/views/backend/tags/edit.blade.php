@extends('layouts.backend.main')

@section('title', 'MyBlog | タグを編集')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          タグ
          <small>タグを編集</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{‌{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</a>
          </li>
          <li><a href="{‌{ route('backend.tags.index') }}">タグ</a></li>
          <li class="active">タグを編集</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($tag, [
                  'method' => 'PUT',
                  'route'  => ['backend.tags.update', $tag->id],
                  'files'  => TRUE,
                  'id' => 'post-form'
              ]) !!}

              @include('backend.tags.form')

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@include('backend.tags.script')