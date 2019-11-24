@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-8">
                <article class="post-item">
                    @if ($post->image_url)
                    <div class="post-item-image">
                        <!-- <a href="post.html"> -->
                            <img src="{{ $post->image_url}}" alt="{{ $post->title }}">
                        <!-- </a> -->
                    </div>
                    @endif
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2>{{ $post->title }}</h2>


                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name  }}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{ $post->date }}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                        </div>
                        {!! $post->body_html !!}
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                      <div class="media-left">
                        <?php $author = $post->author; ?>
                        <a href="">
                          <img alt="Author 1" width="100" height="100" src="/img/author.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('author', $post->author->slug) }}">{{ $author->name }}</a></h4>
                        <div class="post-author-count">
                          <a href="{{ route('author', $post->author->slug) }}">
                              <i class="fa fa-clone"></i>
                              <?php $postCount = $post->author->posts->count() ?>
                              {{ $postCount }} {{ str_plural('post', $postCount) }}
                          </a>
                        </div>

                      </div>
                    </div>
                </article>

                <nav>
                    <ul class="pager">
                        <li class="previous disabled"><a href="#"><span aria-hidden="true">←</span> Newer</a></li>
                        <li class="next"><a href="#">Older <span aria-hidden="true">→</span></a></li>
                    </ul>
                </nav>
            </div>

            @include('layouts.sidebar')
        </div>
    </div>

@endsection