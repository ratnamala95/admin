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

    function forgot_page(){
      $this->load->view('layout/forgotpass');
    }

    function forgot_password(){
      $email = $_POST['email'];
      if($this->aauth->remind_password($email)){
        redirect('Dashboard/login_page');
      }else{
        $this->aauth->print_errors();
      }
    }

    function reset($link){
      $this->aauth->reset_password($link);
    }

    /*
    *change password when user is logged in!
    */

    function change_password(){
      $data['admin_data'] = $this->checkAccess();
      $this->load->view('layout/changepass',$data);
    }

    function change_pass(){
      $data = $this->checkAccess();
      $id = $data['id'];
      $user = $data['username'];
      $email = $data['email'];
      $password = $_POST['passwd'];
      if($this->aauth->update_user($id,$email,$password,$user)){
        redirect('Dashboard');
      } else {
        $this->aauth->print_errors();
      } /* email, password , username*/
    }

  }
 ?>
