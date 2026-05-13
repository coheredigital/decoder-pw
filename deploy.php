<?php

namespace Deployer;

require 'recipe/common.php';

// app specific
set('application', 'decoder');
set('domain', 'decoderringtheatre.com');
set('db_name', 'decoder_db');
set('db_user', 'decoder_nkzvrou8a4');
set('db_pass', '2ff5e68cb5bc5ef5');

// App name must match repository name
set('server', '45.79.172.84');
set('deploy_path', '~/webapps/{{application}}');

set('http_user', 'www-data');
set('use_relative_symlink', true);
set('use_atomic_symlink', true);
set('writable_mode', 'chmod');
set('repository', 'git@github.com:coheredigital/toch-pw.git');

set('runcloud', [
	'key' => 'N7v3YvQLWKVR2Rl1trsJvvVjwHGzuHtJuBy6QWxNSiYS',
	'secret' => 'N7v3YvQLWKVR2Rl1trsJvvVjwHGzuHtJuBy6QWxNSiYS'
]);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', [
	'site/assets'
]);

// Writable dirs by web server
set('writable_dirs', [
	'site/assets'
]);

// Hosts
host('linode')
	->set('hostname', '45.79.172.84')
	->setRemoteUser('runcloud')
	->set('deploy_path', '~/webapps/decoder')
	->set('branch', 'main');

host('cohere')
	->set('hostname', '159.203.41.177')
	->setRemoteUser('app')
	->set('deploy_path', '~/websites/{{domain}}')
	->set('branch', 'main');


// build tasks
task('build:favicon', function () {
	runLocally('real-favicon generate faviconConfig.json faviconData.json .');
});

// Import the live site
task('import', [
	'pull:database',
	'pull:files'
])->desc('Updates local website from live site.');

// Import database
task('db:pull', function () {
	runLocally('ssh runcloud@{{server}} "mysqldump -u {{db_user}} -p{{db_pass}} {{db_name}}" > database.sql');
});

task('db:push', function () {
	upload('database.sql', '~/websites/{{domain}}/database.sql');
	run('docker exec -i mariadb mariadb -u{{db_user}} -p{{db_pass}} {{db_name}} < ~/websites/{{domain}}/database.sql');
});

task('db:import', function () {
	runLocally('docker exec -i mariadb mariadb -uroot -pmariadbsucks decoder_db < database.sql');
});

task('db:init', function () {
	runLocally('docker exec -i mariadb mariadb -uroot -pmariadbsucks -e"CREATE DATABASE decoder_db"');
});

task('db:sync', [
	'db:pull',
	'db:import'
])->desc('Updates local DB from live site.');

//  files ===============================

task('files:pull', function () {
	download("{{deploy_path}}/site/assets/files/", "./site/assets/files");
});

task('files:push', function () {
	upload("./site/assets/files", "{{deploy_path}}/shared/site/assets");
});

task('wire:pull', function () {
	download("{{deploy_path}}/wire", "./");
});
task('wire:push', function () {
	upload("./wire", "{{deploy_path}}/shared/wire");
});

task('assets:pull', function () {
	download("{{deploy_path}}/site/assets", "./site/");
});
task('assets:push', function () {
	upload("./site/assets", "{{deploy_path}}/current/site");
});