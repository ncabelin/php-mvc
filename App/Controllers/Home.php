<?php
namespace App\Controllers;
use Core\View;

class Home extends \Core\Controller
{
  public function index()
  {
    $query = $this->route_params;
    $args = ['name' => 'Michael',
      'jobs' => [
        '1',
        '2',
        '3'
      ],
      'params' => $query
    ];
    View::renderTemplate('Home/index.html', $args);
  }
}
