var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

    // LESS Files
    mix.less('blog/blog.less');
    mix.less('auth/auth.less');
    mix.less('admin/admin.less');

    // Vendor CSS Files
    mix.styles([
        'bootstrap-datetimepicker.css',
        'chosen.min.css',
        'simplemde.min.css',
        'jquery.bootgrid.min.css',
        'lightgallery.css',
        'bootstrap-select.min.css',
        'jquery.mCustomScrollbar.min.css',
        'material-design-iconic-font.min.css',
        'animate.min.css',
        'sweet-alert.min.css'
    ], 'public/css/vendor.css');

    // Application CSS Files
    mix.styles([
        'custom.css',
        'app-1.css',
        'app-2.css'
    ], 'public/css/app.css');

    // Vendor JS Files
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'moment.min.js',
        'simplemde.min.js',
        'autosize.min.js',
        'bootstrap-select.js',
        'jquery.mask.min.js',
        'chosen.jquery.min.js',
        'jquery.bootgrid.min.js',
        'lightgallery.min.js',
        'sweet-alert.min.js',
        'waves.js',
        'jsvalidation.js',
        'jquery.mCustomScrollbar.concat.min.js',
        'fileinput.min.js',
        'bootstrap-datetimepicker.min.js'
    ], 'public/js/vendor.js');

    // Application JS Files
    mix.scripts([
        'functions.js',
        'bootstrap-growl.min.js'
    ], 'public/js/app.js');

});
