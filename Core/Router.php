<?php

namespace Core;

class Router
{
	private static $routes;

	public static function connect($url, $route)
	{
		self::$routes[$url] = $route;
	}

	public static function get($url)
	{
		//var_dump($url);
		return self::$routes[$url];
	}
}
