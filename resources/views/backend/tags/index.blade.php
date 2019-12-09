@extends('layouts.backend.main')

@section('title', 'MyBlog | タグ')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          タグ
          <small>すベてのタグ</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</a>
          </li>
          <li><a href="{{ route('backend.tags.index') }}">タグ</a></li>
          <li class="active">すべてのタグ</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{ route('backend.tags.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> 新規追加</a>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    @include('backend.partials.message')

                    @if (! $tags)
                        <div class="alert alert-danger">
                            <strong>投稿が見つかりません</strong>
                        </div>
                    @else
                        @include('backend.tags.table')
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                      {{ $tags->appends( Request::query() )->render() }}
                    </div>
                    <div class="pull-right">
                        <small>{{ $tagsCount }}個の項目</small>
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

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection