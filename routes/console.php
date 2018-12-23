<?php



Artisan::command('clear', function () {
    $this->call('route:clear');
    $this->call('view:clear');
    $this->call('cache:clear');
    $this->info("every thing is clear now ");
})->describe('clear Views, routes and cache');
