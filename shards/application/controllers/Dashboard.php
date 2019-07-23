<?php defined('BASEPATH') or exit('No direct script access allowed!');


  /**
   *
   */
  class Dashboard extends Admin_Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function index(){
      $data['admin_data']=$this->checkAccess();
      $this->load->view('layout/index',$data);
    }

    /**
    * login function
    *@params void
    **@return void
    **/

    function login_page(){
      $this->load->view('layout/login');
    }

    function login(){
      $email = $_POST['uname'];
      $pass = $_POST['pass'];
      // print_r($email);die;
      if($this->aauth->login($email,$pass)){
        $this->index();
      }else {
        $this->load->view('layout/login');
      }
    }

    /**
    * register function
    *@params void
    **@return void
    **/

    function register()
    {
      $this->load->view('layout/register');
    }

    /**
    * register function
    *@params void
    **@return void
    **/
    function create_user()
    {
      $uname = $_POST['uname'];
      $email = $_POST['mail'];
      $pass = $_POST['pass'];

      $a = $this->aauth->create_user($email,$pass,$uname);
      if($a){
        echo 'Registeration successful';
      }else{
        echo 'Registeration failed!';
      }
      redirect('Dashboard/login_page');
    }

    /**
    * register function
    *@params void
    **@return void
    **/
    function logout(){
      $this->aauth->logout();
      redirect('Dashboard/login_page');
    }

    /**
    *forgot password
    **/

    function forgot_password(){

    }

    public function get_user() {
        print_r($this->aauth->get_user());
    }
  }
 ?>
