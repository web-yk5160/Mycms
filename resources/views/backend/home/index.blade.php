@extends('layouts.backend.main')

@section('title', 'MyBlog | ダッシュボード')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ダッシュボード
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> ダッシュボード</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body ">
                    <h3>ようこそMyBlogへ!</h3>
                    <p class="lead text-muted">こんにちは {{ Auth::user()->name }}さん, MyBlogにようこそ!</p>

                    <h4>始めましょう</h4>
                    <p><a href="{{ route('backend.blog.create') }}" class="btn btn-primary">ブログを投稿する</a> </p>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
