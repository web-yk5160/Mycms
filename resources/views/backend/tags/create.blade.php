@extends('layouts.backend.main')

@section('title', 'MyBlog | 新規タグ')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          タグ
          <small>新規タグ追加</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</a>
          </li>
          <li><a href="{{ route('backend.tags.index')}}">タグ</a></li>
          <li class="active">追加</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($tag, [
                  'method' => 'POST',
                  'route'  => 'backend.tags.store',
                  'files'  => TRUE,
                  'id' => 'tag-form'
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