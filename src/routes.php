<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/home', function (Request $request, Response $response, array $args) {
    $this->logger->info("Slim-Skeleton '/' route");
    $response->getBody()->write("Hello, Word");
    $todo = new ToDo();
    return $response;
});

$app->get('/', \ToDoController::class . ':home');

$app->get('/create', \ToDoController::class . ':create');

$app->post('/Inline', \ToDoController::class . ':Inline');

$app->post('/update', \ToDoController::class . ':update');

$app->post('/color', \ToDoController::class . ':color');

$app->post('/add', \ToDoController::class . ':add');

$app->get('/delete/{id}', \ToDoController::class . ':delete');

