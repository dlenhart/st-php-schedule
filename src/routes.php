<?php
use Slim\Http\Request;
use Slim\Http\Response;

//HOME
$app->get('/', 'stphpschedule\Controller\HomepageController:home');

//QUEUE - queries queue table.
$app->get('/boxes/queue','stphpschedule\Controller\HomepageController:queue');

//JOBS - queries job table.
$app->get('/boxes/jobs','stphpschedule\Controller\HomepageController:job');
