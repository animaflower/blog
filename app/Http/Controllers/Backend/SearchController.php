<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Search;

class SearchController extends Controller
{
    /**
     * Display search result.
     *
     * @return \Illuminate\View\View
     */
    public function index(Search $search)
    {
        $posts = $search->posts();
        $tags = $search->tags();

        return view('backend.search.index', compact('posts', 'tags'));
    }
}
