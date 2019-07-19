<?php   desined( 'BASEPATH') OR exit('No direct script acces allowed');

  class Custom_Controller extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
    }

    function layout()
    {
      $this->template['title'] = isset($this->title)? $this->title:"Admin";
      $this->template['view'] = isset($this->content)?$this->content:"";
      $this->template['data'] = isset($this->data)?$this->data;array();

      loadView('template/index',$this->template);
    }
  }

 ?>
