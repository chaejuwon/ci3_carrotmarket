<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  function __construct(){
    parent::__construct();
  }
  
	public function index() {       
    $this->load->view('head');
    $this->load->view('nav');
    $this->load->view('account/login');
    $this->load->view('footer');
  }
  

  public function login() {      
    $this->load->view('head');
    $this->load->view('nav');
    $this->load->view('account/login');
    $this->load->view('footer');
  }
  
  public function logout() {
    $this->session->sess_destroy();
    $this->load->helper('url');
    redirect('/');
  }
  
  public function register() {
    $this->load->view('head');
    $this->load->view('nav');
    
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
    $this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');
    $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
    $this->form_validation->set_rules('phone', '휴대폰', 'required|min_length[9]|max_length[20]');

//     $this->form_validation->run();
    if($this->form_validation->run() === false){
        $this->load->view('account/register');
    } else {
        if(!function_exists('password_hash')){
          $this->load->helper('password');
        }
        $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
      
        $this->load->model('user_model');
        $this->user_model->add(array(
          'email'=>$this->input->post('email'),
          'password'=>$hash,
          'nickname'=>$this->input->post('nickname'),
          'phone'=>$this->input->post('phone')
        ));
      
      $this->session->set_flashdata('message', '회원가입에 성공하셨습니다.');
      $this->load->helper('url');
      redirect('/');
    }
    
//     $this->load->view('account/register');
    $this->load->view('footer');
  }
  
  public function authentication() {
    $this->load->model('user_model');
    $user = $this->user_model->getByEmail(array(
        'email' => $this->input->post('email')
    ));

    if ($user && password_verify($this->input->post('password'), $user->password)) {
      $user_data = array(
          'userid' => $user->id,
          'email' => $user->email,
          'isLogin' => true
      );

    $this->session->set_userdata($user_data);

    $this->load->helper('url');
    redirect("/main");
    } else {
        $this->load->helper('url');
        redirect("/auth/login");
    } 
  }
}