<?php

class Login extends Controller
{
  protected $user;
  protected $username = null;
  protected $password = null;
  protected $errorMessage = '';

  public function __construct()
  {
    $this->user = $this->model('User');
  }

  public function index($errorMessage = '')
  {
    $this->view('auth/index', ['data' => array($errorMessage)]);
  }

  public function authenticate()
  {
    $this->username = trim(strip_tags($_POST['username']));
    $this->password = trim(strip_tags($_POST['password']));
    $user = User::select('username')
                  ->where('username', $this->username)
                  ->where('password', $this->password)
                  ->first();

    if(null === $user) {
      $this->errorMessage = '1';
      header( "Location: /public/login/index/$this->errorMessage" );
    } else {
      session_start();
      $_SESSION['username'] = $this->username;
      echo $_SESSION['username'];
      header( "Location: /public/todos/index" );
    }
  }

  public function logout()
  {
    session_start();

    if (isset($_SESSION['username'])) {
        foreach ($_COOKIE as $key => $val) {
            unset($_COOKIE[$key]);
            setcookie($key, null, -1, '/');
        }
        unset($_SESSION['username']);
    }
    header( "Location: /public/todos/index" );
  }
}
