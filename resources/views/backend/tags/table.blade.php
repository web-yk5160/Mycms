<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">アクション</td>
            <td>タグ名</td>
            <td width="120">投稿数</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.tags.destroy', $tag->id]]) !!}
                        <a href="{{ route('backend.tags.edit', $tag->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>

                        <button onclick="return confirm('本当に削除しますか?');" type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
                <td>{{ $tag->name }}</td>
                <td>{{ ($tmp = $tag->posts) ? $tmp->count() : 0 }}</td>
            </tr>

        @endforeach
    </tbody>
</table>