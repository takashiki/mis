<?php
use mis\core\Controller;
use mis\view\View;

class HomeController extends Controller
{
  public function index() {
    //$model = new UserModel('user');
    //$res = User::get();
    $user = new User();
    print_r($user->get());
    //print_r($res);
    View::make('home/index', array('title' => 'mytitle', 'content' => 'hi you'));
  }
}