<?php

namespace App\Console\Commands;

use Artisan;
use ConfigWriter;
use App\Models\User;
use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'canvas:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The 30 second Canvas installation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment(PHP_EOL.'Welcome to Canvas! You\'ll be up and running in no time...');
        $config = new ConfigWriter('blog');

        // Blog Title
        $blogTitle = $this->ask('Step 1: Title of your blog');
        $this->title($blogTitle, $config);
        $this->line(PHP_EOL.'<info>✔</info> Success! The blog title has been saved.');

        // Blog Subtitle
        $blogSubtitle = $this->ask('Step 2: Subtitle of your blog');
        $this->subtitle($blogSubtitle, $config);
        $this->line(PHP_EOL.'<info>✔</info> Success! The blog subtitle has been saved.');

        // Blog Description
        $blogDescription = $this->ask('Step 3: Description of your blog (og:type Meta Tag)');
        $this->description($blogDescription, $config);
        $this->line(PHP_EOL.'<info>✔</info> Success! The blog description has been saved.');

        // Blog Author
        $blogAuthor = $this->ask('Step 4: Author of your blog');
        $this->author($blogAuthor, $config);
        $this->line(PHP_EOL.'<info>✔</info> Success! The author name has been saved.');

        // Posts Per Page
        $postsPerPage = $this->ask('Step 5: Number of posts to display per page');
        $this->postsPerPage($postsPerPage, $config);
        $this->line(PHP_EOL.'<info>✔</info> Success! The number of posts per page has been saved.');

        // Admin User Creation
        $this->comment(PHP_EOL.'Creating the admin user...');
        $user = User::findOrFail(1);
        if (empty($user)) {
            $exitCode = Artisan::call('migrate', [
                '--seed' => true,
            ]);
        }
        $this->progress(5);
        $this->line(PHP_EOL.'<info>✔</info> Success! The admin user has been created.');

        // Application Key Generation
        $this->comment(PHP_EOL.'Creating a unique application key...');
        $exitCode = Artisan::call('key:generate');
        $this->progress(5);
        $this->line(PHP_EOL.'<info>✔</info> Success! A unique application key has been generated.');

        $this->comment(PHP_EOL.'Finishing up the installation...');
        $this->progress(5);

        $this->line(PHP_EOL.'<info>✔</info> Canvas has been successfully installed! Happy blogging!'.PHP_EOL);

        $config->save();
    }

    private function progress($tasks)
    {
        $bar = $this->output->createProgressBar($tasks);

        for ($i = 0; $i < $tasks; $i++) {
            time_nanosleep(0, 200000000);
            $bar->advance();
        }

        $bar->finish();
    }

    private function title($blogTitle, $config)
    {
        $config->set('title', $blogTitle);
        $this->comment('Saving blog title...');
        $this->progress(1);
    }

    private function subtitle($blogSubtitle, $config)
    {
        $config->set('subtitle', $blogSubtitle);
        $this->comment('Saving blog subtitle...');
        $this->progress(1);
    }

    private function description($blogDescription, $config)
    {
        $config->set('description', $blogDescription);
        $this->comment('Saving blog description...');
        $this->progress(1);
    }

    private function author($blogAuthor, $config)
    {
        $config->set('author', $blogAuthor);
        $this->comment('Saving author name...');
        $this->progress(1);
    }

    private function postsPerPage($postsPerPage, $config)
    {
        $config->set('posts_per_page', intval($postsPerPage));
        $this->comment('Saving posts per page...');
        $this->progress(1);
    }
}
