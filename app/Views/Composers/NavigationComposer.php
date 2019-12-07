<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use App\Category;
use App\Post;
use App\Tag;

class NavigationComposer
{
  public function compose(View $view)
  {
    $this->composeCategories($view);

    $this->composeTags($view);

    $this->composePopularPosts($view);
  }

  public function composeCategories($view)
  {
    $categories = Category::with(['posts' => function($query) {
        $query->published();
    }])->orderBy('title', 'asc')->get();

    $view->with('categories', $categories);
  }

  public function composeTags(View $view)
  {
    $tags = Tag::has('posts')->get();

    $view->with('tags', $tags);
  }

  public function composePopularPosts($view)
  {
    $popularPosts = Post::published()->popular()->take(3)->get();
    $view->with('popularPosts', $popularPosts);
  }
}