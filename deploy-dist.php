<?php

namespace Deployer;

require 'recipe/common.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@gitlab:root/my-project.git');
set('shared_files', []);
set('shared_dirs', ['data']);
set('writable_dirs', ['data']);

// Servers

server('production', '10.100.198.201')
    ->user('vagrant')
    ->identityFile()
    ->set('deploy_path', '/vagrant/prod/web');


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');