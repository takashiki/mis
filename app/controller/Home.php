<?php
use mis\core\Controller;
use mis\core\View;

class Home extends Controller
{
  public function index() {
    //echo 'welcome seikai';
    $this->m = new UserModel('user');
    print_r($this->m->all());
    
    View::make('home/index', array('title' => 'mytitle', 'content' => 'hi you'));
  }
}