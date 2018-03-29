<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('deploy', function () {
    $this->comment(base_path());
    $cmd = 'cd '.base_path().';git fetch origin 2>&1;/usr/bin/git reset --hard origin/master 2>&1;php artisan clear-compiled;php artisan view:clear;php artisan config:clear;php artisan queue:restart;composer install';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));
    $this->comment($return);
    $this->comment(Artisan::call('migrate'));
    ;
})->describe('Deploy project');
