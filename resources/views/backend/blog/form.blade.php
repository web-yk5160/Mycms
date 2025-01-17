<div class="col-xs-9">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
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
        <div class="form-group excerpt">
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
      </div>
      <!-- /.box-body -->

    </div>
    <!-- /.box -->
</div>
<div class="col-xs-3">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">投稿</h3>
    </div>
    <div class="box-body">
      <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
        {!! Form::label('published_at', '公開日') !!}
        <div class='input-group date' id='datetimepicker1'>
          {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>

        @if($errors->has('published_at'))
          <span class="help-block">{{ $errors->first('published_at')}}</span>
        @endif
      </div>
    </div>
    <div class="box-footer clearfix">
      <div class="pull-left">
        <a id="draft-btn" class="btn btn-default">下書きを保存する</a>
      </div>
      <div class="pull-right">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">カテゴリー</h3>
    </div>
    <div class="box-body">
      <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
        {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'カテゴリを選択してください']) !!}

        @if($errors->has('category_id'))
          <span class="help-block">{{ $errors->first('category_id')}}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">タグ</h3>
    </div>
    <div class="box-body">
        <div class="form-group {{ $errors->has('post_tags') ? 'has-error' : '' }}">
            {!! Form::text('post_tags', null, ['class' => 'form-control']) !!}

            @if($errors->has('post_tags'))
              <span class="help-block">{{ $errors->first('post_tags')}}</span>
            @endif
        </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">画像</h3>
    </div>
    <div class="box-body text-center">
    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
      <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
        <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
      <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
      </div>
    </div>


    @if($errors->has('image'))
      <span class="help-block">{{ $errors->first('image')}}</span>
    @endif
  </div>
  </div>
</div>