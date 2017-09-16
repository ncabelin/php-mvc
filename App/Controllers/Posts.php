<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{

  public function __call($name, $args) {
    $method = $name . 'Action';
    if (method_exists($this, $method)) {
      if ($this->before() !== false) {
        call_user_func_array([$this, $method], $args);
        $this->after();
      }
    } else {
      echo "Method $method not found in controller " . get_class($this);
    }
  }

  public function indexAction() {
    echo '<p>Query string parameters : <pre>';
    echo print_r($this->route_params, true).'</pre>';
  }

  public function addNewAction() {
    $blogs = Post::getAll();
    echo print_r($blogs);
    echo "I am adding Posts";
    echo '<p>Query string parameters : <pre>';
    echo $_GET['id'].'</pre>';
  }
  protected function before() {
    echo '(Before)';
    // return false if you want the code not to be executed
  }
  protected function after() {
    echo '(After)';
  }
}
