const mix = require('laravel-mix');





mix
	.js('resources/js/app.js', 'public/js')
	.js('resources/js/dropzone-handling.js', 'public/js')
    .sass('resources/sass/app.sass', 'public/css')
    .extract()
    .scripts(['public/js/sweetalert.min.js'],'public/js/libs.js')
    .version();


mix.disableNotifications();
