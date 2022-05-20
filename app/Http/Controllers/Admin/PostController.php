<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $validators = [
        'title'     => 'required|max:100',
        'content'   => 'required'
    ];

    private function getValidators($model) {
        return [
            'title'     => 'required|max:100',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($model),
                'max:100'
            ],
            'content'   => 'required'
        ];
    }

    public function myindex() {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(50);

        return view('admin.posts.index', compact('posts'));
    }

    public function index()
    {   
        $posts = Post::paginate(50);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidators(null));

        $post = Post::create($request->all());

        return redirect()->route('admin.posts.show', $post->slug);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {   
        if (Auth::user()->id !== $post->user_id) abort(403);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {   
        if (Auth::user()->id !== $post->user_id) abort(403);

        $request->validate($this->getValidators($post));

        $post->update($request->all());

        return redirect()->route('admin.posts.show', $post->slug);
    }

    public function destroy(Post $post)
    {   
        if (Auth::user()->id !== $post->user_id) abort(403);

        $post->delete();

        return redirect((url()->previous()));
    }
}
