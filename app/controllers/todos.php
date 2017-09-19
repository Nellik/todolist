<?php

class Todos extends Controller
{

  protected $todos;
  protected $user;

  public function __construct($value='')
  {
    $this->todos = $this->model('Todo');
    $this->user = $this->model('User');
  }

  public function index()
  {
    $username = '';
    session_start();
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    $this->view('todos/index', ['data' => array($this->getData(), $username)]);
  }

  public function create()
  {
    $username = '';
    session_start();
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    $this->view('todos/create', ['data' => array($this->getData(), $username)]);
  }

  public function postCreate()
  {
    $target_dir = "images/";
    $current_time = time();
    $target_file = $target_dir . $current_time . '_' . basename($_FILES["fileupload"]["name"]) ;

    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);

    $db_file =  "/public/" . $target_file;

    Todo::create([
      'creator' => $_POST['creator'],
      'email' => $_POST['email'],
      'description' => $_POST['description'],
      'status' => $_POST['statusSelect'],
      'image' => $db_file
    ]);
    header( "Location: /public/todos/index" );
  }

  public function edit($id='')
  {
    $username = '';
    session_start();
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    $todos = Todo::where('id', $id)
                  ->get();
    $data = array();
    foreach ($todos as $todo => $value) {
      $data['id'] = $value['id'];
      $data['creator'] = $value['creator'];
      $data['email'] = $value['email'];
      $data['description'] = $value['description'];
      $data['status'] = $value['status'];
      $data['image'] = $value['image'];
      $data['completed'] = $value['completed'];
    }
    $this->view('todos/edit', ['data' => array($data, $username)]);
  }

  public function postEdit($id='')
  {
    $username = '';
    session_start();
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    Todo::where('id', $id)
          ->update(['description' => $_POST['description'],
                    'completed' => $_POST['completed']
                  ]);
    header( "Location: /public/todos/index" );
  }

  private function getData()
  {
    $todos = Todo::get();

    $data['cols'] = array(
      "id" => array(
        "index" => 1,
        "type"	=> "number",
        "friendly"=> "id"
      ),
      "status" => array(
        "index" => 2,
        "type"	=> "string",
        "friendly"=> "Status"
      ),
      "creator" => array(
        "index" => 3,
        "type"	=> "string",
        "friendly"=> "Creator"
      ),
      "email" => array(
        "index" => 4,
        "type"	=> "string",
        "friendly"=> "Email"
      ),
      "description" => array(
        "index" => 5,
        "type"	=> "string",
        "friendly"=> "Description"
      ),
      "image" => array(
        "index" => 6,
        "type"	=> "string",
        "friendly"=> "Image"
      ),
      "completed" => array(
        "index" => 7,
        "type"	=> "boolean",
        "friendly"=> "Done"
      )
    );

    $data['rows'] = array();

    foreach ($todos as $todo => $value) {
      $data['rows'][$todo]['id'] = $value['id'];
      $data['rows'][$todo]['creator'] = $value['creator'];
      $data['rows'][$todo]['email'] = $value['email'];
      $data['rows'][$todo]['description'] = $value['description'];
      $data['rows'][$todo]['status'] = $value['status'];
      $data['rows'][$todo]['image'] = $value['image'];
      $data['rows'][$todo]['completed'] = $value['completed'];
    }
    return $data;
  }
}
