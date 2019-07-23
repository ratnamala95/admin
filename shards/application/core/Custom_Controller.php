<?php defined('BASEPATH') or exit('No direct script access allowed!');

  /**
   *
   */
  class Custom_Controller extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function checkAccess()
    {
      if($this->aauth->is_loggedin())
      {
        return $this->session->all_userdata();
      }
      else {
        redirect('Dashboard/login_page');
      }
    }
  }


  /**
   *
   */
  class Admin_Controller extends Custom_Controller
  {

    function __construct()
    {
      parent::__construct();
    }
  }



 ?>
