<?php

// namespace Controller;
use Core\Controller;

  
class UserController extends Controller
{

    // public function __construct() {

    // }

    public function indexAction()
	{
		$this->render('show');
	}
	public function registerAction()
	{
		$error = '';
		$success = '';
		$this->render('register', $scope = array('error' => $error, 'success' => $success));
		$params = $this->request->getQueryParams();
		unset($params['PHPSESSID']);

		if (isset($params['name']) && isset($params['surname']) && isset($params['birth']) && isset($params['city']) && isset($params['email']) && isset($params['password'])) {
			if (!empty($params['name']) && !empty($params['surname']) && !empty($params['birth']) && !empty($params['city']) && !empty($params['email'] && !empty($params['password']))) {
				if (filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
					$params['password'] = hash('sha256', $params['password']);
					$user = new \Model\UserModel($params);
					if ($user->isEmailFree()) {
						$user->id = $user->create();
						$_SESSION['log'] = true;
						$infos = $user->read();
						foreach ($infos as $key => $value) {
							$_SESSION[$key] = $value;
						}
						header('Location: /user/show');
					} else {
						$error = "<p class='error'>Adresse email déjà utilisée !</p>";
					}
				} else {
					$error = "<p class='error'>Adresse email incorrecte !</p>";
				}
			} else {
				$error = "<p class='error'>Veuillez remplir tous les champs !</p>";
			}
		}
		$this->render('register', $scope = array('error' => $error));
		exit();
	}
	
}