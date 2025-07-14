<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {
  function __construct(){
    parent::__construct();
    
    $this->load->model('product_model', 'product');  
    $this->load->helper('url');
    $this->load->library('pagination');
  }
  
  function _head(){   
    $this->load->view('head');
    $this->load->view('nav');  
  }
  
  public function marketlist() {
    $this->_head();
    
    $total_rows = $this->product->getAll();
    // 페이지네이션 설정
    $config['base_url'] = 'https://cjw02141.cafe24.com/market/marketlist';
    $config['total_rows'] = $total_rows;
    $config['per_page'] = 8;
    $config['uri_segment'] = 3; // URI에서 페이지 번호가 있는 세그먼트
    $config['display_always'] = TRUE;
    $config['use_fixed_page'] = TRUE;
    $config['fixed_page_num'] = 10;

    $config['attributes'] = ['class' => 'page-link'];
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['anchor_class'] = 'class="last"';
    $config['use_page_numbers'] = TRUE;

    // 페이지네이션 초기화
    $this->pagination->initialize($config);

    // 현재 페이지 번호 가져오기
    $page = $this->uri->segment(3, 1);
    $offset = ($page - 1) * $config['per_page'];

    // 현재 페이지에 해당하는 데이터 가져오기
    $data['list'] = array();
    $data['list'] = $this->product->get_data($config['per_page'], $offset);

    // 페이지네이션 링크 생성
    $data['pagination_links'] = $this->pagination->create_links();
    
    $this->load->view('market/list', $data);
   
    $this->load->view('popularBanner');   
    $this->load->view('footer');
  }
  
  public function marketdetail($id) {     
    $this->_head();
    
    $data['detail'] = $this->product->detailget($id);   
    $data['list'] = $this->product->detailgetAll();
    
    $this->load->view('market/detail', $data);
    $this->load->view('footer');
  }
  
  public function marketpush($id='') {
    $this->_head();
    $data = [];
    
    $id = $this->uri->segment(3);
       
    if($id != '') {
      $data['detail'] = $this->product->detailget($id);
    }
    
    $this->load->view('market/add', $data);
    
    $this->load->view('popularBanner');
    $this->load->view('footer');    
  }
  
  public function productadd() {       
    $this->load->library('form_validation');
    $this->load->library('upload');

    // 폼 검증 규칙 설정
    $this->form_validation->set_rules('title', '제목', 'required');
    $this->form_validation->set_rules('price', '가격', 'required');
    $this->form_validation->set_rules('address', '주소', 'required');
    $this->form_validation->set_rules('content', '내용', 'required');

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
            $this->product->add($file_name);

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
  
    public function productedit($id) {
    $this->load->library('form_validation');
    $this->load->library('upload');
      
    $this->form_validation->set_rules('title', '제목', 'required');
    $this->form_validation->set_rules('price', '가격', 'required');
    $this->form_validation->set_rules('address', '주소', 'required');
    $this->form_validation->set_rules('content', '내용', 'required');
    
    $oldFile = $this->product->getFileNameById($id);      
      
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
            // 새로운 파일 업로드 시 기존파일 삭제             
            if (!empty($oldFile)) {
              unlink('./uploads/' . $oldFile);
            }
          
            $data = $this->upload->data();
            $file_name = $data['file_name']; // 업로드된 파일의 이름
            $this->product->modify($id, $file_name);

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
  
  // 이미지 업로드
  public function imgpush() {
    $this->_head();            
    
    $this->load->view('market/imgupload');
    $this->load->view('footer');
  }
  
  public function imgaddi() {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']     = '100';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';
    
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    $response = array(); // 응답을 저장할 배열

    if ($this->upload->do_upload('file')) {
        $data = $this->upload->data();
        $file_name = $data['file_name']; // 업로드된 파일의 이름
        $this->product->saveToDatabase($file_name);
//         var_dump($data);
        // 업로드 성공 시 응답 데이터 설정
        $response['success'] = true;
        $response['file_name'] = $file_name;
    } else {
        // 업로드 실패 시 응답 데이터 설정
        $response['success'] = false;
		$response['error'] = $this->upload->display_errors();
    }

    if ($this->input->is_ajax_request()) {
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Ajax 요청이 아니라면 기존 리다이렉션 수행
        redirect('/main/index');
    }
    
    
  }
  
}
