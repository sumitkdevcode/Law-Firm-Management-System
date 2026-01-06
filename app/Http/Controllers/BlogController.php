<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->latest('published_at')->paginate(9);
        $categories = BlogCategory::withCount([
            'posts' => function ($q) {
                $q->published();
            }
        ])->get();
        $recentPosts = BlogPost::published()->latest('published_at')->take(5)->get();

        return view('frontend.blog.index', compact('posts', 'categories', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->published()->firstOrFail();
        $post->incrementViews();

        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = BlogCategory::withCount([
            'posts' => function ($q) {
                $q->published();
            }
        ])->get();

        return view('frontend.blog.show', compact('post', 'relatedPosts', 'categories'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->published()->latest('published_at')->paginate(9);
        $categories = BlogCategory::withCount([
            'posts' => function ($q) {
                $q->published();
            }
        ])->get();
        $recentPosts = BlogPost::published()->latest('published_at')->take(5)->get();

        return view('frontend.blog.category', compact('category', 'posts', 'categories', 'recentPosts'));
    }
}
