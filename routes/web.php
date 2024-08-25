<?php

use App\Models\Blog;
use App\Models\Author;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        'blogs' => Blog::with(['author', 'tags'])->orderBy('created_at', 'desc')->paginate(7)
    ]);
});

Route::get('/author/{id}', function ($id) {
    $author = Author::findOrFail($id);
    return view('author', [
        'author' => $author,
        'blogs' => Blog::where('author_id', $id)
            ->orderBy('created_at', 'desc')
            ->get()
    ]);
});

Route::get('/tag/{name}', function ($name) {
    $tag = Tag::where('name', $name)->firstOrFail();
    $blogs = $tag->blogs()->orderBy('created_at', 'desc')->get();
    return view('tag', [
        'tag' => $tag,
        'blogs' => $blogs
    ]);
});
