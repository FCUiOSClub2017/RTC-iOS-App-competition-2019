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
    $cmd = 'git fetch origin 2>&1;/usr/bin/git reset --hard origin/master 2>&1;chmod -R 777 ./storage;php artisan clear-compiled;php artisan view:clear;php artisan config:clear;php artisan queue:restart;composer install';
    exec($cmd, $output, $return);
    if ($return !== 0) 
        return response($output, 500);
    $exitCode = Artisan::call('migrate');
    return ['gitdeploy'=>$output, 'migrate'=>$exitCode];
})->describe('Deploy project');
