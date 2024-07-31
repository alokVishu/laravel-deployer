<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/alokVishu/laravel-deployer.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('24.144.120.172')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/deployinglaravel.local');

// Hooks

after('deploy:failed', 'deploy:unlock');
