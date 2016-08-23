<?php

namespace App\Http\Controllers\Backend;

use Excel;
use Session;
use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Migrations;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ToolsController extends Controller
{
    protected $date;

    public function __construct()
    {
        $this->date = date('Y-m-d');
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $status = App::isDownForMaintenance() ? 'Maintenance Mode' : 'Active';
        $data = [
            'indexModified' => file_exists(storage_path('posts.index')) ? filemtime(storage_path('posts.index')) : false,
            'host' => $_SERVER['HTTP_HOST'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'timezone' => $_SERVER['APP_TIMEZONE'],
            'status' => $status,
        ];

        return view('backend.tools.index', compact('data'));
    }

    /**
     * Manually Reset the Site Index.
     *
     * @return \Illuminate\View\View
     */
    public function resetIndex()
    {
        $exitCode = Artisan::call('canvas:index');
        if ($exitCode === 0) {
            Session::set('_reset-index', trans('messages.reset_index_success'));
        } else {
            Session::set('_reset-index', trans('messages.reset_index_error'));
        }

        return redirect(url('admin/tools'));
    }

    /**
     * Manually Flush the Application Cache.
     *
     * @return \Illuminate\View\View
     */
    public function clearCache()
    {
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('optimize');
        if ($exitCode === 0) {
            Session::set('_cache-clear', trans('messages.cache_clear_success'));
        } else {
            Session::set('_cache-clear', trans('messages.cache_clear_error'));
        }

        return redirect(url('admin/tools'));
    }

    /**
     * Create and download an archive of all existing data.
     *
     * @return \Illuminate\View\View
     */
    public function handleDownload()
    {
        $this->storeUsers();
        $this->storePosts();
        $this->storeTags();
        $this->storePostTag();
        $this->storeMigrations();
        $this->storeUploads();
        $date = date('Y-m-d');
        $path = storage_path($date.'-canvas-archive');
        $filename = sprintf('%s.zip', $path);
        $zip = new \ZipArchive();
        $zip->open($filename, \ZipArchive::CREATE);
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file) {
            if (! $file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        \File::deleteDirectory(storage_path($date.'-canvas-archive'));

        return response()->download(storage_path($date.'-canvas-archive.zip'))->deleteFileAfterSend(true);
    }

    protected function storeUsers()
    {
        Excel::create('users', function ($excel) {
            $excel->sheet('Users', function ($sheet) {
                $users = User::get()->toArray();
                $sheet->appendRow(array_keys($users[0]));
                foreach ($users as $user) {
                    $sheet->appendRow($user);
                }
            });
        })->store('csv', storage_path($this->date.'-canvas-archive'), true);
    }

    protected function storePosts()
    {
        $posts = Post::get()->toArray();
        if ($posts != []) {
            Excel::create('posts', function ($excel) {
                $excel->sheet('Posts', function ($sheet) {
                    $posts = Post::get()->toArray();
                    $sheet->appendRow(array_keys($posts[0]));
                    foreach ($posts as $post) {
                        $sheet->appendRow($post);
                    }
                });
            })->store('csv', storage_path($this->date.'-canvas-archive'), true);
        }
    }

    protected function storeTags()
    {
        $tags = Tag::get()->toArray();
        if ($tags != []) {
            Excel::create('tags', function ($excel) {
                $excel->sheet('Tags', function ($sheet) {
                    $tags = Tag::get()->toArray();
                    $sheet->appendRow(array_keys($tags[0]));
                    foreach ($tags as $tag) {
                        $sheet->appendRow($tag);
                    }
                });
            })->store('csv', storage_path($this->date.'-canvas-archive'), true);
        }
    }

    protected function storePostTag()
    {
        $postTag = PostTag::get()->toArray();
        if ($postTag != []) {
            Excel::create('post_tag', function ($excel) {
                $excel->sheet('PostTag', function ($sheet) {
                    $postTag = PostTag::get()->toArray();
                    $sheet->appendRow(array_keys($postTag[0]));
                    foreach ($postTag as $pt) {
                        $sheet->appendRow($pt);
                    }
                });
            })->store('csv', storage_path($this->date.'-canvas-archive'), true);
        }
    }

    protected function storeMigrations()
    {
        Excel::create('migrations', function ($excel) {
            $excel->sheet('Migrations', function ($sheet) {
                $migrations = Migrations::get()->toArray();
                $sheet->appendRow(array_keys($migrations[0]));
                foreach ($migrations as $migration) {
                    $sheet->appendRow($migration);
                }
            });
        })->store('csv', storage_path($this->date.'-canvas-archive'), true);
    }

    protected function storeUploads()
    {
        $source = public_path().'/uploads/';
        $destination = storage_path($this->date.'-canvas-archive/uploads/');

        return \File::copyDirectory($source, $destination);
    }

    /**
     * Enable Application Maintenance Mode.
     *
     * @return \Illuminate\View\View
     */
    public function enableMaintenanceMode()
    {
        $exitCode = Artisan::call('down');
        if ($exitCode === 0) {
            Session::set('admin_ip', request()->ip());
            Session::set('_enable-maintenance-mode', trans('messages.enable_maintenance_mode_success'));
        } else {
            Session::set('_enable-maintenance-mode', trans('messages.enable_maintenance_mode_error'));
        }

        return redirect(url('admin/tools'));
    }

    /**
     * Disable Application Maintenance Mode.
     *
     * @return \Illuminate\View\View
     */
    public function disableMaintenanceMode()
    {
        $exitCode = Artisan::call('up');
        if ($exitCode === 0) {
            Session::set('_disable-maintenance-mode', trans('messages.disable_maintenance_mode_success'));
        } else {
            Session::set('_disable-maintenance-mode', trans('messages.disable_maintenance_mode_error'));
        }

        return redirect(url('admin/tools'));
    }
}
