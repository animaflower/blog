<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Jobs\BlogIndexData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::findOrFail(1);
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag)->first() : 'frontend.blog.index';
        $visit_count=\App\Models\visit_count::groupby('ip')->get()->count();
        return view($layout, $data)->with(compact('user','visit_count'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPost($slug, Request $request)
    {
        $user = User::findOrFail(1);
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        $title = $post->title;
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }
        return view($post->layout, compact('post', 'tag', 'slug', 'title', 'user'));
    }
}
