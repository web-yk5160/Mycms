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
              {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id]]) !!}
                <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                  <i class="fa fa-edit"></i>
                </a>
                <button type="submit" class="btn btn-xs btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
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