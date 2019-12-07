<div class="col-xs-9">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          {!! Form::label('name', 'ユーザー名') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}

          @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
          {!! Form::label('slug', 'スラッグ') !!}
          {!! Form::text('slug', null, ['class' => 'form-control']) !!}

          @if($errors->has('slug'))
            <span class="help-block">{{ $errors->first('slug')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          {!! Form::label('email', 'メールアドレス') !!}
          {!! Form::text('email', null, ['class' => 'form-control']) !!}

          @if($errors->has('email'))
            <span class="help-block">{{ $errors->first('email')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
          {!! Form::label('password', 'パスワード') !!}
          {!! Form::password('password', ['class' => 'form-control']) !!}

          @if($errors->has('password'))
            <span class="help-block">{{ $errors->first('password')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
          {!! Form::label('password_confirmation', 'パスワード確認') !!}
          {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

          @if($errors->has('password_confirmation'))
            <span class="help-block">{{ $errors->first('password_confirmation')}}</span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
          {!! Form::label('role', '役割') !!}
          @if ($user->exists && ($user->id == config('cms.default_user_id') || isset($hideRoleDropdown)))
            {!! Form::hidden('role', $user->roles->first()->id) !!}
            <p class="form-control-static">{{ $user->roles->first()->display_name }}</p>
          @else
            {!! Form::select('role', App\Role::pluck('display_name', 'id'), $user->exists ? $user->roles->first()->id : null, ['class' => 'form-control', 'placeholder' => '選択してください']) !!}
          @endif
          @if($errors->has('role'))
            <span class="help-block">{{ $errors->first('role')}}</span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('bio', '略歴') !!}
          {!! Form::textarea('bio', null, ['row' => 5, 'class' => 'form-control']) !!}

          @if($errors->has('bio'))
            <span class="help-block">{{ $errors->first('bio')}}</span>
          @endif
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $user->exists ? '編集' : '保存' }}</button>
        <a href="{{ route('backend.users.index') }}" class="btn btn-default">キャンセル</a>
      </div>
    </div>
    <!-- /.box -->
</div>
