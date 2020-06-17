<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user', ['controller' => 'user', 'action' => 'index']);
Router::connect('/user/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);
Router::connect('/user/show', ['controller' => 'user', 'action' => 'show']);
Router::connect('/user/logout', ['controller' => 'user', 'action' => 'logout']);
Router::connect('/user/error', ['controller' => 'user', 'action' => 'error']);