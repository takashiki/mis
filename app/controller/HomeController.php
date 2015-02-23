<?php
use mis\core\Controller;
use mis\view\View;

class HomeController extends Controller
{
  public function index() {
    //print_r(User::where(array('id =' => '2', 'username' => 'john'))->where('id', '2')->get());

    /* $new = array(
      array('username' => 'test2',
        'password' => '123456',),
      array('username' => 'test3',
        'password' => '111111'),
    );
    
    echo User::insert($new); */
    
    /* $edit = array(
      'username' => '2test2',
      'password' => '2123456',
      'email' => '123@q.com'
    );
    
    echo User::where('id =', '2')->update($edit); */
    
    User::delete('2');
    
    View::make('home/index', array('title' => 'mytitle', 'content' => 'hi you'));
  }
}