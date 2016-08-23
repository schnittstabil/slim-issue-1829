<?php
require __DIR__ . '/../vendor/autoload.php';

// echo $_SERVER['SCRIPT_NAME'];
// $_SERVER['SCRIPT_NAME'] = '/api.php';

$app = new \Slim\App();

$app->get('/hello', function ($request, $response, $args) {
	var_dump($this->get('environment'));
	var_dump($request->getUri());
});

$app->run();
