@extends('layouts.backend.main')

@section('title', 'MyBlog | 削除の確認')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ユーザー
        <small>削除の確認</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
        <li class="active"><a href="{{ route('backend.users.index') }}">ユーザー</a></li>
        <li class="active">削除の確認</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        {!! Form::model($user, [
          'method' => 'DELETE',
          'route' => ['backend.users.destroy', $user->id],
        ]) !!}

        <div class="col-xs-9">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <p>
                このユーザーを削除するように指定しました
              </p>
              <p>
                ID # {{ $user->id }} {{ $user->name }}
              </p>
              <p>
                このユーザーが所有するコンテンツで何をすべきか
              </p>
              <p>
                <input type="radio" name="delete_option" value="delete" checked> 全ての内容を削除
              </p>
              <p>
                <input type="radio" name="delete_option" value="attribute">
                {!! Form::select('selected_user', $users, null) !!} の内容
              </p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">削除</button>
              <a href="{{ route('backend.users.index')}}" class="btn btn-default">キャンセル</a>
            </div>
          </div>
        </div>

        {!! Form::close() !!}
        </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection