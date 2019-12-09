<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group {‌{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', '名前') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group {‌{ $errors->has('slug') ? 'has-error' : '' }}">
            {!! Form::label('slug', 'スラッグ') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}

            @if($errors->has('slug'))
                <span class="help-block">{{ $errors->first('slug') }}</span>
            @endif
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $tag->exists ? '編集' : '保存'}}</button>
        <a href="{{ route('backend.tags.index') }}" class="btn btn-default">キャンセル</a>
    </div>
  </div>
  <!-- /.box -->
</div>