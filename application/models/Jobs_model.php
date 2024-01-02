<?php

class Jobs_model extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
  }
  
  function list() {
    $result = $this->db->get('jobs')->result();
    return $result;
  }
  
  function detail($id) {
    $this->db->select('u.id, u.nickname, j.id, j.userid, j.title, j.moneytype, j.money, j.address, j.day, j.starttime, j.endtime, j.content, j.filename');
    $this->db->from('user as u');
    $this->db->join('jobs as j', 'u.id = j.userid', 'inner');   
    $result = $this->db->get_where('jobs', ['j.id' => $id])->row();
    return $result;
  }
  
  function limitlist() {
    $this->db->limit(6,0);
    $result = $this->db->get('jobs')->result();
    return $result;
  }
  
  function add($filename) {
    // 사용자가 입력한 user_id 값
    $user_id = $this->session->userdata('userid');

    // 사용자 테이블에 해당 user_id 값이 존재하는지 확인
    $user_exists = $this->db->where('id', $user_id)->count_all_results('user') > 0;
    
    if ($user_exists) {
        // user_id가 존재하면 board 테이블에 데이터 추가
        $data = [
            'userid' => $user_id,
            'title' => $this->input->post('title'),
            'moneytype' => $this->input->post('moneytype'),
            'money' => $this->input->post('money'),
            'address' => $this->input->post('address'),
            'day' => $this->input->post('day'),
            'starttime' => $this->input->post('starttime'),
            'endtime' => $this->input->post('endtime'),
            'content' => $this->input->post('content'),
            'created' => date("Y-m-d H:i"),
            'filename' => $filename
        ];

        $result = $this->db->insert('jobs', $data);
        return $result;
    } else {
        // user_id가 존재하지 않으면 에러 처리 또는 다른 작업 수행
        return false;
    }
  }
  
  function modify($id, $filename) {
        // 사용자가 입력한 user_id 값
    $user_id = $this->session->userdata('userid');

    // 사용자 테이블에 해당 user_id 값이 존재하는지 확인
    $user_exists = $this->db->where('id', $user_id)->count_all_results('user') > 0;
    
    if ($user_exists) {
        // user_id가 존재하면 board 테이블에 데이터 추가
        $data = [
            'userid' => $user_id,
            'title' => $this->input->post('title'),
            'moneytype' => $this->input->post('moneytype'),
            'money' => $this->input->post('money'),
            'address' => $this->input->post('address'),
            'day' => $this->input->post('day'),
            'starttime' => $this->input->post('starttime'),
            'endtime' => $this->input->post('endtime'),
            'content' => $this->input->post('content'),
            'modify' => date("Y-m-d H:i"),
            'filename' => $filename
        ];

        $result = $this->db->where('id', $id)->update('jobs', $data);
        return $result;
    } else {
        // user_id가 존재하지 않으면 에러 처리 또는 다른 작업 수행
        return false;
    }
  }
  
  function incrementviews($id) {
    $this->db->where('id', $id);
    $this->db->set('hit', 'hit+1', FALSE);
    $this->db->update('jobs');
  }
  
}