<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\User;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index()
    {
        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);

        return view("blog.index", compact('posts'));
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;

        // \DB::enableQueryLog();
        $posts = $category->posts()
                        ->with('author')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);

        return view("blog.index", compact('posts', 'categoryName'));
        // dd(\DB::getQueryLog());
    }

    public function author(User $author)
    {
        $authorName = $author->name;

        // \DB::enableQueryLog();
        $posts = $author->posts()
                        ->with('category')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);

        return view("blog.index", compact('posts', 'authorName'));
        // dd(\DB::getQueryLog());
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}
