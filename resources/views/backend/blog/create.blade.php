@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new post')
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
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active"><a href="{{ route('backend.blog.index') }}">ブログ</a></li>
        <li class="active">追加</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                {!! Form::model($post, [
                    'method' => 'POST',
                    'route' => 'backend.blog.store',
                    'files' => TRUE
                  ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  {!! Form::label('title', 'タイトル') !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}

                  @if($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title')}}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  {!! Form::label('slug', 'スラッグ') !!}
                  {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                  @if($errors->has('slug'))
                    <span class="help-block">{{ $errors->first('slug')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  {!! Form::label('excerpt', '抜粋') !!}
                  {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                  {!! Form::label('body', '内容') !!}
                  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                  @if($errors->has('body'))
                    <span class="help-block">{{ $errors->first('body')}}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                  {!! Form::label('published_at', '公開日') !!}
                  {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}

                  @if($errors->has('published_at'))
                    <span class="help-block">{{ $errors->first('published_at')}}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                  {!! Form::label('category_id', 'カテゴリー') !!}
                  {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'カテゴリを選択してください']) !!}

                  @if($errors->has('category_id'))
                    <span class="help-block">{{ $errors->first('category_id')}}</span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                  {!! Form::label('image', '画像') !!}
                  {!! Form::file('image') !!}

                  @if($errors->has('image'))
                    <span class="help-block">{{ $errors->first('image')}}</span>
                  @endif
                </div>

                <hr>

                {!! Form::submit('新規作成', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
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

@section('script')
  <script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');s
  </script>
@endsection