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
                        {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}
                          <button title="Restore" class="btn btn-xs btn-default">
                            <i class="fa fa-refresh"></i>
                          </button>
                        {!! Form::close() !!}
                        {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]]) !!}

                          <button title="Delete Permanent" onclick="return confirm('本当に投稿を削除しますか?')" type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i>
                          </button>
                          {!! Form::close() !!}
                      </td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->author->name }}</td>
                      <td>{{ $post->category->title  }}</td>
                      <td>
                        <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>