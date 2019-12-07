<table class="table table-bordered">
        <thead>
          <tr>
            <td width="80">アクション</td>
            <td>タイトル</td>
            <td width="120">作成者</td>
            <td width="150">カテゴリー</td>
            <td width="170">日付</td>
          </t2>
        </thead>

      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>
            <?php $request = request(); ?>
              {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
              @if (check_user_permissions($request, "Blog@edit", $post->id))
                <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                  <i class="fa fa-edit"></i>
                </a>
              @else
                <a href="#" class="btn btn-xs btn-default disabled">
                  <i class="fa fa-edit"></i>
                </a>
              @endif
              @if (check_user_permissions($request, "Blog@destroy", $post->id))
                <button type="submit" class="btn btn-xs btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
              @else
                <button type="submit" onclick="return false;" class="btn btn-xs btn-danger disabled">
                  <i class="fa fa-trash"></i>
                </button>
              @endif
                {!! Form::close() !!}
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author->name }}</td>
            <td>{{ $post->category->title  }}</td>
            <td>
              <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
              {!! $post->publicationLabel() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>