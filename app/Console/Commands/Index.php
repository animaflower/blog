<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TeamTNT\TNTSearch\TNTSearch;

class Index extends Command
{
    protected $tnt;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'canvas:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build the site index for searching';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->tnt = new TNTSearch;
        $this->tnt->loadConfig(config('services.tntsearch'));

        $this->createPostsIndex();
        $this->line('<info>✔</info> Success! The posts index has been completed.');

        $this->createTagsIndex();
        $this->line('<info>✔</info> Success! The tags index has been completed.');
    }

    public function createPostsIndex()
    {
        $this->comment(PHP_EOL.'Indexing posts table and saving it to /storage/posts.index...');
        $indexer = $this->tnt->createIndex('posts.index');
        $indexer->query('SELECT id, title, subtitle, content_raw, meta_description FROM posts;');
        $indexer->run();
    }

    public function createTagsIndex()
    {
        $this->comment(PHP_EOL.'Indexing tags table and saving it to /storage/tags.index...');
        $indexer = $this->tnt->createIndex('tags.index');
        $indexer->query('SELECT id, tag, title, subtitle, meta_description FROM tags;');
        $indexer->run();
    }
}
