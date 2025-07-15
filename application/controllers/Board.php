<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Board extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('board_model', 'board');
		$this->load->model('user_model', 'user');
		$this->load->library('pagination');
	}

	function _head()
	{
		$this->load->view('head');
		$this->load->view('nav');
	}

	public function boardlist()
	{
		$this->_head();

		$search_term = $this->input->get('search');

		if ($search_term) {
			$total_rows = $this->board->getSearchTotal($search_term);
		} else if ($search_term = '') {
			redirect('/board/boardlist');
		} else {
			$total_rows = $this->board->getAll();
		}


		// 검색어 가져오기
		$search_term = $this->input->get('search');

		// 페이지네이션 설정
		$config['base_url'] = 'https://cjw02141.cafe24.com/board/boardlist';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 5;
		$config['num_links'] = 5;
		$config['display_always'] = TRUE;
		$config['use_fixed_page'] = TRUE;
		$config['fixed_page_num'] = 10;
		$config['enable_query_strings'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'per_page';
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
		$page = $this->input->get('per_page', TRUE); // 쿼리스트링으로부터 페이지 번호 가져오기
		$page = $page ? $page : 1; // 페이지 번호가 없으면 1로 설정
		$offset = ($page - 1) * $config['per_page'];

		if ($search_term) {
			// 검색이 있을 때의 처리
//         $total_rows = $this->board->getSearchTotal($search_term);
			$data['search'] = $this->board->search_board($search_term, $config['per_page'], $offset);
		} else {
			// 검색이 없을 때의 처리
//         $total_rows = $this->board->getAll();
			$data['list'] = $this->board->get_data($config['per_page'], $offset);
		}


		// 페이지에 해당하는 데이터 가져오기
		if ($search_term) {
			$data['pagination_links'] = $this->pagination->create_links();
		} else {
			$data['pagination_links'] = $this->pagination->create_links();
		}

		$this->load->view('board/list', $data);
		$this->load->view('popularBanner');

		$this->load->view('footer');
	}

	public function boarddetail($id)
	{
		$this->_head();

		$this->board->incrementviews($id);
		$data['detail'] = $this->board->detailget($id);
		$data['commentlist'] = $this->board->get_comment($id);

		$this->load->view('board/detail', $data);
		$this->load->view('popularBanner');

		$this->load->view('footer');
	}

	public function boardcreate($id = '')
	{
		$this->_head();

		if ($id != '') {
			$data = [];
			$data['detail'] = $this->board->detailget($id);
			$this->load->view('board/add', $data);
		} else {
			$this->load->view('board/add');
		}

		$this->load->view('footer');
	}

	public function boardadd()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', '타이틀', 'required');
		$this->form_validation->set_rules('content', '내용', 'required');

		$response = array(); // 응답을 담을 배열 초기화

		if ($this->form_validation->run() == FALSE) {
			// 폼 검증 실패 시
			$response['status'] = 'error';
			$response['message'] = validation_errors(); // 폼 검증 에러 메시지 추가
		} else {
			// 폼 검증 성공 시
			$this->board->add();
			$response['status'] = 'success';
			$response['message'] = 'Data processed successfully';
		}

		// Ajax 요청 여부 확인
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			// Ajax 요청이 아니라면 기존 리다이렉션 수행
			redirect('/board/boardlist');
		}


	}


	public function boardupdate($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', '타이틀', 'required');
		$this->form_validation->set_rules('content', '내용', 'required');

		$response = array();

		if ($this->form_validation->run() == FALSE) {
//         $this->load->view('board/add');
			$response['status'] = 'error';
			$response['message'] = validation_errors(); // 폼 검증 에러 메시지 추가
		} else {
			$this->board->update($id);
//         redirect('/board/boardlist');
			$response['status'] = 'success';
			$response['message'] = 'Data processed successfully';
		}

		// Ajax 요청 여부 확인
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			// Ajax 요청이 아니라면 기존 리다이렉션 수행
			redirect('/board/boardlist');
		}
	}

	public function boarddelete($id)
	{
		$this->board->delete($id);
		redirect('/board/boardlist');
	}

	public function commentadd()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('board_id', '게시물 아이디', 'required');
		$this->form_validation->set_rules('comment', '코멘트', 'required');

		$response = array(); // 응답을 담을 배열 초기화

		if ($this->form_validation->run() == FALSE) {
			// 폼 검증 실패 시
			$response['status'] = 'error';
			$response['message'] = validation_errors(); // 폼 검증 에러 메시지 추가
		} else {
			// 폼 검증 성공 시
			$this->board->add_comment();
			$response['status'] = 'success';
			$response['message'] = 'Data processed successfully';
		}

		// Ajax 요청 여부 확인
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			// Ajax 요청이 아니라면 기존 리다이렉션 수행
			redirect('/board/boardlist');
		}
	}

	public function subcommentadd()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('board_id', '게시물 아이디', 'required');
		$this->form_validation->set_rules('parent_id', '부모 아이디');
		$this->form_validation->set_rules('comment', '코멘트', 'required');

		$response = array(); // 응답을 담을 배열 초기화

		if ($this->form_validation->run() == FALSE) {
			// 폼 검증 실패 시
			$response['status'] = 'error';
			$response['message'] = validation_errors(); // 폼 검증 에러 메시지 추가
		} else {
			// 폼 검증 성공 시
			$this->board->add_comment();
			$response['status'] = 'success';
			$response['message'] = 'Data processed successfully';
		}

		// Ajax 요청 여부 확인
		if ($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			// Ajax 요청이 아니라면 기존 리다이렉션 수행
			redirect('/board/boardlist');
		}
	}

	public function commentajax($id)
	{
		$json = $this->board->get_comment($id);

		// JSON으로 응답
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['data' => $json]));

	}

//   public function search(){
//     $search_term = $this->input->get('search');
//     $data['search'] = $this->board->search_board($search_term);

//     $this->load->view('/board/list', $data);
//   }

}
