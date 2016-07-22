<?php
use Slim\Http\Request;
use Slim\Http\Response;

//HOME
$app->get('/', 'BL00B1RD\Controller\HomepageController:home');

//PAGES -- Pages stored in pages table.
//$app->get('/pages/{page}','BL00B1RD\Controller\HomepageController:pages');

//POSTS -- Posts stored in posts table.
//$app->get('/posts/{id}','BL00B1RD\Controller\HomepageController:posts');
