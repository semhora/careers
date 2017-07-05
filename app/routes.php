<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/evento/novo', 'EventosController@novo'];
$routes[] = ['/evento/upload', 'EventosController@upload'];
$routes[] = ['/evento/{id}', 'EventosController@mostrar'];

return $routes;