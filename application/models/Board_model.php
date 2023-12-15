<?php

class Board_model extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
  }
  
  function add() {
    // 사용자가 입력한 user_id 값
    $user_id = $this->session->userdata('userid');

    // 사용자 테이블에 해당 user_id 값이 존재하는지 확인
    $user_exists = $this->db->where('id', $user_id)->count_all_results('user') > 0;

    if ($user_exists) {
        // user_id가 존재하면 board 테이블에 데이터 추가
        $data = [
            'user_id' => $user_id,
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'created' => date("Y-m-d H:i")
        ];

        $result = $this->db->insert('board', $data);
        return $result;
    } else {
        // user_id가 존재하지 않으면 에러 처리 또는 다른 작업 수행
        return false;
    }
  }
  
  function update($id) {
    $data = [
      'title'=>$this->input->post('title'),
      'content'=>$this->input->post('content'),
      'modify'=>date('Y-m-d H:i:s')
    ];
    
    $this->db->where('id', $id);
    $this->db->where('user_id', $this->session->userdata('userid'));
      
    $result = $this->db->update('board', $data);
  }
  
  function getAll() {
    $result = $this->db->count_all_results('board'); // 'board'는 테이블 이름에 맞게 수정
    return $result;
  }
  
  function detailget($id) {
    $this->db->select('u.id, u.nickname, b.id, b.title, b.content, b.created, b.modify, b.hit');
    $this->db->from('user as u');
    $this->db->join('board as b', 'u.id = b.user_id', 'inner');
    $board = $this->db->get_where('board', ['b.id' => $id])->row();
    return $board;
  }
  
  function incrementviews($id) {
    $this->db->where('id', $id);
    $this->db->set('hit', 'hit+1', FALSE);
    $this->db->update('board');
  }
  
  public function get_data($per_page, $offset) {
        // 현재 페이지에 해당하는 데이터를 가져오는 데이터베이스 쿼리 작성
    $this->db->select('u.id, u.nickname, b.user_id, b.id, b.title, b.content, b.created, b.modify, b.hit');
    $this->db->from('user as u');
    $this->db->join('board as b', 'u.id = b.user_id', 'inner');
    $this->db->order_by('b.id', 'desc');
    $this->db->limit($per_page, $offset);

    $result = $this->db->get()->result();

    return $result;
    }
  
  public function delete($id) {
    $this->db->where('id', $id);
    $result = $this->db->delete('board');
    return $result;
  }
}