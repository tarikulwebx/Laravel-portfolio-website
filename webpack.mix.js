const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/assets/fontawesome/css/all.css',
        // 'resources/assets/bootstrap/css/bootstrap.min.css',
        'resources/assets/mdbootstrap/css/mdb.min.css',
        'resources/assets/flipster/css/jquery.flipster.min.css',
    ], 'public/css/libs.css')
    .scripts([
        // 'resources/assets/jquery/jquery-3.6.0.min.js',
        // 'resources/assets/bootstrap/js/bootstrap.bundle.min.js',
        'resources/assets/mdbootstrap/js/mdb.min.js',
        'resources/assets/flipster/js/jquery.flipster.min.js',
    ], 'public/js/libs.js')
    .styles([
        'resources/assets/fontawesome/css/all.css',
        'resources/css/sb-admin-2.min.css',
        'resources/assets/datatables/dataTables.bootstrap4.min.css',
        'resources/assets/toastr/toastr.min.css',
    ], 'public/css/admin-libs.css')
    .scripts([
        'resources/assets/jquery-easing/jquery.easing.min.js',
        'resources/js/sb-admin-2.min.js',
        'resources/assets/datatables/jquery.dataTables.min.js',
        'resources/assets/datatables/dataTables.bootstrap4.min.js',
        'resources/js/demo/datatables-demo.js',
        'resources/assets/chart.js/Chart.min.js',
        'resources/js/demo/chart-area-demo.js',
        'resources/js/demo/chart-pie-demo.js',
        'resources/js/demo/chart-bar-demo.js',
        'resources/assets/toastr/toastr.min.js',

    ], 'public/js/admin-libs.js')
    .sourceMaps();
