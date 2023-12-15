<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function _head(){   
    $this->load->view('head');
    $this->load->view('nav');  
  }
  
	public function index() {
    $this->_head();
    $this->load->view('main/main');
    $this->load->view('footer');
  }  
  
}
