<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aajx extends CI_Controller {
  
  function __construct(){
    parent::__construct();
  }
  
  public function login123() {
		$this->load->view('head');
    $this->load->view('nav');
    $this->load->view('account/loginAjax');
    $this->load->view('footer');
	}
  
}
