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

Artisan::command('git:deploy', function () {
    $this->comment(base_path());
    $cmd = 'cd '.base_path().' && git fetch origin 2>&1  && git reset --hard origin/master 2>&1 && composer install';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));
    $this->comment(Artisan::call('migrate'));
    ;
})->describe('Deploy project');

Artisan::command('git:push {msg="update"}', function ($msg) {
    $cmd = 'cd '.base_path().' && git add . && git commit -m '.$msg.' && git push origin master';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));
})->describe('Push project to github');
