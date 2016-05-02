<?php

// Debug
$config['debug'] = false;

// API
$config['api.version'] = '1';
$config['api.prefix'] = 'api';

// Database Credentials
$config['db.dbname'] = 'test';
$config['db.user'] = '';
$config['db.password'] = '';
$config['db.host'] = '';

// Repositories
$config['repositories'] = array(
	'db.examples' => 'skeleton\\Repositories\\ExampleRepository'
);