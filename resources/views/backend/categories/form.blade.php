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
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $category->exists ? '編集' : '保存' }}</button>
        <a href="{{ route('backend.categories.index') }}" class="btn btn-default">キャンセル</a>
      </div>
    </div>
    <!-- /.box -->
</div>
