<?php

class Product_model extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
  }
  
  function add($fileName) {
    $data = [
        'title'=>$this->input->post('title'),
        'price'=>$this->input->post('price'),
        'address'=>$this->input->post('address'),
        'content'=>$this->input->post('content'),
        'created'=> date("Y-m-d H:i:s"),
        'filename' => $fileName
    ];
    
    $result = $this->db->insert('product', $data);
    return $result;
  }
  // 게시물 수정 시 이전에 업로드한 파일 삭제   
  public function getFileNameById($id) {
    $query = $this->db->select('filename')->where('id', $id)->get('product');
    $result = $query->row();

    return (!empty($result)) ? $result->filename : '';
  }
  
  function modify($id, $fileName) {
    $data = [
      'title'=>$this->input->post('title'),
      'price'=>$this->input->post('price'),
      'address'=>$this->input->post('address'),
      'content'=>$this->input->post('content'),
      'modify'=> date("Y-m-d H:i:s"),
      'filename' => $fileName
    ];
    
    $result = $this->db->where('id', $id)->update('product', $data);
    return $result;
  }
  
  function detailgetAll() {    
    $this->db->limit(6, 0);
    $result = $this->db->get('product')->result();
    return $result;   
  }
  
  function getAll() {    
    $result = $this->db->count_all_results('product'); // 'board'는 테이블 이름에 맞게 수정
    return $result;   
  }
  
   public function get_data($per_page, $offset) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($per_page, $offset);

    $result = $this->db->get('product')->result();

    return $result;
   }
  
  function detailget($id) {    
    $product = $this->db->get_where('product', ['id' => $id])->row();
    return $product;
  }
  
}