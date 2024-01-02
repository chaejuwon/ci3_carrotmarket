<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
  function __construct(){
    parent::__construct();
    
    $this->load->model('jobs_model', 'jobs');
    $this->load->helper('url');
    $this->load->library('pagination');
  }
  
  function _head(){   
    $this->load->view('head');
    $this->load->view('nav');  
  }
  
 function jobslist() {
   $this->_head();
   
   $data = [];
   $data['list'] = $this->jobs->list();
   
   $this->load->view('jobs/list', $data);
   $this->load->view('footer');
 }
  
  function jobsdetail($id) {
    $this->_head();
    
    $data = [];
    $data['list'] = $this->jobs->limitlist();
    $data['detail'] = $this->jobs->detail($id);
    
    $this->jobs->incrementviews($id);
    
    $this->load->view('jobs/detail', $data);
    $this->load->view('footer');
  }
  
 function jobspush($id = '') {
   $this->_head();
   
   $data = [];
   
   if($id != '') {
      $data['detail'] = $this->jobs->detail($id);
   }
   
   $this->load->view('jobs/add', $data);
   $this->load->view('footer');
 }
  
 function jobsadd() {   
   $this->load->library('form_validation');
   $this->load->library('upload');
   
   $this->form_validation->set_rules('title', '타이틀', 'required');
   $this->form_validation->set_rules('moneytype', '급여종류', 'required');
   $this->form_validation->set_rules('money', '급여', 'required');
   $this->form_validation->set_rules('address', '주소', 'required');
   $this->form_validation->set_rules('day', '요일', 'required');
   $this->form_validation->set_rules('starttime', '시작날짜', 'required');
   $this->form_validation->set_rules('endtime', '종료날짜', 'required');
   $this->form_validation->set_rules('content', '타이틀', 'required');
   
    // 파일 업로드 설정
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '150';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';
    $config['encrypt_name'] = TRUE;
   
    $this->upload->initialize($config);

    $response = array(); // 응답을 저장할 배열

    // 폼 검증 실행
    if ($this->form_validation->run() == FALSE) {
        $response['status'] = 'error';
        $response['message'] = validation_errors(); // 폼 검증 에러 메시지 추가
    } else {        
        // 파일 업로드 실행
        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            $file_name = $data['file_name']; // 업로드된 파일의 이름
            $this->jobs->add($file_name);

            // 업로드 성공 시 응답 데이터 설정
            $response['status'] = 'success';
            $response['message'] = 'Data processed successfully';
            $response['file_name'] = $file_name;
        } else {
            // 업로드 실패 시 응답 데이터 설정
            $response['status'] = 'error';
            $response['message'] = $this->upload->display_errors();
        }
    }

    // Ajax 요청 여부 확인
    if ($this->input->is_ajax_request()) {
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Ajax 요청이 아니라면 기존 리다이렉션 수행
        redirect('/main/index');
    }
 }
  
  function jobsmodify($id) {   
   $this->load->library('form_validation');
   $this->load->library('upload');
   
   $this->form_validation->set_rules('title', '타이틀', 'required');
   $this->form_validation->set_rules('moneytype', '급여종류', 'required');
   $this->form_validation->set_rules('money', '급여', 'required');
   $this->form_validation->set_rules('address', '주소', 'required');
   $this->form_validation->set_rules('day', '요일', 'required');
   $this->form_validation->set_rules('starttime', '시작날짜', 'required');
   $this->form_validation->set_rules('endtime', '종료날짜', 'required');
   $this->form_validation->set_rules('content', '타이틀', 'required');
   
    // 파일 업로드 설정
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '150';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';
    $config['encrypt_name'] = TRUE;
   
    $this->upload->initialize($config);

    $response = array(); // 응답을 저장할 배열

    // 폼 검증 실행
    if ($this->form_validation->run() == FALSE) {
        $response['status'] = 'error';
        $response['message'] = validation_errors(); // 폼 검증 에러 메시지 추가
    } else {        
        // 파일 업로드 실행
        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            $file_name = $data['file_name']; // 업로드된 파일의 이름
            $this->jobs->modify($id, $file_name);

            // 업로드 성공 시 응답 데이터 설정
            $response['status'] = 'success';
            $response['message'] = 'Data processed successfully';
            $response['file_name'] = $file_name;
        } else {
            // 업로드 실패 시 응답 데이터 설정
            $response['status'] = 'error';
            $response['message'] = $this->upload->display_errors();
        }
    }

    // Ajax 요청 여부 확인
    if ($this->input->is_ajax_request()) {
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Ajax 요청이 아니라면 기존 리다이렉션 수행
        redirect('/main/index');
    }
 }
  
  
}
