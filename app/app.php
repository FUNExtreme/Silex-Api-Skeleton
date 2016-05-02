<?php

// Set environment
$environment = 'dev';

// Config
if($environment === 'dev')
{
	require __DIR__ . DIRECTORY_SEPARATOR . 'config.php';
}
else if($environment === 'prod')
{
	require __DIR__ . DIRECTORY_SEPARATOR . 'config_debug.php';
}

// Bootstrap
require __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Handle Errors
$app->error(function (\Exception $e, $code) {
	$response = array(
		'status' => 'error',
		'data' => $code . '\n' . $e->getMessage()
	);

	if($app['debug'] === true)
	{
		$response['stacktrace'] = $e->getStacktrace();
	}
	return new JsonResponse($response);
});

// Mount our Controllers
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routes.php';
foreach($routes as $uri => $controller)
{
	$app->mount('/' . $config['api.prefix'] . '/v' . $config['api.version'] . $uri, $controller);
}
