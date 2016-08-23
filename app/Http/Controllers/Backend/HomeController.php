<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Display the application home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'status' => App::isDownForMaintenance() ? 0 : 1,
            'posts' => Post::all(),
            'recentPosts' => Post::orderBy('created_at', 'desc')->take(4)->get(),
            'tags' => Tag::all(),
            'disqus' => config('blog.disqus_name') == null ? 0 : 1,
            'analytics' => config('analytics.google') == false ? 0 : 1,
        ];
        return view('backend.home.index', compact('data'));
    }
}
