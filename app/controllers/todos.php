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
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    //     if($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    // // Check file size
    // if ($_FILES["fileupload"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }
    // // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    // && $imageFileType != "gif" ) {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    // }
    // // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    // // if everything is ok, try to upload file
    // } else {
    //     if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
    //         echo "The file ". basename( $_FILES["fileupload"]["name"]). " has been uploaded.";
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //     }
    // }
    Todo::create([
      'creator' => $_POST['creator'],
      'email' => $_POST['email'],
      'description' => $_POST['description'],
      'status' => $_POST['statusSelect'],
      'image' => $_POST['fileupload']
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
