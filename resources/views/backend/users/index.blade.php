@extends('layouts.backend.main')

@section('title', 'MyBlog | users')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ユーザー
        <small>すべてのユーザーを表示</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</li></a>
        <li class="active"><a href="{{ route('backend.users.index') }}">ユーザー</a></li>
        <li class="active">すべてのユーザー</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header clearfix">
                <div class="pull-left">
                  <a href="{{ route('backend.users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> 新規追加</a>
                </div>
                <div class="pull-right">

                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @include('backend.partials.message')

                @if(! $users->count())
                <div class="alert alert-danger">
                  <strong>投稿が見つかりません</strong>
                </div>
                @else
                  @include('backend.users.table')
              @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix ">
                <div class="pull-left">
                  {{ $users->appends( Request::query() )->render() }}
                </div>
              <div class="pull-right">
                <small>{{ $usersCount }}個の項目</small>
              </div>
            </div>
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

@section('script')
  <script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');s
  </script>
@endsection