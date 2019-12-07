@extends('layouts.backend.main')

@section('title', 'MyBlog | Blog index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ブログ
        <small>すべてのブログ投稿を表示</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> ダッシュボード</li></a>
        <li class="active"><a href="{{ route('backend.blog.index') }}">ブログ</a></li>
        <li class="active">すべての投稿</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header clearfix">
                <div class="pull-left">
                  <a href="{{ route('backend.blog.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> 新規追加</a>
                </div>
                <div class="pull-right" style="padding:7px 0">
                  @foreach($jkey as $j => $v)
                    @foreach($statusList as $key => $value)
                      @if($value && $j == $key)
                      <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                      <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . $v . "({$value})</a>" ?>
                      @endif
                    @endforeach
                  @endforeach
                  {!! implode(' | ', $links) !!}
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @include('backend.partials.message')

                @if(! $posts->count())
                <div class="alert alert-danger">
                  <strong>投稿が見つかりません</strong>
                </div>
                @else
                  @if($onlyTrashed)
                    @include('backend.blog.table-trash')
                  @else
                    @include('backend.blog.table')
                  @endif
              @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix ">
                <div class="pull-left">
                  {{ $posts->appends( Request::query() )->render() }}
                </div>
              <div class="pull-right">
                <small>{{ $postCount }}個の項目</small>
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
    $('ul.pagination').addClass('no-margin pagination-sm');
  </script>
@endsection