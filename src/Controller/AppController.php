<?php

use Core\Controller;

class AppController extends Controller
{

	public function indexAction()
	{
		self::render('index');	
	}
}