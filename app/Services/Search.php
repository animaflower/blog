<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use TeamTNT\TNTSearch\TNTSearch;

class Search
{
    protected $tnt;

    public function __construct(TNTSearch $tnt)
    {
        $this->tnt = $tnt;
        $this->tnt->loadConfig(config('services.tntsearch'));
    }

    public function posts()
    {
        $this->tnt->selectIndex('posts.index');
        $res = $this->tnt->search(request('search'), 12);
        $items = Post::whereIn('id', $res['ids'])->get();

        return $this->orderByRelevance($items, $res['ids']);
    }

    public function tags()
    {
        $this->tnt->selectIndex('tags.index');
        $res = $this->tnt->search(request('search'), 12);
        $items = Tag::whereIn('id', $res['ids'])->get();

        return $this->orderByRelevance($items, $res['ids']);
    }

    public function orderByRelevance($items, $order)
    {
        return $items->sort(function ($a, $b) use ($order) {
            $pos_a = array_search($a->id, $order);
            $pos_b = array_search($b->id, $order);

            return $pos_a - $pos_b;
        });
    }
}
