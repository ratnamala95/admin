<?php defined('BASEPATH') OR exit('No direct script assecc allowed');


  class Dashboard extends CI_Controller
  {
    function __custom()
    {
      parent::__custom();


      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->helper('security');
      $this->load->library('tank_auth');
      $this->lang->load('tank_auth');
    }

    function index()
    {
      $data['admin_data'] = $this->checkAccess();
      $data['content'] = "Dashboard";
      $this->load->view('template/index',$data);
    }

    function login()
    {
      $this->load->view('template/login_form');
    }

    function register()
    {
      $data['admin_data'] = $this->checkAccess();
      $data['content'] = "Dashboard";
      $this->load->view('template/register',$data);
    }



    private function checkAccess()
     {
            if($this->tank_auth->is_logged_in())
            {
                 return  $this->session->all_userdata();
            }
            else
            {
               redirect('auth/login');

            }
     }
  }

 ?>
