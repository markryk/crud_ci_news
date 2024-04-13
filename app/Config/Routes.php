<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\News2;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', [News::class, 'index']);
$routes->get('news', [News::class, 'index']);
$routes->get('news/new', [News::class, 'new']);
$routes->post('news', [News::class, 'create']);
$routes->get('news/(:segment)', [News::class, 'show']);
$routes->get('news/edit/(:segment)', [News::class, 'edit']);
$routes->post('news/update', [News::class, 'update'], ['as' => 'atualizar_noticia']);
$routes->get('news/delete/(:segment)', [News::class, 'delete']);


$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
